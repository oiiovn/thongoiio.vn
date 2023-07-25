<?php

namespace App\Admin\Repositories\Wallet;
use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Wallet\WalletRepositoryInterface;
use App\Models\Wallet;
use App\Repositories\Setting\SettingRepositoryInterface as AdminSettingRepositoryInterface;
use Illuminate\Support\Facades\DB;

class WalletRepository extends EloquentRepository implements WalletRepositoryInterface
{
    protected $repositorySetting;

    //phi dich vu %
    protected $fee = 5;

    public function __construct(AdminSettingRepositoryInterface $repositorySetting)
    {
        parent::__construct();
        $this->repositorySetting = $repositorySetting;
        
    }
    public function getModel(){
        return Wallet::class;
    }

    public function findByLockForUpdateOrFail($column, $value){
        $this->instance = $this->model->where($column, $value)->lockForUpdate()->firstOrFail();
        return $this->instance;
    }

    public function decreaseAmount(Wallet $wallet, $amount, $exception = false){
        if($wallet->amount >= $amount || $exception){
            $wallet->update([
                'amount' => $wallet->amount - $amount
            ]);
            return $wallet;
        }
        return false;
    }

    public function increaseAmount(Wallet $wallet, $amount){
        $wallet->update([
            'amount' => $wallet->amount + $amount
        ]);
        return $wallet;
    }
}