<?php

namespace App\Services\Job;

use App\Admin\Services\Job\JobService as AdminJobService;
use Illuminate\Http\Request;
use App\Admin\Repositories\Attribute\AttributeRepositoryInterface;
use App\Services\Job\JobServiceInterface;
use App\Admin\Repositories\Job\{JobRepositoryInterface as AdminJobRepositoryInterface, JobDetailRepositoryInterface as AdminJobDetailRepositoryInterface};
use App\Enums\Job\JobStatus;
use App\Repositories\Job\{JobRepositoryInterface, JobDetailRepositoryInterface};
use App\Repositories\Setting\SettingRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Admin\Repositories\Transaction\TransactionRepositoryInterface as AdminTransactionRepositoryInterface;
use App\Admin\Repositories\Wallet\WalletRepositoryInterface as AdminWalletRepositoryInterface;
use App\Enums\Statistic\StatisticKey;
use App\Enums\Transaction\TransactionStatus;
use App\Enums\Transaction\TransactionType;
use App\Enums\User\UserRoles;
use App\Models\JobStatusNew;
use App\Models\Statistic;

class JobService extends AdminJobService implements JobServiceInterface
{
    protected $repositoryJob, $modelJobStatusNew;

    public function __construct(
        JobRepositoryInterface $repositoryJob,
        AdminJobRepositoryInterface $repository,
        AdminJobDetailRepositoryInterface $repositoryJobDetail,
        AttributeRepositoryInterface $repositoryAttribute,
        SettingRepositoryInterface $repositorySetting,
        AdminWalletRepositoryInterface $repositoryWallet,
        AdminTransactionRepositoryInterface $repositoryTransaction
    ){
        parent::__construct($repository, $repositoryJobDetail, $repositoryAttribute, $repositorySetting, $repositoryWallet, $repositoryTransaction);
        $this->repositoryJob = $repositoryJob;
        $this->modelJobStatusNew = new JobStatusNew();
    }
    public function indexReceived($status, Request $request){
        if(!JobStatus::tryFrom($status)){
            abort(404);
        }
        if(!$request->input('page')){
            $this->modelJobStatusNew->authResetNumber($status, UserRoles::Member);
        }
        $jobs = $this->repositoryJob->getByCurrentAuthWorkerWithRelations('status', $status, [
            'details', 
            'shop' => function($query) {
                $query->statisticReviews();
            }
        ]);
        return $jobs;
    }
    public function storeReceive(Request $request){
        $job = $this->repositoryJob->findByCode($request->input('code'));
        $user_id = auth()->user()->id;
        if(!$job){
            return ['status' => false, 'msg' => __('jobNotReceive')];
        }elseif(!$job->canReceive()){
            if($job->canUpdateWorkerIdForVirtual()){
                $this->repositoryJob->updateByModel($job, ['worker_id' => $user_id]);
            }
            return ['status' => false, 'msg' => __('jobHasWorker')];
        }elseif(auth()->user()->isBlacklist($job->shop_id)){
            return ['status' => false, 'msg' => __('workerInBlacklist')];
        }
        DB::beginTransaction();
        try {
            //code...
            $this->repositoryJob->workerReceive($job, $user_id);
            DB::commit();
            return ['status' => true, 'msg' => __('notifySuccess'), 'job' => $job];
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return ['status' => false, 'msg' => __('notifyFail')];
        }

        return ['status' => true, 'msg' => __('notifySuccess'), 'data' => $job];
    }
    public function updateProccess(Request $request){
        $data = $request->validated();
        $data['money_product_addition'] = $data['money_product_addition'] ?? 0;
        DB::beginTransaction();
        try {
            $job = $this->repositoryJob->updateProccess(...$data);
            
            if($job->status == JobStatus::OrderConfirmed){
                if($job->money_product_addition > 0){
                    if(!$this->handleCharge(
                        $this->repositoryWallet->findByLockForUpdateOrFail('user_id', $job->shop_id), 
                        $job->money_product_addition, 
                        $job, 
                        __('transactionMoneyAdditionJob')
                    )){
                        return ['status' => false, 'msg' => __('notEnoughMoney')];
                    }
                }
            }elseif($job->status == JobStatus::Completed){
                $this->handleAddMoney(
                    $this->repositoryWallet->findByLockForUpdateOrFail('user_id', $job->worker_id), 
                    $job,
                    __('transactionCompleteJob')
                );
                Statistic::updateWithKey(
                    $job->money + ($job->money_product_addition ?: 0), 
                    StatisticKey::Revenue
                );
                Statistic::updateWithKey(
                    $job->money * $this->repositorySetting->getValueByKey('job_fee_service') / 100, 
                    StatisticKey::Profit
                );
            }
            DB::commit();
            return $job;
            //code...
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollBack();
            return false;
        }
    }

    public function updateHistoryProccess(Request $request){
        $data = $request->validated();
        return $this->repositoryJob->updateHistoryProccess(...$data);
    }

    public function clone(Request $request){
        return $this->handleClone(
            $this->repositoryJob->findOrFail($request->input('id')), 
            $this->repositoryWallet->findByLockForUpdateOrFail('user_id', auth()->user()->id)
        );
    }

    public function cancel(Request $request){
        $job = $this->repositoryJob->findOrFail($request->input('id'));
        if(!$job->canCancel()){
            return ['status' => false, 'msg' => __('notifyFail')];
        }
        DB::beginTransaction();
        try {
            $this->handleAddMoney(
                $this->repositoryWallet->findByLockForUpdateOrFail('user_id', $job->shop_id), 
                $job,
                __('transactionRefunCancelJob'),
                false
            );
            if($job->cancelIsCharge()){
                if(!$this->handleCharge(
                    $this->repositoryWallet->findByLockForUpdateOrFail('user_id', auth()->user()->id), 
                    $this->repositorySetting->getValueByKey('job_fines_price'), 
                    $job, 
                    __('transactionCancelJob')
                )){
                    return ['status' => false, 'msg' => __('notEnoughMoney')];
                }
                Statistic::updateWithKey(
                    $this->repositorySetting->getValueByKey('job_fines_price'), 
                    StatisticKey::Profit
                );
            }
            $this->repositoryJob->cancel($job, $request->input('desc'));
            DB::commit();
            return ['status' => true, 'msg' => __('notifySuccess')];
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return ['status' => true, 'msg' => __('notifySuccess')];
        }
    }

    public function handleAddMoney($wallet, $job, $note, $hasFee = true){
        $fee = 0;
        $amount = $job->money + $job->money_product_addition;
        if($hasFee){
            $fee = $job->money * $this->repositorySetting->getValueByKey('job_fee_service') / 100;
            $amount = $amount - $fee;
        }
        $wallet = $this->repositoryWallet->increaseAmount($wallet, $amount);
       if($wallet){
            $this->repositoryTransaction->create([
                'user_id' => $wallet->user_id,
                'type_id' => $job->id,
                'type' => TransactionType::Job,
                'amount' => $amount,
                'fee' => -$fee,
                'status' => TransactionStatus::Approved,
                'note' => $note,
                'detail' => [
                    'wallet' => $wallet->toArray(),
                    'job' => $job->toArray()
                ]
            ]);
            return true;
        }
        return false;
    }

}