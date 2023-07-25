<?php
 
namespace App\View\Composers;

use App\Models\JobStatusNew;
use Illuminate\View\View;
 
class JobStatusNewComposer
{
    public $modelJobStatusNew;
 
    public function __construct()
    {
        $this->modelJobStatusNew = new JobStatusNew();
    }
 
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        
        $view->with('job_status', $this->modelJobStatusNew->getJobStatusWithNumber());
    }
}