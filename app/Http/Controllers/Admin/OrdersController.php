<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserInfo;
use App\Models\UserCreditOrders;
use App\Models\UserCreditOrderLists;
use App\Models\UserCourseOrders;
use App\Models\UserCourseOrderLists;

class OrdersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creditorders = UserCreditOrders::all();
        //dd($creditorders);

        $courseorders = UserCourseOrders::all();
        //dd($creditorders);

        return view('admin.dashboard.orders.ordersList', compact('creditorders', 'courseorders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_order($id, $showdetails)
    {

        if($showdetails == 'courseorder'){
            $courseorder = UserCourseOrders::find($id);
            //dd($courseorder);                       

            return view('admin.dashboard.orders.courseOrderShow', compact( 'courseorder' ));   
        }
        else{
            $creditorder = UserCreditOrders::find($id);
            //dd($creditorder);                       

            return view('admin.dashboard.orders.creditOrderShow', compact( 'creditorder' ));   
        }

    }
 
}
