<?php

namespace App\Admin\Repositories\Wallet;

use App\Admin\Repositories\EloquentRepositoryInterface;
use App\Models\Wallet;

interface WalletRepositoryInterface extends EloquentRepositoryInterface
{
    public function findByLockForUpdateOrFail($column, $value);
    public function decreaseAmount(Wallet $wallet, $amount, $exception = false);
    public function increaseAmount(Wallet $wallet, $amount);
}