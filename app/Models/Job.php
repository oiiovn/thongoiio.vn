<?php

namespace App\Models;

use App\Enums\Job\JobStatus;
use App\Enums\User\UserRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';

    protected $guarded = [];

    protected $casts = [
        'status' => JobStatus::class,
        'is_virtual' => 'boolean'
    ];
    
    public function canEditHistory(){
        return $this->status == JobStatus::Ordered && $this->isAuthWorker();
    }

    public function canCancel(){
        return $this->status == JobStatus::NotReceived 
        || $this->status == JobStatus::Received 
        || $this->status == JobStatus::Ordered 
        || $this->status == JobStatus::OrderConfirmed
        || $this->status == JobStatus::Reviewed;
    }
    
    public function canUpdateWorkerIdForVirtual(){
        return $this->status == JobStatus::NotReceived 
        && !$this->worker_id 
        && $this->isVirtual();
    }
    public function canReceive(){
        return $this->status == JobStatus::NotReceived 
        && !$this->isAuthShop()
        && !$this->worker_id 
        && $this->isReal();
    }
    public function notClickBtnReceive(){
        return $this->status != JobStatus::NotReceived || $this->worker_id;
    }
    public function disableButtonReceive(){
        return $this->notClickBtnReceive() || (auth()->check() && $this->isAuthShop());
    }
    public function canComplete(){
        return $this->status == JobStatus::Ordered 
        || $this->status == JobStatus::Reviewed;
    }

    public function hasNextStatus(){
        return $this->status == JobStatus::Received 
        || $this->status == JobStatus::Ordered 
        || $this->status == JobStatus::OrderConfirmed
        || $this->status == JobStatus::Reviewed;
    }
    
    public function accessNextStatus(){
        if((JobStatus::Received == $this->status || JobStatus::OrderConfirmed == $this->status) && $this->isAuthWorker()){
            return true;
        }elseif((JobStatus::Ordered == $this->status || JobStatus::Ordered == $this->status || JobStatus::Reviewed == $this->status) && auth()->user()->isShop() && $this->isAuthShop()){
            return true;
        }else{
            return false;
        }
    }
    public function nextRoleResponsibility(){
        return match($this->status) {
            JobStatus::Received, JobStatus::OrderConfirmed => UserRoles::Member,
            JobStatus::Ordered, JobStatus::Reviewed => UserRoles::Shop,
            default => false
        };
    }
    public function nextRoleNotifyStatusNew(){
        return match($this->status) {
            JobStatus::OrderConfirmed, JobStatus::Completed => UserRoles::Member,
            JobStatus::Received, JobStatus::Ordered, JobStatus::Reviewed => UserRoles::Shop,
            default => false
        };
    }

    public function statusHasMoneyProductAddition(){
        return $this->status == JobStatus::Ordered;
    }

    public function nextStatusHasMoneyProductAddition(){
        return $this->status->nextCase() == JobStatus::Ordered;
    }
    public function cancelChooseWhoCharge(){
        return match($this->status) {
            JobStatus::Received, JobStatus::OrderConfirmed => $this->worker_id,
            JobStatus::Ordered, JobStatus::Reviewed => $this->shop_id,
            default => false
        };
    }

    public function cancelIsCharge(){
        return $this->status == JobStatus::Received 
            || $this->status == JobStatus::Ordered 
            || $this->status == JobStatus::OrderConfirmed 
            || $this->status == JobStatus::Reviewed;
    }
    public function isVirtual(){
        return $this->is_virtual == true;
    }

    public function isReal(){
        return $this->is_virtual == false;
    }
    public function isStatusComplete(){
        return $this->status == JobStatus::Completed;
    }
    public function isAuthWorker(){
        return $this->worker_id == auth()->user()->id;
    }
    public function isAuthShop(){
        return $this->shop_id == auth()->user()->id;
    }
    public function shop(){
        return $this->belongsTo(User::class, 'shop_id');
    }

    public function worker(){
        return $this->belongsTo(User::class, 'worker_id');
    }

    public function attributeOptions(){
        return $this->belongsToMany(AttributeOption::class, 'job_attribute_options', 'job_id', 'attribute_option_id');
    }

    public function details(){
        return $this->hasMany(JobDetail::class, 'job_id');
    }
    public function histories(){
        return $this->hasMany(JobHistory::class, 'job_id')->orderBy('id', 'ASC');
    }

    public function history(){
        return $this->hasOne(JobHistory::class, 'job_id');
    }
    
    public function blacklist(){
        return $this->hasOne(UserBlacklistJob::class, 'job_id');
    }

    public function scopeIsVirtual($query){
        return $query->where('is_virtual', true);
    }

    public function scopeIsReal($query){
        return $query->where('is_virtual', false);
    }
    public function scopeCurrentAuthShop($query){
        return $query->where('shop_id', auth()->user()->id)->isReal();
    }
    public function scopeCurrentAuthWorker($query){
        return $query->where('worker_id', auth()->user()->id)->isReal();
    }
    public function scopeCanReceive($query){
        return $query->whereNull('worker_id')->where('status', JobStatus::NotReceived);
    }
}
