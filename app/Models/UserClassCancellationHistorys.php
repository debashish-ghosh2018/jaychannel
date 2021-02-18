<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserClassCancellationHistorys extends Model
{

    protected $table = 'class_cancellation_history';

    protected $fillable = [
        'class_booking_id','course_id', 'user_id', 'current_participants', 'cancel_participants'];

    public function User(){
        return $this->belongsTo(User::class, 'user_id');
    } 

    /*public function bookedCourses(){
        return $this->hasMany('App\Models\UserCourseOrderLists', 'class_booking_id');
    }*/            
}