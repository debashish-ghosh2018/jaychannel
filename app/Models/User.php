<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use HasRoles;
    use HasFactory;

    const ADMIN = 'admin';
    const MEMBER = 'Member';
    const VENDOR = 'Vendor';
    const ENTERPRISE = 'Enterprise';

    const MEMBER_ACCOUNT_URL = 'show_member_dashboard';
    const VENDOR_ACCOUNT_URL = 'show_signinvendor_dashboard';
    const ENTERPRISE_ACCOUNT_URL = 'show_enterprise_account'; 

    const STORAGE_VENDOR_LOGO = 'vendor_logo';           

    
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'address', 'city', 'state', 'zipcode', 'tel', 'user_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'deleted_at'
    ];

    protected $attributes = [ 
        'menuroles' => 'user',
    ];

    public function isMember()
    {
        return $this->user_type == SELF::MEMBER;
    } 

    public function isVendor()
    {
        return $this->user_type == SELF::VENDOR;
    }  

    public function isEnterprise()
    {
        return $this->user_type == SELF::ENTERPRISE;
    } 

    public function get_vendor_logo_upload_path()
    {
        return SELF::STORAGE_VENDOR_LOGO;
    }     

    public function getUserAccountUrl()
    {
        if($this->user_type == SELF::ENTERPRISE){
            return SELF::ENTERPRISE_ACCOUNT_URL;
        }
        elseif($this->user_type == SELF::VENDOR){
            return SELF::VENDOR_ACCOUNT_URL;
        }
        else{
            return SELF::MEMBER_ACCOUNT_URL;
        }
    } 

    public function myDetails()
    {
        return $this->hasOne('App\Models\UserInfo', 'user_id');
    } 

    public function myCourses(){
        return $this->hasMany('App\Models\Courses', 'user_id');
    } 

    public function myCredits(){
        return $this->hasMany('App\Models\UserCredits', 'user_id');
    } 

    public function myCourseOrdered(){
        return $this->hasMany('App\Models\UserCourseOrders', 'user_id');
    } 

    public function myWishlist(){
        return $this->hasMany('App\Models\UserWishlists', 'user_id');
    } 
}
