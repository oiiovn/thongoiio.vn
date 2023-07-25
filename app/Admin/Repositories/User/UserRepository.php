<?php

namespace App\Admin\Repositories\User;
use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\User\UserRepositoryInterface;
use App\Models\User;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{

    protected $select = [];

    public function getModel(){
        return User::class;
    }
    public function countAll(array $between = []){
        $this->getQueryBuilder();
        if(!empty($between)){
            $this->instance = $this->instance->whereBetween('created_at', $between);
        }
        $this->instance = $this->instance->count();
        return $this->instance;
    }
    public function searchAllLimit($keySearch = '', $meta = [], $select = ['id', 'fullname', 'phone', 'name_shop'], $limit = 10){
        $this->instance = $this->model->select($select);
        $this->getQueryBuilderFindByKey($keySearch);
        
        foreach($meta as $key => $value){
            $this->instance = $this->instance->where($key, $value);
        }
        return $this->instance->limit($limit)->get();
    }
    
    protected function getQueryBuilderFindByKey($key){
        $this->instance = $this->instance->where(function($query) use ($key){
            return $query->where('username', 'LIKE', '%'.$key.'%')
            ->orWhere('phone', 'LIKE', '%'.$key.'%')
            ->orWhere('email', 'LIKE', '%'.$key.'%')
            ->orWhere('fullname', 'LIKE', '%'.$key.'%')
            ->orWhere('name_shop', 'LIKE', '%'.$key.'%');
        });
    }

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC'){
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }
}