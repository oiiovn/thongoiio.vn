<?php

namespace App\Repositories\Job;
use App\Admin\Repositories\Job\JobRepository as AdminJobRepository;
use App\Enums\Job\JobStatus;
use App\Enums\User\UserRoles;
use App\Repositories\Job\JobRepositoryInterface;
use App\Models\Job;
use App\Models\JobStatusNew;
use App\Repositories\Setting\SettingRepository;
use Illuminate\Support\Facades\DB;

class JobRepository extends AdminJobRepository implements JobRepositoryInterface
{
    protected $repositorySetting;
    public function __construct(SettingRepository $repositorySetting)
    {
        parent::__construct();
        $this->repositorySetting = $repositorySetting;
    }

    public function getPause(){
        $this->getQueryBuilder();
        $this->instance = $this->instance->select('id', 'shop_id', 'worker_id', 'status', 'step_at')
        ->whereIn('status', [
            JobStatus::Received, 
            JobStatus::Ordered, 
            JobStatus::OrderConfirmed, 
            JobStatus::Reviewed
        ])
        ->where('step_at', '<', now()->subDays($this->repositorySetting->getValueByKey('job_auto_complete_and_cancel')))
        ->get();
        return $this->instance;
    }

    public function cancel(Job $job, $desc, $notifyAll = false){
        if($job->canCancel()){
            $this->model->withoutEvents(function () use($job){
                $job->update([
                    'status' => JobStatus::Cancelled
                ]);
            });
            $job->histories()->create([
                'status' => JobStatus::Cancelled,
                'desc' => $desc,
                'detail' => $job
            ]);
            if($notifyAll){
                
                $jobStautsNew = JobStatusNew::whereIn('user_id', [$job->worker_id, $job->shop_id]);

            }else{
                
                $type = auth()->user()->isShop() ? UserRoles::Member : UserRoles::Shop;
                
                $jobStautsNew = JobStatusNew::where('user_id', $type == UserRoles::Member ? $job->worker_id : $job->shop_id)
                    ->where('type', $type);    
            }
            
            $jobStautsNew->where('status', $this->instance->status->nextCase())
            ->update([
                'number' => DB::raw('number + 1')
            ]);
            
            $job->blacklist()->delete();
            return $job;
        }
        return false;
    }

    public function complete(Job $job, $desc){
        if($job->canComplete()){
            $this->model->withoutEvents(function () use($job){
                $job->update([
                    'status' => JobStatus::Completed
                ]);
            });
            $job->histories()->create([
                'status' => JobStatus::Completed,
                'desc' => $desc,
                'detail' => $job
            ]);
            $job->blacklist()->delete();
            return $job;
        }
        return false;
    }
    public function updateHistoryProccess($id, $money_product_addition = 0, $desc = ''){
        $job = $this->findOrFail($id);
        if(!$job->canEditHistory()){
            return false;
        }
        DB::beginTransaction();
        try {
            $job->update([
                'money_product_addition' => $money_product_addition
            ]);
            $job->history()->where('status', JobStatus::Ordered)->update([
                'desc' => $desc,
                'detail' => $job
            ]);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
            return false;
        }
    }

    public function updateProccess($id, $money_product_addition = 0, $desc = ''){
        $this->findOrFail($id);
        if($this->instance->hasNextStatus() && $this->instance->accessNextStatus()){
            $data = [
                'status' => $this->instance->status->nextCase()
            ];
            if($this->instance->nextStatusHasMoneyProductAddition()){
                $data['money_product_addition'] = $money_product_addition;
            }
            
            $this->model->withoutEvents(function () use($data) {
                $this->instance->update($data);
            });
            
            $this->instance->histories()->create([
                'status' => $data['status'],
                'desc' => $desc,
                'detail' => $this->instance
            ]);
            if($type = $this->instance->nextRoleNotifyStatusNew()){
                JobStatusNew::where('user_id', $type == UserRoles::Member ? $this->instance->worker_id : $this->instance->shop_id)
                ->where('type', $type)
                ->where('status', $this->instance->status)
                ->update([
                    'number' => DB::raw('number + 1')
                ]);
            }
            if($data['status'] == JobStatus::Completed){
                $this->instance->blacklist()->update([
                    'expired_at' => now()->addDays($this->repositorySetting->getValueByKey('job_time_blacklist_expired'))
                ]);
            }

            return $this->instance;
        }
        return false;
    }

    public function findBySlugLoadRelations(string $slug, array $relations = ['details', 'histories', 'worker', 'shop']){
        $this->findBySlug($slug);
        $this->instance = $this->instance->load($relations);
        return $this->instance;
    }

    public function findBySlug($slug){
        $this->findBy('slug', $slug);
        return $this->instance;
    }

    public function findBy($column, $value){
        $this->instance = $this->model->where($column, $value)->firstOrFail();
        $this->authorize();
        return $this->instance;
    }
    public function findOrFail($id){
        $this->instance = $this->model->findOrFail($id);
        $this->authorize();
        return $this->instance;
    }
    
    public function findByCode($code){
        $this->instance = $this->model->where('code', $code)->canReceive()->lockForUpdate()->first();
        return $this->instance;
    }
    
    public function updateByModel(Job $job, $data){
        $job->update($data);
        return $job;
    }

    public function workerReceive(Job $job, $worker_id)
    {
        $job->update([
            'worker_id' => $worker_id,
            'status' => JobStatus::Received,
            'receive_at' => now()
        ]);
        JobStatusNew::where('user_id', $job->shop_id)
        ->where('type', UserRoles::Shop)
        ->where('status', $job->status)
        ->update([
            'number' => DB::raw('number + 1')
        ]);
        $job->blacklist()->create([
            'shop_id' => $job->shop_id,
            'worker_id' => $worker_id
        ]);
        return $job;
    }
    public function getByCurrentAuthLatestReceive(int $limit = 5){
        $this->getQueryBuilderOrderBy();
        $this->instance = $this->instance->currentAuthWorker()
        ->reorder('step_at', 'desc')
        ->limit($limit)
        ->get();
        return $this->instance;
    }

    public function getByCurrentAuthShopWithRelations($column, $value, $relations = ['details'], $perPage = 10){
        $this->getByQueryBuilderRelations($column, $value, $relations);
        $this->instance = $this->instance->currentAuthShop();
        return $this->instance->paginate($perPage);
    }
    
    public function getByCurrentAuthWorkerWithRelations($column, $value, $relations = ['details'], $perPage = 10){
        $this->getByQueryBuilderRelations($column, $value, $relations);
        $this->instance = $this->instance->currentAuthWorker();
        return $this->instance->paginate($perPage);
    }

    public function getByWithRelations($column, $value, $relations = ['details', 'shop'], $perPage = 10){
        $this->getByQueryBuilderRelations($column, $value, $relations);
        return $this->instance->paginate($perPage);
    }
    protected function getByQueryBuilderRelations($column, $value, $relations = []){
        $this->getQueryBuilderOrderBy();
        if(is_array($value) && !empty($value)){
            $this->instance = $this->instance->whereIn($column, $value);
        }elseif($value){
            $this->instance = $this->instance->where($column, $value);
        }
        $this->instance = $this->instance->with($relations);
    }
}