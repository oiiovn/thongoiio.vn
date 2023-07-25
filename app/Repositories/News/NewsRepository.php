<?php

namespace App\Repositories\News;
use App\Admin\Repositories\EloquentRepository;
use App\Repositories\News\NewsRepositoryInterface;
use App\Models\News;

class NewsRepository extends EloquentRepository implements NewsRepositoryInterface
{

    protected $select = [];

    public function getModel(){
        return News::class;
    }
    public function searchAllLimit($keySearch = '', $meta = [], $select = ['id', 'slug','title', 'avatar', 'created_at'], $limit = 10){
        $this->instance = $this->model->select($select);
        $this->getQueryBuilderFindByKey($keySearch);
        
        foreach($meta as $key => $value){
            $this->instance = $this->instance->where($key, $value);
        }
        return $this->instance->limit($limit)->get();
    }
    
    protected function getQueryBuilderFindByKey($key){
        $this->instance = $this->instance->where(function($query) use ($key){
            return $query->where('slug', 'LIKE', '%'.$key.'%');
        });
    }

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC'){
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }
}