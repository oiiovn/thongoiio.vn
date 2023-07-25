<?php

namespace App\Observers;

use App\Enums\Job\JobStatus;
use App\Models\Job;
use App\Models\JobHistory;
use App\Models\JobStatusNew;
use Illuminate\Support\Facades\DB;

class JobObserver
{
    /**
     * Handle the Job "replicating" event.
     *
     * @param  \App\Models\Job  $job
     * @return void
     */
    public function replicating(Job $job)
    {
        $job->fill([
            'code' => 'J'.uniqid_real(),
            'slug' => str()->uuid(),
            'status' => JobStatus::NotReceived,
        ]);
    }
    /**
     * Handle the Job "creating" event.
     *
     * @param  \App\Models\Job  $job
     * @return void
     */
    public function creating(Job $job)
    {
        if(auth()->check() && auth()->user()->isShop() && request()->routeIs('job.manager.store')){
            $job->shop_id = auth()->user()->id;    
        }
        $job->code = 'J'.uniqid_real();
        $job->slug = str()->uuid();
        $job->status = JobStatus::NotReceived;
    }
    /**
     * Handle the Job "created" event.
     *
     * @param  \App\Models\Job  $job
     * @return void
     */
    public function created(Job $job)
    {
        //
        $job->histories()->create([
            'status' => JobStatus::NotReceived,
            'detail' => $job
        ]);
    }
    /**
     * Handle the Job "updating" event.
     *
     * @param  \App\Models\Job  $job
     * @return void
     */
    public function updating(Job $job)
    {
        
        if($job->isDirty('status')){
            $job->step_at = now();
        }
    }
    /**
     * Handle the Job "updated" event.
     *
     * @param  \App\Models\Job  $job
     * @return void
     */
    public function updated(Job $job)
    {
        //
        if($job->status == JobStatus::Cancelled || $job->status == JobStatus::Received){
            //Truong hop admin cancel và ctv nhan viec
            $job->histories()->create([
                'status' => $job->status,
                'detail' => $job
            ]);
            $job->blacklist()->delete();
        }
    }

    /**
     * Handle the Job "deleted" event.
     *
     * @param  \App\Models\Job  $job
     * @return void
     */
    public function deleted(Job $job)
    {
        //
    }

    /**
     * Handle the Job "restored" event.
     *
     * @param  \App\Models\Job  $job
     * @return void
     */
    public function restored(Job $job)
    {
        //
    }

    /**
     * Handle the Job "force deleted" event.
     *
     * @param  \App\Models\Job  $job
     * @return void
     */
    public function forceDeleted(Job $job)
    {
        //
    }
}
