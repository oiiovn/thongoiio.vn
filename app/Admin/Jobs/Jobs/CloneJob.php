<?php

namespace App\Admin\Jobs\Jobs;

use App\Models\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Admin\Repositories\Job\JobRepositoryInterface;

class CloneJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public $repository;
    
    public $ModelJob;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(JobRepositoryInterface $repository, Job $job)
    {
        $this->repository = $repository;
        $this->ModelJob = $job;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $this->repository->clone($this->ModelJob);
    }
}
