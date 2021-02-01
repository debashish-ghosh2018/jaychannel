<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Courses extends Model
{

    use HasFactory;

    protected $table = 'courses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','title', 'start_date', 'end_date', 'start_time', 'end_time', 'day_monday', 'day_tuesday', 'day_wednesday', 'day_thursday', 'day_friday', 'day_saturday', 'day_sunday', 're_occur', 'credits', 'class_size', 'join_by', 'content_type_id', 'about_class', 'equipment_require', 'hero_image', 'browser_image_1', 'browser_image_2', 'video_clip'
    ];

    public function Owner()
    {
        return $this->hasOne('App\Models\UserInfo', 'user_id', 'user_id');
    } 

    public function coursesBooked(){
        return $this->hasMany('App\Models\UserCourseOrderLists', 'course_id');
    }  
}
