<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBlacklistJob extends Model
{
    use HasFactory;

    protected $table = 'user_blacklist_jobs';

    protected $guarded = [];
}
