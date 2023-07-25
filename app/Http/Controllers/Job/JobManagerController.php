<?php

namespace App\Http\Controllers\Job;

use App\Enums\Job\JobStatus;
use App\Enums\User\UserRoles;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Attribute\AttributeRepositoryInterface;
use App\Services\Job\JobServiceInterface;
use App\Http\Requests\Job\JobManagerRequest;
use App\Models\JobStatusNew;
use App\Repositories\Job\JobRepositoryInterface;

class JobManagerController extends Controller
{
    //
    protected $repositoryAttribute;
    public $optionView, $modelJobStatusNew;
    public function __construct(
        JobRepositoryInterface $repository,
        AttributeRepositoryInterface $repositoryAttribute,
        JobServiceInterface $service
    )
    {
        parent::__construct();
        $this->repository = $repository;
        $this->repositoryAttribute = $repositoryAttribute;
        $this->service = $service;
        $this->optionView = [
            'only_show' => true, 
            'show_full' => false
        ];
        $this->modelJobStatusNew = new JobStatusNew();
    }

    public function getView()
    {
        return [
            'index' => 'jobs.manager.index',
            'create' => 'jobs.manager.create',
            'show' => 'jobs.show',
            'job_simple' => 'jobs.loop.job-simple',
            'no_recorde' => 'others.empty-data',
        ];
    }
    public function getRoute()
    {
        return [
            'index' => 'job.manager.index',
            'create' => 'job.manager.create',
            'show' => 'job.manager.show',
        ];
    }
    
    public function index($status, Request $request){
        if(!JobStatus::tryFrom($status)){
            return abort(404);
        }
        if(!$request->input('page')){
            $this->modelJobStatusNew->authResetNumber($status, UserRoles::Shop);
        }
        
        $jobs = $this->repository->getByCurrentAuthShopWithRelations('status', $status);

        if($request->ajax()){
            return response()->json([
                'html' => $this->generateList($jobs) ?: ($request->input('page', 0) <= 1 ? view($this->view['no_recorde'])->render() : '')
            ], 200);
        }

        return view($this->view['index'], [
            'job_status' => JobStatus::asSelectArray(),
            'jobs' => $jobs,
            'option_view' => $this->optionView,
            'current_status' => $status
        ]);
    }
    
    public function show($slug){
        $job = $this->repository->findBySlugLoadRelations($slug);
        return view($this->view['show'], [
            'job' => $job
        ]);
    }

    public function create(){
        $attributes = $this->repositoryAttribute->getAllWithRelations();
        return view($this->view['create'], compact('attributes'));
    }

    public function store(JobManagerRequest $request){
        $response = $this->service->store($request);
        if($response['status']){
            return to_route($this->route['show'], $response['data']->slug);
        }
        return back()->with('error', $response['msg'])->withInput($request->all());
    }

    public function clone(JobManagerRequest $request){
        $response = $this->service->clone($request);
        if($response['status']){
            return to_route($this->route['show'], $response['data']->slug);
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
