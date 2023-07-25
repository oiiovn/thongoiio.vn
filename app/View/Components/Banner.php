<?php

namespace App\View\Components;

use App\Enums\Job\JobStatus;
use Illuminate\View\Component;
use App\Enums\User\UserRoles;

class Banner extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    protected $repository;
    protected $repositoryJob;
    public $users, $count_shop, $count_job;
 
    public function __construct()
    {
        //
        $this->repositoryJob = app()->make('App\Repositories\Job\JobRepositoryInterface');
        $this->repository = app()->make('App\Repositories\User\UserRepositoryInterface');
    }

    public function render()
    {
        
        $this->users = $this->repository->countAll();
        $this->count_shop = $this->users->where('roles', UserRoles::Shop)->sum('total');
        $this->count_job = $this->repositoryJob->countAll()->where('status', JobStatus::Completed)->sum('total');
        
        return view('components.banner');
    }
}
