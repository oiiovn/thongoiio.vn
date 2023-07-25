<?php

namespace App\Jobs\Jobs;

use App\Enums\User\UserRoles;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class AutoResolveJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public $repositoryJob;
    public $repositorySetting;
    public $repositoryWallet;
    public $serviceJob;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->repositoryJob = app()->make('App\Repositories\Job\JobRepositoryInterface');
        $this->repositorySetting = app()->make('App\Repositories\Setting\SettingRepositoryInterface');
        $this->repositoryWallet = app()->make('App\Repositories\Wallet\WalletRepositoryInterface');
        $this->serviceJob = app()->make('App\Services\Job\JobServiceInterface');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $jobs = $this->repositoryJob->getPause();
        foreach($jobs as $job){
            DB::beginTransaction();
            try {
                if($job->nextRoleResponsibility() == UserRoles::Member){
                    $this->repositoryJob->cancel($job, __('autoCancelJob'), true);
                    $this->serviceJob->handleAddMoney(
                        $this->repositoryWallet->findByLockForUpdateOrFail('user_id', $job->worker_id), 
                        $job,
                        __('transactionRefunCancelJob'),
                        false
                    );
                    $this->serviceJob->handleCharge(
                        $this->repositoryWallet->findByLockForUpdateOrFail('user_id', $job->worker_id), 
                        $this->repositorySetting->getValueByKey('job_fines_price'), 
                        $job, 
                        __('transactionCancelJob'),
                        true
                    );
                }elseif($job->nextRoleResponsibility() == UserRoles::Shop){
                    $this->repositoryJob->complete($job, __('autoCompleteJob'));
                    $this->serviceJob->handleAddMoney(
                        $this->repositoryWallet->findByLockForUpdateOrFail('user_id', $job->worker_id), 
                        $job,
                        __('transactionCompleteJob')
                    );
                }
                DB::commit();
                return true;
            } catch (\Throwable $th) {
                DB::rollBack();
                throw $th;
                return false;
            }
        }
    }
}
