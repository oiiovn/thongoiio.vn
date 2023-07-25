<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
        \App\Models\Job::observe(\App\Observers\JobObserver::class);
        \App\Models\Transaction::observe(\App\Observers\TransactionObserver::class);
        \App\Models\User::observe(\App\Observers\UserObserver::class);
        \App\Models\News::observe(\App\Observers\NewsObserver::class);
        \App\Models\Privacy::observe(\App\Observers\PrivacyObserver::class);
        \App\Models\Tutorial::observe(\App\Observers\TutorialObserver::class);
        \App\Models\Deposit::observe(\App\Observers\DepositObserver::class);
        \App\Models\Withdrawn::observe(\App\Observers\WithdrawnObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
