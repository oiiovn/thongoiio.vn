<?php

namespace App\Repositories\User;

use App\Admin\Repositories\EloquentRepositoryInterface;

interface UserRepositoryInterface extends EloquentRepositoryInterface
{
    public function getTopJob(int $limit = 5);
    public function searchAllLimit($value = '', $meta = [], $select = [], $limit = 10);
    public function countAll();
}