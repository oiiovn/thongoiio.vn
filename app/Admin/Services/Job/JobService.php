<?php

namespace App\Admin\Services\Job;

use App\Admin\Jobs\Jobs\CloneJob;
use App\Admin\Repositories\Attribute\AttributeRepositoryInterface;
use App\Admin\Services\Job\JobServiceInterface;
use App\Admin\Repositories\Job\{JobRepositoryInterface, JobDetailRepositoryInterface};
use App\Admin\Repositories\Transaction\TransactionRepositoryInterface;
use App\Admin\Repositories\Wallet\WalletRepositoryInterface;
use App\Repositories\Setting\SettingRepositoryInterface;
use App\Enums\Job\JobStatus;
use App\Enums\Transaction\{TransactionStatus, TransactionType};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobService implements JobServiceInterface
{
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;
    protected $dataDetail = [];
    
    protected $repository;
    protected $repositoryJobDetail;
    protected $repositoryAttribute;
    protected $repositorySetting;
    protected $repositoryWallet;
    protected $repositoryTransaction;

    public function __construct(
        JobRepositoryInterface $repository,
        JobDetailRepositoryInterface $repositoryJobDetail,
        AttributeRepositoryInterface $repositoryAttribute,
        SettingRepositoryInterface $repositorySetting,
        WalletRepositoryInterface $repositoryWallet,
        TransactionRepositoryInterface $repositoryTransaction
    ){
        $this->repository = $repository;
        $this->repositoryJobDetail = $repositoryJobDetail;
        $this->repositoryAttribute = $repositoryAttribute;
        $this->repositorySetting = $repositorySetting;
        $this->repositoryWallet = $repositoryWallet;
        $this->repositoryTransaction = $repositoryTransaction;
    }
    
    public function store(Request $request){
        $this->data = $request->validated();
        $this->data['money'] = $this->data['money_product'] = 0;
        $this->data['note'] = '';
        if(!$this->makeDataDetail($this->data['attribute_option_id'])){
            return ['status' => false, 'msg' => __('notifyFail')];
        }
        
        $wallet = $this->repositoryWallet->findByLockForUpdateOrFail('user_id', auth()->user()->id ?? $this->data['shop_id']);
        $isVirtual = isset($this->data['is_virtual']) && $this->data['is_virtual'];
        
        if(!$isVirtual && $wallet->amount < $this->data['money']){
            return ['status' => false, 'msg' => __('notEnoughMoney')];
        }

        unset($this->data['attribute_option_id']);
        DB::beginTransaction();
        try {
            $job = $this->repository->create($this->data);
            $this->storeDetail($job->id);

            if(!$isVirtual && !$this->handleCharge($wallet, $job->money, $job, __('transactionCreateJob'))){
                DB::rollBack();
                return ['status' => false, 'msg' => __('notEnoughMoney')];
            }
            
            // $this->queueClone($request, $job);

            DB::commit();
            return ['status' => true, 'msg' => __('notifySuccess'), 'data' => $job];
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollBack();
            return ['status' => false, 'msg' => __('notifyFail')];
        }
    }

    public function update(Request $request){
        
        $this->data = $request->validated();
        if(isset($this->data['is_cancelled']) && $this->data['is_cancelled'] == true){
            $this->data['status'] = JobStatus::Cancelled;
            unset($this->data['is_cancelled']);
        }

        return $this->repository->update($this->data['id'], $this->data);
    }
    public function clone(Request $request){
        $job = $this->repository->findOrFail($request->input('id'));
        return $this->handleClone(
            $job, 
            $this->repositoryWallet->findByLockForUpdateOrFail('user_id', $job->shop_id)
        );
    }

    public function delete($id){
        return $this->repository->delete($id);

    }

    protected function storeDetail($jobId){
        $this->dataDetail = array_map(function($item) use ($jobId){
            $item['job_id'] = $jobId;
            return $item;
        }, $this->dataDetail);
        $this->repositoryJobDetail->insert($this->dataDetail);
    }

    protected function makeDataDetail($attributeOptions){
        $attributes = $this->repositoryAttribute->getAllWithOneOptions($attributeOptions);
        foreach($attributes as $attribute){
            if(!$attribute->option){
                return false;
            }
            $this->data['money'] += $attribute->option->price;
            if($attribute->option->note){
                $this->data['note'] .= "<p>- {$attribute->option->note}</p>";
            }
            $this->dataDetail[] = [
                'name_attribute' => $attribute->name,
                'name_attribute_option' => $attribute->option->name,
                'unit_price' => $attribute->option->price,
                'meta' => $attribute->isTypeButton() ? json_encode(['attribute_type_button' => $attribute->option->meta->toArray()]) : null
            ];
        }
        return true;
    }
    public function handleCharge($wallet, $amount, $job, $note, $exception = false){
        $wallet = $this->repositoryWallet->decreaseAmount($wallet, $amount, $exception);
        if($wallet){
            $this->repositoryTransaction->create([
                'user_id' => $wallet->user_id,
                'type_id' => $job->id,
                'type' => TransactionType::Job,
                'amount' => -$amount,
                'fee' => -0,
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

    protected function handleClone($job, $wallet){
        if($job->isReal() && $wallet->amount < $job->money){
            return ['status' => false, 'msg' => __('notEnoughMoney')];
        }
        DB::beginTransaction();
        try {
            $jobNew = $this->repository->clone($job);
            if($job->isReal() && !$this->handleCharge($wallet, $jobNew->money, $jobNew, __('transactionCloneJob'))){
                DB::rollBack();
                return ['status' => false, 'msg' => __('notEnoughMoney')];
            }
            DB::commit();
            return ['status' => true, 'msg' => __('notifySuccess'), 'data' => $jobNew];
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollBack();
            return ['status' => false, 'msg' => __('notifyFail')];
        }
    }

    protected function queueClone($request, $job){
        $request->whenFilled('qty_worker', function ($qty_worker) use($job) {
            $qty_worker = (int)$qty_worker - 1;
            if($qty_worker >= 1){
                $delay = $this->repositorySetting->getValueByKey('job_time_clone') ?? 0;
                for($i = 1; $i <= $qty_worker; $i++){
                    CloneJob::dispatch($this->repository, $job)->delay($delay * $i * 60);
                }
            }
        });
    }
}