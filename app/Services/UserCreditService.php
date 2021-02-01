<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model as Eloquent;

use App\Models\User;
use App\Models\UserCredits;


class UserCreditService extends BaseService
{

    public function getUserAvailableCredit($user_id = null){
		
        if (!empty($user_id)) {
            $user_credits = UserCredits::where('user_id', '=', $user_id)->get();
            //dd($user_credits);

            $user_credit_purchased = $user_credits->sum('credit_purchased');
            $user_credit_used = $user_credits->sum('credit_used');

            return ($user_credit_purchased - $user_credit_used);
	    }else{
            return 0;
        }	
	}
}
