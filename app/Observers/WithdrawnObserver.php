<?php

namespace App\Observers;

use App\Models\Withdrawn;
use Illuminate\Http\Request;

class WithdrawnObserver
{ 

    public function creating(Withdrawn $withdrawn)
    {
        $withdrawn->code = 'Txn'.uniqid_real();
    }

}
