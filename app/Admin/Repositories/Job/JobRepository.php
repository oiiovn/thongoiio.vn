<?php

namespace App\Admin\Repositories\Job;
use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Job\JobRepositoryInterface;
use App\Models\Job;
use Illuminate\Support\Facades\DB;

class JobRepository extends EloquentRepository implements JobRepositoryInterface
{

    protected $select = [];

    public function getModel(){
        return Job::class;
    }
    
    public function getPurposeStatistic(array $between = []){
        $this->instance = $this->model->select('money', 'money_product_addition', 'status', DB::raw('money + money_product_addition as money_total'));
        if(!empty($between)){
            $this->instance = $this->instance->whereBetween('created_at', $between);
        }
        $this->instance = $this->instance->isReal()->get();
        return $this->instance;
    }

    public function countAll(array $between = []){
        $this->instance = $this->model->selectRaw('status, COUNT(*) as total');
        if(!empty($between)){
            $this->instance = $this->instance->whereBetween('created_at', $between);
        }
        $this->instance = $this->instance->isReal()->groupBy('status')->get();
        return $this->instance;
    }

    public function clone(Job $job){
        DB::beginTransaction();
        try {
            $newJob = $job->replicate([
                'worker_id', 
                'money_product_addition'
            ]);
            $newJob->save();
            foreach($job->details as $detail){
                $detail->replicate()->fill([
                    'job_id' => $newJob->id
                ])->save();
            }
            DB::commit();
            return $newJob;
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return false;
        }
    }
    
    public function findByLockForUpdate($key, $value){
        $this->instance = $this->model->where($key, $value)->lockForUpdate()->first();
        return $this->instance;
    }

    public function findOrFailWithRelations($id, array $relations = ['details', 'histories', 'shop', 'worker'])
    {
        $this->findOrFail($id);
        $this->instance = $this->instance->load($relations);
        return $this->instance;
    }
    public function getQueryBuilderWithRelations(array $relations = ['shop', 'worker']){
        $this->getQueryBuilderOrderBy();
        $this->instance = $this->instance->with($relations);
        return $this->instance;
    }
    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC'){
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }
}