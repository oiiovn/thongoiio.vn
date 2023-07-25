<?php

namespace App\Admin\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        'App\Admin\Repositories\Admin\AdminRepositoryInterface' => 'App\Admin\Repositories\Admin\AdminRepository',
        'App\Admin\Repositories\User\UserRepositoryInterface' => 'App\Admin\Repositories\User\UserRepository',
        'App\Admin\Repositories\Attribute\AttributeRepositoryInterface' => 'App\Admin\Repositories\Attribute\AttributeRepository',
        'App\Admin\Repositories\Attribute\AttributeOptionRepositoryInterface' => 'App\Admin\Repositories\Attribute\AttributeOptionRepository',
        'App\Admin\Repositories\Setting\SettingRepositoryInterface' => 'App\Admin\Repositories\Setting\SettingRepository',
        'App\Admin\Repositories\Job\JobRepositoryInterface' => 'App\Admin\Repositories\Job\JobRepository',
        'App\Admin\Repositories\Job\JobDetailRepositoryInterface' => 'App\Admin\Repositories\Job\JobDetailRepository',
        'App\Admin\Repositories\Bank\BankRepositoryInterface' => 'App\Admin\Repositories\Bank\BankRepository',
        'App\Admin\Repositories\Wallet\WalletRepositoryInterface' => 'App\Admin\Repositories\Wallet\WalletRepository',
        'App\Admin\Repositories\Transaction\TransactionRepositoryInterface' => 'App\Admin\Repositories\Transaction\TransactionRepository',
        'App\Admin\Repositories\Job\ReportJobRepositoryInterface' => 'App\Admin\Repositories\Job\ReportJobRepository',
        'App\Admin\Repositories\News\NewsRepositoryInterface' => 'App\Admin\Repositories\News\NewsRepository',
        'App\Admin\Repositories\Privacy\PrivacyRepositoryInterface' => 'App\Admin\Repositories\Privacy\PrivacyRepository',
        'App\Admin\Repositories\Tutorial\TutorialRepositoryInterface' => 'App\Admin\Repositories\Tutorial\TutorialRepository',
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
