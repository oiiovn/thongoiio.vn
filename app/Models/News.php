<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use App\Admin\Traits\Slug;

class News extends Model
{
    use HasApiTokens, HasFactory, Notifiable, Slug;

    protected $fillable = [
        'title',
        'content',
        'admin_id',
        'avatar',
    ];

    protected $hidden = [];

}
