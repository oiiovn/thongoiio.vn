<?php

namespace App\Enums\Transaction\Withdrawn;

use App\Support\Enum;

enum WithdrawnStatus: int
{
    use Enum;

    case Pending = 0;
    case Success = 1;
    case Cancel = 2;

    
}