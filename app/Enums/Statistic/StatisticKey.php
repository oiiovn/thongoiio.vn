<?php

namespace App\Enums\Statistic;

use App\Support\Enum;

enum StatisticKey: string
{
    use Enum;

    case Revenue = 'revenue';
    case Profit = 'profit';
}