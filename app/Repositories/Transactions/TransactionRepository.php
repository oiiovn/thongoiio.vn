<?php

namespace App\Repositories\Transactions;
use App\Models\Deposit;
use App\Models\Transaction;
use App\Admin\Repositories\EloquentRepository;
use App\Repositories\Transactions\TransactionRepositoryInterface;

class TransactionRepository extends EloquentRepository implements TransactionRepositoryInterface
{

    protected $select = [];

    public function getModel(){
        return Transaction::class;
    }

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC'){
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }

    public function getQueryBuilderByUserOrderBy($userid, $column = 'id', $sort = 'DESC'){
        $this->instance = $this->model->where('user_id', $userid)->orderBy($column, $sort);
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