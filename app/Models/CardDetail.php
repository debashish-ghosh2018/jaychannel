<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CardDetail extends Model
{
    protected $fillable = [
        'user_id','user_name', 'address', 'city', 'state', 'zipcode', 'tel', 'email', 'credit_amount', 'auto_refill', 'card_no', 'exp_from', 'exp_to', 'ccv_no', 'flightdeck_login'];
}