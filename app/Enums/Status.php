<?php

namespace App\Enums;

use App\Support\Enum;

enum Status: int
{
    use Enum;

    case Active = 1;
    case Deactive = 2;
}
