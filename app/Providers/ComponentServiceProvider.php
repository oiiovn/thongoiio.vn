<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class ComponentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('sidebar_home_left', \App\View\Components\SidebarHomeLeft::class);
        Blade::component('sidebar_home_right', \App\View\Components\SidebarHomeRight::class);
        Blade::component('card', \App\View\Components\Card::class);
        Blade::component('banner', \App\View\Components\Banner::class);
    }
}