<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

use App\Services\UserCreditService;


class UserCreditCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()){
            $user = Auth::user();

            $userservice = new UserCreditService();
            $creditsAvailable = $userservice->getUserAvailableCredit($user->id);

            session(['user_name' => $user->name, 'user_type' => $user->user_type, 'user_available_credits' => $creditsAvailable]);

        }else{
            //session()->forget(['user_name', 'user_type', 'user_available_credits']);
            session(['user_name' => '', 'user_type' => '', 'user_available_credits' => '']);
        }

        return $next($request);        
    }
}