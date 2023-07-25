<?php

namespace App\Repositories\Transactions\Withdrawn;
use App\Models\Withdrawn;
use App\Admin\Repositories\EloquentRepository;
use App\Repositories\Transactions\Withdrawn\WithdrawnRepositoryInterface;

class WithdrawnRepository extends EloquentRepository implements WithdrawnRepositoryInterface
{

    protected $select = [];

    public function getModel(){
        return Withdrawn::class;
    }

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC'){
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }

    public function findbyCode($code){
        $this->instance = $this->model->whereCode($code)->first();
        return $this->instance;
    }

    public function findbyIDwithRelation($id, $relation= []){
        $this->instance = $this->model->whereId($id)->with($relation)->first();
        return $this->instance;
    }
    public function getQueryBuilderWithRelations($relations=['user']){
        $this->getQueryBuilderOrderBy();
        $this->instance = $this->instance->with($relations);
        return $this->instance;
    }
}