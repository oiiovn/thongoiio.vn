<?php

namespace App\Repositories\Wallet;

use App\Admin\Repositories\Wallet\WalletRepositoryInterface as AdminWalletWalletRepositoryInterface;

interface WalletRepositoryInterface extends AdminWalletWalletRepositoryInterface
{
    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC');
    public function findbyCode($code);
}