<?php

namespace App\Admin\Repositories\Tutorial;
use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Tutorial\TutorialRepositoryInterface;
use App\Models\Tutorial;

class TutorialRepository extends EloquentRepository implements TutorialRepositoryInterface
{

    protected $select = [];

    public function getModel(){
        return Tutorial::class;
    }
    public function searchAllLimit($keySearch = '', $meta = [], $select = ['id', 'title', 'link', 'created_at'], $limit = 10){
        $this->instance = $this->model->select($select);
        $this->getQueryBuilderFindByKey($keySearch);

        foreach($meta as $key => $value){
            $this->instance = $this->instance->where($key, $value);
        }
        return $this->instance->limit($limit)->get();
    }

    protected function getQueryBuilderFindByKey($key){
        $this->instance = $this->instance->where(function($query) use ($key){
            return $query;
        });
    }

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'ASC'){
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }
}
