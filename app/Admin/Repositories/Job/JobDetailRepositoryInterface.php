<?php

namespace App\Admin\Repositories\Job;
use App\Admin\Repositories\EloquentRepositoryInterface;

interface JobDetailRepositoryInterface extends EloquentRepositoryInterface
{
    public function insert(array $data);
}