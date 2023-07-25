<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Enums\User\{UserRoles, UserGender};

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'slug',
        'username',
        'fullname',
        'email',
        'phone',
        'birthday',
        'gender',
        'vip',
        'avatar',
        'cover_photo',
        'token_get_password',
        'password',
        'roles',
        'status',
        'province_id',
        'district_id',
        'ward_id',
        'is_virtual',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'roles' => UserRoles::class,
        'gender' => UserGender::class
    ];
    public function isReputable(){
        return $this->is_reputable == true;
    }
    public function isBlacklist($shop_id){
        return $this->blacklistJobs()->where('shop_id', $shop_id)->exists();
    }
    public function isMember(){
        return $this->roles == UserRoles::Member;
    }
    public function isShop(){
        return $this->roles == UserRoles::Shop;
    }
    public function wallet(){
        return $this->hasOne(Wallet::class, 'user_id');
    }
    public function contact(){
        return $this->hasOne(UserContact::class, 'user_id');
    }
    public function bankAccount(){
        return $this->hasMany(UserBankAccount::class, 'user_id');
    }
    public function hasBankAccount() {
        if($this->bankAccount->count() > 0) return true; else return false;
    }
    public function deposits(){
        return $this->hasMany(Deposit::class, 'user_id');
    }
    public function withdrawns(){
        return $this->hasMany(Withdrawn::class, 'user_id');
    }
    public function reviews(){
        return $this->hasMany(Review::class, 'user_id')->with('author');
    }
    public function reviewCreateds(){
        return $this->hasMany(Review::class, 'author_id');
    }
    public function jobCreateds(){
        return $this->hasMany(Job::class, 'shop_id');
    }
    public function jobs(){
        return $this->hasMany(Job::class, 'worker_id');
    }
    public function blacklistJobs(){
        return $this->hasMany(UserBlacklistJob::class, 'worker_id');
    }

    public function jobStatusNew(){
        return $this->hasMany(JobStatusNew::class, 'user_id', 'id');
    }

    public function jobStatusNewType(UserRoles $type){
        return $this->jobStatusNew()->where('type', $type);
    }

    public function scopeStatisticReviews($query){
        return $query->withCount('reviews')->withAvg('reviews', 'rating');
    }
    public function scopeRoleShop($query){
        $query->where('roles', UserRoles::Shop);
    }
    public function province() {
        return $this->hasOne(Province::class, 'id', 'province_id');
    }
    public function hasProvince() {
        return is_null($this->province_id) ? false : true;
    }
    public function district() {
        return $this->hasOne(District::class, 'id', 'district_id');
    }
    public function hasDistrict() {
        return is_null($this->district_id) ? false : true;
    }
    public function ward() {
        return $this->hasOne(Ward::class, 'id', 'ward_id');
    }
    public function hasWard() {
        return is_null($this->district_id) ? false : true;
    }
    public function getAvatar()
    {
        $img = is_null($this->avatar) ? asset('icon/profile.svg') : $this->avatar;
        return $img;
    }
    public function getNameShop(){
        return $this->name_shop ?: $this->fullname;
    }
    public function hasNameShop() {
        return is_null($this->name_shop) ? false : true;
    }
    public function getBackground() {
        $img = is_null($this->cover_photo) ? '' : $this->cover_photo;
        return $img;
    }
    public function hasGender() {
        return is_null($this->gender) ? false : true;
    }
    public function getGender() {
        if($this->hasGender()) {
            foreach(UserGender::asSelectArray() as $key => $value) {
                if($key == $this->gender->value) return $value;
            }
        }
    }
}
