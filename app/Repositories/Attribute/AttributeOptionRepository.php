<?php

namespace App\Repositories\Attribute;
use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Attribute\AttributeOptionRepositoryInterface;
use App\Models\AttributeOption;
use Illuminate\Support\Facades\DB;

class AttributeOptionRepository extends EloquentRepository implements AttributeOptionRepositoryInterface
{

    protected $select = [];

    public function getModel(){
        return AttributeOption::class;
    }
    // public function getOrderByFollow(array $arrayId){
    //     $array = [];
    //     $this->instance = $this->model;
    //     foreach ($arrayId as $ids) {
    //         // $qs = array_fill(0,count($ids),'?');
    //         $array[] = $this->instance->whereIn('id', $ids)
    //         ->orderByRaw(DB::raw("FIELD(id, " . implode(',', $ids) . ")"))
    //         // ->orderByRaw(DB::raw("FIELD(id,". implode(',', $qs).")"),$ids)
    //         ->pluck('name', 'id');
    //     }
    //     return $array;
    // }

    public function findOrFailWithRelations($id, array $relations = ['attribute']){
        $this->findOrFail($id);
        $this->instance = $this->instance->load($relations);
        return $this->instance;
    }

    public function getQueryBuilderByColumn($column, $value){
        $this->getQueryBuilderOrderBy('position', 'asc');
        $this->instance = $this->instance->where($column, $value);
        return $this->instance;
    }

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC'){
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }

}