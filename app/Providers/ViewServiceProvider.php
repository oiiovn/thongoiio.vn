<?php

namespace App\Providers;

use App\View\Composers\{SettingComposer, JobStatusNewComposer};
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer(
            ['components.layout.footer', 'components.layout.header', 'components.layout.head', 'components.banner'],
            SettingComposer::class
        );
        View::composer(
            ['jobs.loop.job-nav-status', 'components.layout.sidebar-home-left'],
            JobStatusNewComposer::class
        );
    }
}
