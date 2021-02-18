<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserWishlists extends Model
{

    protected $table = 'wishlist';

    protected $fillable = ['wishlist_id','user_id', 'course_id'];

    public function User(){
        return $this->belongsTo(User::class, 'user_id');
    } 

    public function Course(){
        return $this->belongsTo(Courses::class, 'course_id');
    }             
}