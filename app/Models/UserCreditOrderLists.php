<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserCreditOrderLists extends Model
{

    protected $table = 'use_credit_purchase_order_details';

    protected $fillable = ['credit_purchase_order_id', 'credit_id', 'credit_qty', 'credit_points', 'credit_amount'];

    public function UserOrder(){
        return $this->belongsTo(UserCreditOrders::class, 'credit_purchase_order_id');
    } 

    public function Credit(){
        return $this->belongsTo(Credits::class, 'credit_id');
    }            
}