<?php

namespace App\Enums\Attribute;

use App\Support\Enum;

enum AttributeType: int
{
    use Enum;

    case Text = 1;
    case Button = 2;
}
