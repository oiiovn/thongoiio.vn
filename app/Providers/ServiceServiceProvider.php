<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    protected $services = [
        'App\Services\User\UserServiceInterface' => 'App\Services\User\UserService',
        'App\Services\Bank\BankServiceInterface' => 'App\Services\Bank\BankService',
        'App\Services\Job\JobServiceInterface' => 'App\Services\Job\JobService',
        'App\Services\Reviews\ReviewsServiceInterface' => 'App\Services\Reviews\ReviewsService',
        'App\Services\Transactions\Deposit\DepositServiceInterface' => 'App\Services\Transactions\Deposit\DepositService',
        'App\Services\Wallet\WalletServiceInterface' => 'App\Services\Wallet\WalletService',
        'App\Services\Transactions\Withdrawn\WithdrawnServiceInterface' => 'App\Services\Transactions\Withdrawn\WithdrawnService',
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        foreach ($this->services as $interface => $implement) {
            $this->app->singleton($interface, $implement);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
