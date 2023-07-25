<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Support\Eloquent\Sluggable;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;

class AttributeOption extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'attribute_options';

    protected $guarded = [];

    protected $casts = [
        'status' => Status::class,
        'meta' => AsArrayObject::class,
    ];
    
    public function attribute(){
        return $this->belongsTo(Attribute::class, 'attribute_id');
    }
}
