<?php

namespace App\Models;

use App\Enums\Job\JobStatus;
use App\Enums\User\UserRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use PhpOffice\PhpSpreadsheet\Shared\OLE\PPS;

class JobStatusNew extends Model
{
    use HasFactory;
    
    const CACHE_KEY_GET_NUMBER = 'cache_job_status_new_number';
    const CACHE_ALIVE = 30;

    protected $table = 'job_status_new';

    protected $guarded = [];

    protected $casts = [
        'type' => UserRoles::class,
        'status' => JobStatus::class,
        'number' => 'integer'
    ];
    public function getJobStatusWithNumber(){
        if(auth()->check()){
            $response = Cache::remember(self::CACHE_KEY_GET_NUMBER.auth()->user()->id, self::CACHE_ALIVE, function(){
                $jobStatusNew = $this->getAuthCurrent();
                $jobStatusNewMember = $this->getAuthCurrentMember($jobStatusNew);
                $jobStatusNewShop = $this->getAuthCurrentShop($jobStatusNew);
                $jobStatus = [];
                foreach(JobStatus::asSelectArray() as $key => $value){
                    if(JobStatus::NotReceived->value != $key){
                        $jobStatus['member'][$key] = [
                            'text' => $value,
                            'number' => $this->getNumber($jobStatusNewMember, JobStatus::from($key))
                        ];
                    }
                    $jobStatus['shop'][$key] = [
                        'text' => $value,
                        'number' => $this->getNumber($jobStatusNewShop, JobStatus::from($key))
                    ];
                }
                return $jobStatus;
            });
            return $response;
        }
        return null;
    }
    public function authResetNumber($status, $type){
        return self::where('user_id', auth()->user()->id)
        ->where('type', $type)
        ->where('status', $status)
        ->update([
            'number' => 0
        ]);
    }
    public function getAuthCurrent(){
        return self::select('type', 'status', 'number')
        ->where('user_id', auth()->user()->id)
        ->get();
    }
    
    public function getAuthCurrentMember($collect){
        return $collect->where('type', UserRoles::Member);
    }
    public function getAuthCurrentShop($collect){
        return $collect->where('type', UserRoles::Shop);
    }
    public function getNumber($collect, $status){
        return $collect->firstWhere('status', $status)->number;
    }

    public function createForUser($user_id){
        $arr = [];
        foreach(JobStatus::cases() as $item){
            if($item != JobStatus::NotReceived){
                $arr[] = [
                    'user_id' => $user_id,
                    'type' => UserRoles::Member->value,
                    'status' => $item->value
                ];
            }
            $arr[] = [
                'user_id' => $user_id,
                'type' => UserRoles::Shop->value,
                'status' => $item->value
            ];
        }
        // dd($arr);
        self::insert($arr);
    }
}
