<?php

namespace App\Repositories\Wallet;
use App\Models\Wallet;
use App\Admin\Repositories\Wallet\WalletRepository as AdminWalletRepository;
use App\Repositories\Wallet\WalletRepositoryInterface;

class WalletRepository extends AdminWalletRepository implements WalletRepositoryInterface
{
    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC'){
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }

    public function findbyCode($code){
        $this->instance = $this->model->whereCode($code)->first();
        return $this->instance;
    }
}