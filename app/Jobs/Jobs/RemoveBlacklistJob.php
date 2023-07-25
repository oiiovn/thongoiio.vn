<?php

namespace App\Jobs\Jobs;

use App\Enums\User\UserRoles;
use App\Models\UserBlacklistJob;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RemoveBlacklistJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public $repositorySetting;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->repositorySetting = app()->make('App\Repositories\Setting\SettingRepositoryInterface');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        UserBlacklistJob::whereNotNull('expired_at')
        ->where(
            'expired_at', 
            '<', 
            now()->subDays(
                $this->repositorySetting->getValueByKey('job_time_blacklist_expired')
            )
        )->delete();
    }
}
