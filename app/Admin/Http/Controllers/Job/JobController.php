<?php

namespace App\Admin\Http\Controllers\Job;

use App\Admin\DataTables\Job\JobDataTable;
use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Job\JobRequest;
use App\Admin\Repositories\Job\JobRepositoryInterface;
use App\Admin\Services\Job\JobServiceInterface;
use App\Admin\Repositories\Attribute\AttributeRepositoryInterface;
use App\Enums\Job\JobStatus;

class JobController extends Controller
{
    //
    protected $repositoryAttribute;
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
    }

    public function getView(){
        return [
            'index' => 'admin.jobs.index',
            'create' => 'admin.jobs.create',
            'edit' => 'admin.jobs.edit'
        ];
    }

    public function getRoute(){
        return [
            'index' => 'admin.job.index',
            'create' => 'admin.job.create',
            'edit' => 'admin.job.edit',
            'delete' => 'admin.job.delete'
        ];
    }
    public function index(JobDataTable $dataTable){
        
        return $dataTable->render($this->view['index'], [
            'status' => JobStatus::asSelectArray(),
            'is_virtual' => [
                0 => __('No'),
                1 => __('Yes'),
            ]
        ]);
    }
    public function create(){
        $attributes = $this->repositoryAttribute->getAllWithRelations();

        return view($this->view['create'], compact('attributes'));
    }

    public function store(JobRequest $request){
        $response = $this->service->store($request);
        if($response['status']){
            return to_route($this->route['edit'], $response['data']->id);
        }
        return back()->with('error', $response['msg'])->withInput($request->all());
    }

    public function edit($id){
        $job = $this->repository->findOrFailWithRelations($id);
        return view($this->view['edit'], compact('job'));
    }

    public function update(JobRequest $request){
        $response = $this->service->update($request);
        if($response){
            return back()->with('success', __('notifySuccess'));
        }
        return back()->with('error', __('notifyFail'));
    }
    public function clone(JobRequest $request){
        $response = $this->service->clone($request);
        if($response['status']){
            return to_route($this->route['edit'], $response['data']->id);
        }
        return back()->with('error', $response['msg']);
    }
    public function delete($id){
        $this->service->delete($id);
        
        return redirect()->route($this->route['index'])->with('success', __('notifySuccess'));
    }
}
