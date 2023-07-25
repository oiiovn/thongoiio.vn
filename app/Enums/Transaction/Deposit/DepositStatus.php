<?php

namespace App\Enums\Transaction\Deposit;

use App\Support\Enum;

enum DepositStatus: int
{
    use Enum;

    case Pending = 0;
    case Success = 1;
    case Cancel = 2;
    case Error = 3;

  
}