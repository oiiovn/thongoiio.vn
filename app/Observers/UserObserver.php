<?php

namespace App\Observers;

use App\Enums\Job\JobStatus;
use App\Enums\User\UserRoles;
use App\Models\User;

class UserObserver
{
    public function creating(User $user)
    {
        $user->slug = str()->uuid().'-'.time();
    }

    public function created(User $user)
    {
        $user->contact()->create();
        $user->wallet()->create();
        $arr = [];
        foreach(JobStatus::cases() as $case){
            if($case != JobStatus::NotReceived){
                $arr[] = [
                    'type' => UserRoles::Member,
                    'status' => $case
                ];
            }
            $arr[] = [
                'type' => UserRoles::Shop,
                'status' => $case
            ];
        }
        $user->jobStatusNew()->createMany($arr);

    }
}
