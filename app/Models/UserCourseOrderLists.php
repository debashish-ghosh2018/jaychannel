<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserCourseOrderLists extends Model
{

    protected $table = 'class_booking_details';

    protected $fillable = ['class_booking_id', 'course_id', 'session_start_datetime', 'session_end_datetime', 'no_of_participants_per_class', 'registered_participants', 'no_of_participants_attended', 'canceled_participants'];

    public function UserOrder(){
        return $this->belongsTo(UserCourseOrders::class, 'class_booking_id');
    } 

    public function Course(){
        return $this->belongsTo(Courses::class, 'course_id');
    }            
}