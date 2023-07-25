<?php

namespace App\Enums\Job;

use App\Support\Enum;

enum ReportJobStatus: int
{
    use Enum;

    case Processing = 1;
    case Processed = 2;

    public function badge(){
        return match($this) {
            ReportJobStatus::Processing => 'bg-yellow',
            ReportJobStatus::Processed => 'bg-success',
        };
    }
}
