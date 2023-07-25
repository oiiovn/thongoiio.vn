<?php

namespace App\Admin\Repositories\Bank;
use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Bank\BankRepositoryInterface;
use App\Models\UserBankAccount;

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