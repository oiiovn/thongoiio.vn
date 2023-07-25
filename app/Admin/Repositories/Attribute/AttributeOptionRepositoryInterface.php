<?php

namespace App\Admin\Repositories\Attribute;
use App\Admin\Repositories\EloquentRepositoryInterface;

interface AttributeOptionRepositoryInterface extends EloquentRepositoryInterface
{
    // public function getOrderByFollow(array $arrayId);

    public function findOrFailWithRelations($id , array $relations = ['attribute']);

    public function getQueryBuilderByColumn($column, $value);
	
    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC');

}