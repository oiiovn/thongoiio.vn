<?php

namespace App\Models;

use App\Enums\Job\JobStatus;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobHistory extends Model
{
    use HasFactory;

    protected $table = 'job_histories';

    protected $guarded = [];

    protected $casts = [
        'status' => JobStatus::class,
        'detail' => AsArrayObject::class
    ];

    public function canEdit(){
        return $this->status == JobStatus::Ordered;
    }

    public function hasMoneyProductAddition(){
        return $this->status == JobStatus::Ordered;
    }
}
