<?php

namespace App\Admin\Repositories\Job;
use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Job\JobDetailRepositoryInterface;
use App\Models\JobDetail;

class JobDetailRepository extends EloquentRepository implements JobDetailRepositoryInterface
{

    protected $select = [];

    public function getModel(){
        return JobDetail::class;
    }

    public function insert(array $data){
        return $this->model->insert($data);
    }
}