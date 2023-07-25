<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repositories\Job\JobRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $repositoryJob;

    public function __construct(
        JobRepositoryInterface $repositoryJob,
    )
    {
        parent::__construct();
        $this->repositoryJob = $repositoryJob;
    }
    
    public function getView()
    {
        return [
            'index' => 'home.index',
            'job_simple' => 'jobs.loop.job-simple',
        ];
    }
    public function index(Request $request) {
        $jobs = $this->repositoryJob->getByWithRelations('status', [], [
                'details', 
                'shop' => function($query) {
                    $query->with('contact')->statisticReviews();
                }
            ]
        );
        if($request->ajax()){
            return response()->json([
                'html' => $this->generateList($jobs)
            ], 200);
        }
        return view($this->view['index'], compact('jobs'));
    }

    protected function generateList($data){
        $html = '';
        foreach($data as $job){
            $html .= view($this->view['job_simple'], [
                'job' => $job, 
                'only_show' => false, 
                'show_full' => true
            ])->render();
        }
        return $html;
    }
}
