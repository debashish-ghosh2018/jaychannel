<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class UserInfo extends Model
{
    use HasFactory;

    protected $table = 'user_details';
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','enterprise_name', 'business_type', 'business_address', 'location', 'business_address_zipcode', 'client_size', 'staff_size', 'business_timezone', 'website', 'about_your_enterprise', 'area_of_service', 'service_offered_patient_monitoring', 'service_offered_home_health', 'service_offered_activities', 'service_offered_counselling', 'service_offered_support_group', 'service_offered_case_management', 'service_offered_food_nutrition', 'service_offered_memory_care', 'service_offered_vocational_help', 'membership_in_center', 'membership_virtual', 'membership_hybrid', 'logo', 'contact_person_firstname', 'contact_person_lastname', 'contact_person_position', 'contact_person_direct_line', 'contact_person_email'
    ];

    public function vendorCourses(){
        return $this->hasMany('App\Models\Courses', 'user_id');
    }

    public function User(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
