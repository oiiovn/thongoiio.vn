<?php

namespace App\Repositories\Transactions\Deposit;
use App\Admin\Repositories\EloquentRepository;
use App\Models\Deposit;
use App\Repositories\Transactions\Deposit\DepositRepositoryInterface;

class DepositRepository extends EloquentRepository implements DepositRepositoryInterface
{

    protected $select = [];

    public function getModel(){
        return Deposit::class;
    }

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC'){
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }

    public function findbyCode($code){
        $this->instance = $this->model->whereCode($code)->first();
        return $this->instance;
    }

    public function getQueryBuilderWithRelations($relations=['user']){
        $this->getQueryBuilderOrderBy();
        $this->instance = $this->instance->with($relations);
        return $this->instance;
    }
}