<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        'App\Repositories\Setting\SettingRepositoryInterface' => 'App\Repositories\Setting\SettingRepository',
        'App\Repositories\Bank\BankRepositoryInterface' => 'App\Repositories\Bank\BankRepository',
        'App\Repositories\User\UserRepositoryInterface' => 'App\Repositories\User\UserRepository',
        'App\Repositories\Job\JobRepositoryInterface' => 'App\Repositories\Job\JobRepository',
        'App\Repositories\Attribute\AttributeRepositoryInterface' => 'App\Repositories\Attribute\AttributeRepository',
        'App\Repositories\Wallet\WalletRepositoryInterface' => 'App\Repositories\Wallet\WalletRepository',
        'App\Repositories\Reviews\ReviewsRepositoryInterface' => 'App\Repositories\Reviews\ReviewsRepository',
        'App\Repositories\News\NewsRepositoryInterface' => 'App\Repositories\News\NewsRepository',
        'App\Repositories\Privacy\PrivacyRepositoryInterface' => 'App\Repositories\Privacy\PrivacyRepository',
        'App\Repositories\Transactions\Deposit\DepositRepositoryInterface' => 'App\Repositories\Transactions\Deposit\DepositRepository',
        'App\Repositories\Transactions\Withdrawn\WithdrawnRepositoryInterface' => 'App\Repositories\Transactions\Withdrawn\WithdrawnRepository',
        'App\Repositories\Transactions\TransactionRepositoryInterface' => 'App\Repositories\Transactions\TransactionRepository',
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        foreach ($this->repositories as $interface => $implement) {
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
