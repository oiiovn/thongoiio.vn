<?php

namespace App\Enums\Transaction;

use App\Support\Enum;

enum TransactionStatus: int
{
    use Enum;

    case Pending = 1;
    case Approved = 2;
    case Cancel = 3;

   
}