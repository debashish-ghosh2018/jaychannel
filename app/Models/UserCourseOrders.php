<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserCourseOrders extends Model
{

    protected $table = 'class_booked';

    protected $fillable = [
        'booking_no','user_id', 'credit_available', 'credit_used', 'credit_returned', 'session_completed', 'session_cancelled', 'session_cancelled_datetime', 'session_cancelled_reason', 'session_approved', 'booking_status', 'booking_person_name', 'booking_person_email', 'booking_person_phone', 'booking_person_address', 'booking_person_country', 'booking_person_city', 'booking_person_state', 'booking_person_postalcode'];

    public function User(){
        return $this->belongsTo(User::class, 'user_id');
    } 

    public function bookedCourses(){
        return $this->hasMany('App\Models\UserCourseOrderLists', 'class_booking_id');
    }            
}