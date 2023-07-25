<?php

namespace App\Admin\Repositories\Transaction;
use App\Models\User;
use App\Models\Transaction;
use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Transaction\TransactionRepositoryInterface;

class TransactionRepository extends EloquentRepository implements TransactionRepositoryInterface
{

    protected $select = [];

    public function getModel(){
        return Transaction::class;
    }
    
    public function totalFee(){
        $this->instance = $this->model->sum('fee');
        return $this->instance;
    }
}