<?php

namespace App\Models;

use App\Enums\Transaction\Deposit\DepositStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $table = 'deposits';
    protected $guarded = [];
    
    protected $casts = [
        'status' => DepositStatus::class,
    ];


    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
