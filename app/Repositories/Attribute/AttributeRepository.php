<?php

namespace App\Repositories\Attribute;
use App\Admin\Repositories\Attribute\AttributeRepository as AdminAttributeRepository;
use App\Repositories\Attribute\AttributeRepositoryInterface;
use App\Models\Attribute;

class AttributeRepository extends AdminAttributeRepository implements AttributeRepositoryInterface
{
    public function getAllWithOneOptions(array $optionIds){
        $this->getQueryBuilderOrderBy('position', 'asc');
        $this->instance = $this->instance->with(['option' => function($query) use ($optionIds){
            $query->whereIn('id', $optionIds);
        }]);
        return $this->instance->get();
    }
    public function getAllWithRelations(array $relations = ['options']){
        $this->getQueryBuilderWithRelations($relations);
        return $this->instance->get();
    }
}