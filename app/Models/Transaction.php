<?php

namespace App\Models;

use App\Enums\Transaction\TransactionStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Transaction\TransactionType;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $guarded = [];

    protected $casts = [
        'type' => TransactionType::class,
        'detail' => AsArrayObject::class,
        'status' => TransactionStatus::class
    ];

    public function getStatusDescriptionAttribute()
    {
        return TransactionStatus::getDescription($this->status);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function isTypeWithdrawn(){
        return $this->type == TransactionType::Withdrawn;
    }
}
