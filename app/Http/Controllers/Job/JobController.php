<?php

namespace App\Http\Controllers\Job;

use App\Http\Requests\Job\JobRequest;
use App\Http\Controllers\Controller;
use App\Services\Job\JobServiceInterface;
use App\Repositories\Job\JobRepositoryInterface;
use App\Repositories\Setting\SettingRepositoryInterface;
use App\Repositories\Wallet\WalletRepositoryInterface;

class JobController extends Controller
{
    //
    protected $repositoryWallet;
    protected $repositorySetting;
    public function __construct(
        JobRepositoryInterface $repository,
        WalletRepositoryInterface $repositoryWallet,
        SettingRepositoryInterface $repositorySetting,
        JobServiceInterface $service
    )
    {
        parent::__construct();
        $this->repository = $repository;
        $this->repositoryWallet = $repositoryWallet;
        $this->repositorySetting = $repositorySetting;
        $this->service = $service;
    }

    public function getView()
    {
        return [
            'show' => 'jobs.show'
        ];
    }
    public function getRoute()
    {
        return [
            'show' => 'job.show'
        ];
    }
    
    public function show($slug){
        $job = $this->repository->findBySlugLoadRelations($slug, ['details', 'histories', 'worker.contact', 'shop' => function($query) {
            $query->with('contact')->statisticReviews();
        }]);
        return view($this->view['show'], [
            'job' => $job
        ]);
    }

    public function updateProccess(JobRequest $request){
        $response = $this->service->updateProccess($request);
        if($response){
            return back()->with('success', __('notifySuccess'));
        }
        return back()->with('error', __('notifyFail'));
    }

    public function updateHistoryProccess(JobRequest $request){
        $response = $this->service->updateHistoryProccess($request);
        if($response){
            return back()->with('success', __('notifySuccess'));
        }
        return back()->with('error', __('notifyFail'));
    }
    
    public function cancel(JobRequest $request){
        $response = $this->service->cancel($request);
        if($response['status']){
            return back()->with('success', $response['msg']);
        }
        return back()->with('error', $response['msg']);
    }
}
