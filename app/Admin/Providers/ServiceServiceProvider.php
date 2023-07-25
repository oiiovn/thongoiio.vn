<?php

namespace App\Admin\Providers;

use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    protected $services = [
        'App\Admin\Services\Admin\AdminServiceInterface' => 'App\Admin\Services\Admin\AdminService',
        'App\Admin\Services\User\UserServiceInterface' => 'App\Admin\Services\User\UserService',
        'App\Admin\Services\Attribute\AttributeServiceInterface' => 'App\Admin\Services\Attribute\AttributeService',
        'App\Admin\Services\Attribute\AttributeOptionServiceInterface' => 'App\Admin\Services\Attribute\AttributeOptionService',
        'App\Admin\Services\Job\JobServiceInterface' => 'App\Admin\Services\Job\JobService',
        'App\Admin\Services\Bank\BankServiceInterface' => 'App\Admin\Services\Bank\BankService',
        'App\Admin\Services\News\NewsServiceInterface' => 'App\Admin\Services\News\NewsService',
        'App\Admin\Services\Privacy\PrivacyServiceInterface' => 'App\Admin\Services\Privacy\PrivacyService',
        'App\Admin\Services\Tutorial\TutorialServiceInterface' => 'App\Admin\Services\Tutorial\TutorialService',
        'App\Admin\Services\Transaction\TransactionServiceInterface' => 'App\Admin\Services\Transaction\TransactionService',
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
