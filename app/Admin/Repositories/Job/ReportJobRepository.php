<?php

namespace App\Admin\Repositories\Job;
use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Job\ReportJobRepositoryInterface;
use App\Models\ReportJob;

class ReportJobRepository extends EloquentRepository implements ReportJobRepositoryInterface
{
    public function getModel(){
        return ReportJob::class;
    }
}