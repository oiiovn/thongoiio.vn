<?php

namespace App\Enums\Transaction;

use App\Support\Enum;

enum TransactionType: int
{
    use Enum;

    case Deposit = 1;
    case Withdrawn = 2;
    case Job = 3;

  
}