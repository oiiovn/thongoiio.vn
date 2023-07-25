<?php

namespace App\Repositories\Attribute;

interface AttributeRepositoryInterface
{
    public function getAllWithOneOptions(array $optionIds);
    public function getAllWithRelations(array $relations = ['options']);
}