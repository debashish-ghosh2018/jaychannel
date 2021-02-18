<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserCredits extends Model
{

    protected $table = 'user_available_credits';

    protected $fillable = [
        'user_id','credit_id', 'credit_purchased', 'credit_used', 'credit_purchase_order_id', 'credit_redeem_order_id', 'credit_purchase_amt', 'credit_purchase_datetime', 'credit_redeem_datetime', 'credit_return_id', 'credit_return_date'];

    public function User(){
        return $this->belongsTo(User::class, 'user_id');
    } 

    public function Credit(){
        return $this->belongsTo(Credits::class, 'credit_id');
    }              
}