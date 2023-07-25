<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;
use App\Models\User;

class SidebarHomeRight extends Component
{
    public $jobs, $users;
    private $repositoryJob, $repositoryUser;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->repositoryJob = app()->make('App\Repositories\Job\JobRepositoryInterface');
        $this->repositoryUser = app()->make('App\Repositories\User\UserRepositoryInterface');
        if(auth()->check()){
            $this->jobs = $this->repositoryJob->getByCurrentAuthLatestReceive();
        }
        $this->users = $this->repositoryUser->getTopJob();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout.sidebar-home-right');
    }
}
