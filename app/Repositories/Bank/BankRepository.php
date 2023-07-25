<?php

namespace App\Repositories\Bank;
use App\Models\UserBankAccount;
use App\Admin\Repositories\EloquentRepository;
use App\Repositories\Bank\BankRepositoryInterface;

class BankRepository extends EloquentRepository implements BankRepositoryInterface
{

    protected $select = [];

    public function getModel(){
        return UserBankAccount::class;
    }

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC'){
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }
}