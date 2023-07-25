<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDetail extends Model
{
    use HasFactory;

    protected $table = 'job_details';

    protected $guarded = [];

    protected $casts = [
        'meta' => AsArrayObject::class
    ];

    public function job(){
        return $this->belongsTo(Job::class, 'job_id');
    }
}
