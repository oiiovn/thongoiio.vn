<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\Transaction\Withdrawn\WithdrawnStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Withdrawn extends Model
{
    use HasFactory;
    
    protected $table = 'withdrawns';
    
    protected $guarded = [];

    protected $casts = [
        'status' => WithdrawnStatus::class,
    ];



    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function bankAccount(){
        return $this->belongsTo(UserBankAccount::class, 'bank_id');
    }
}
