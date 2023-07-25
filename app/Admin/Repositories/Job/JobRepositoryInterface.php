<?php

namespace App\Admin\Repositories\Job;
use App\Admin\Repositories\EloquentRepositoryInterface;
use App\Models\Job;

interface JobRepositoryInterface extends EloquentRepositoryInterface
{
    public function getPurposeStatistic(array $between = []);
    public function countAll(array $between = []);
    public function clone(Job $job);
    public function findOrFailWithRelations($id, array $relations = ['details', 'histories', 'shop', 'worker']);
    public function getQueryBuilderWithRelations(array $relations = ['shop', 'worker']);
    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC');
}