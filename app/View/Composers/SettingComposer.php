<?php
 
namespace App\View\Composers;
 
use App\Repositories\Setting\SettingRepositoryInterface;
use Illuminate\View\View;
 
class SettingComposer
{
    protected $repositorySetting;
 
    public function __construct(SettingRepositoryInterface $repositorySetting)
    {
        $this->repositorySetting = $repositorySetting;
    }
 
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('settings', $this->repositorySetting->getAll()->getInstance());
    }
}