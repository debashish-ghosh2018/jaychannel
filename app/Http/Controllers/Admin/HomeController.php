<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserCreditOrderLists;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $members = User::where('user_type', '=', 'Member')->get();
            $enterprises = User::where('user_type', '=', 'Enterprise')->get();
            $vendors = User::where('user_type', '=', 'Vendor')->get();

            $creditorders = UserCreditOrderLists::all();
            $total_sales = $creditorders->sum('credit_amount');

            return view('admin.dashboard.homepage', compact('members', 'enterprises', 'vendors', 'total_sales')); 
        }
        else{
            return view('admin.redirect_to_login'); 
        }
    }

}
