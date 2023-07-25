<?php

namespace App\Enums\Job;

use App\Support\Enum;

enum JobStatus: int
{
    use Enum;

    case NotReceived = 1;
    case Received = 2;
    case Ordered = 3;
    case OrderConfirmed = 4;
    case Reviewed = 5;
    case Completed = 6;
    case Cancelled = 7;

    public function badge(){
        return match($this) {
            JobStatus::NotReceived => 'bg-yellow',
            JobStatus::Received => 'bg-blue',
            JobStatus::Ordered => 'bg-orange',
            JobStatus::OrderConfirmed => 'bg-cyan',
            JobStatus::Reviewed => 'bg-lime',
            JobStatus::Completed => 'bg-green',
            JobStatus::Cancelled => 'bg-red',
        };
    }

    public function nextCase(){
        $flag = false;
        $nextCase = $this;
        foreach(self::cases() as $item){
            if($flag){
                $nextCase = $item;
                break;
            }
            if($this == $item){
                $flag = true;   
            }
        }
        return $nextCase;
    }
}
