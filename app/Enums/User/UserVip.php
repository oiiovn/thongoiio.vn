<?php

namespace App\Enums\User;

use App\Support\Enum;

enum UserVip: int
{
    use Enum;

    case Đồng = 1;
    case Bạc = 2;
    case Vàng = 3;
    case BạchKim = 4;
}
