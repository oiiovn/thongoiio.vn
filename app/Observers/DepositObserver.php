<?php

namespace App\Observers;

use App\Models\Deposit;
use Illuminate\Http\Request;

class DepositObserver
{
    
    public function creating(Deposit $deposit)
    {
        $deposit->code = 'Txn'.uniqid_real();
    }

}
