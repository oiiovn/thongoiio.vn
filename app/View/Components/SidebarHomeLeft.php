<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SidebarHomeLeft extends Component
{
    public $user, $news;

    public function __construct()
    {
        $this->user =  auth()->user();
        $this->news = app()->make(
            'App\Repositories\News\NewsRepositoryInterface'
        )->searchAllLimit();
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout.sidebar-home-left');
    }
}
