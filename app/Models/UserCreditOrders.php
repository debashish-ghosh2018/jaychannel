<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserCreditOrders extends Model
{

    protected $table = 'use_credit_purchase_orders';

    protected $fillable = [
        'booking_no','user_id', 'credit_available', 'credit_purchase', 'booking_person_name', 'booking_person_email', 'booking_person_phone', 'booking_person_address', 'booking_person_country', 'booking_person_city', 'booking_person_state', 'booking_person_postalcode'];

    public function User(){
        return $this->belongsTo(User::class, 'user_id');
    } 

    public function bookedCredits(){
        return $this->hasMany('App\Models\UserCreditOrderLists', 'credit_purchase_order_id');
    }            
}