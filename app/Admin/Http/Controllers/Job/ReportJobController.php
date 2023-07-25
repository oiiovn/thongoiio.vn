<?php

namespace App\Admin\Http\Controllers\Job;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Repositories\Job\ReportJobRepositoryInterface;

class ReportJobController extends Controller
{
    //
    public function __construct(
        ReportJobRepositoryInterface $repository
    )
    {
        parent::__construct();
        $this->repository = $repository;
    }

    public function getView()
    {
        return [
            'index' => 'admin.jobs.reports.index'
        ];
    }

    public function index(){

    }

}
