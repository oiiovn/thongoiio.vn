<?php

namespace App\Http\Controllers\Job;

use App\Enums\Job\JobStatus;
use App\Enums\User\UserRoles;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Job\JobServiceInterface;
use App\Repositories\Job\JobRepositoryInterface;
use App\Http\Requests\Job\JobReceiveRequest;

class JobReceivedController extends Controller
{
    public $optionView;
    public function __construct(
        JobRepositoryInterface $repository,
        JobServiceInterface $service
    )
    {
        parent::__construct();
        $this->repository = $repository;
        $this->service = $service;
        $this->optionView = [
            'only_show' => true, 
            'show_full' => true
        ];
    }
    public function getView()
    {
        return [
            'index' => 'jobs.received.index',
            'show' => 'jobs.recieved.show',
            'job_simple' => 'jobs.loop.job-simple',
            'no_recorde' => 'others.empty-data',
        ];
    }
    public function getRoute()
    {
        return [
            'index' => 'job.recieved.index',
            'show' => 'job.show'
        ];
    }
    
    public function index($status, Request $request){
        $jobs = $this->service->indexReceived($status, $request);
        if($request->ajax()){
            return response()->json([
                'html' => $this->generateList($jobs) ?: ($request->input('page', 0) <= 1 ? view($this->view['no_recorde'])->render() : '')
            ], 200);
        }
        return view($this->view['index'], [
            'jobs' => $jobs,
            'option_view' => $this->optionView,
            'current_status' => $status
        ]);
    }

    public function store(JobReceiveRequest $request){
        $response = $this->service->storeReceive($request);
        if($response['status']){
            return to_route($this->route['show'], $response['job']->slug);
        }
        return back()->with('error', $response['msg']);
    }
    protected function generateList($data){
        $html = '';
        foreach($data as $job){
            $html .= view($this->view['job_simple'], array_merge([
                    'job' => $job, 
                ], 
                $this->optionView
            ))->render();
        }
        return $html;
    }
}
