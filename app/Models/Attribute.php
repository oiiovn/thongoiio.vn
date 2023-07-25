<?php

namespace App\Models;

use App\Enums\Attribute\AttributeType;
use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Support\Eloquent\Sluggable;

class Attribute extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'attributes';

    protected $guarded = [];

    protected $casts = [
        'status' => Status::class,
        'type' => AttributeType::class,
    ];

    public function options(){
        return $this->hasMany(AttributeOption::class, 'attribute_id')->orderBy('position', 'asc');
    }
    public function option(){
        return $this->hasOne(AttributeOption::class, 'attribute_id');
    }
    public function isTypeButton(){
        return $this->type == AttributeType::Button;
    }
}
