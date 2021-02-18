<?php

namespace App\Http\Controllers\Buyer;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Illuminate\Support\Facades\DB;

use App\Services\UserCreditService;

use App\Models\User;
use App\Models\CardDetail;
use App\Models\UserCourseOrders;
use App\Models\UserCourseOrderLists;

class DashboardController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $user = Auth::user(); 
        if(empty($user)){
            return redirect()->route('home');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        try{
            $you = auth()->user();
            $checkUser = CardDetail::where('user_id', auth()->user()->id)->first();
            return view('buyer.dashboard', compact( 'you','checkUser'));
        }catch(\Exception $e){
        return $e->getMessage();
        }
        
    }
   public function memberManageClass()
    {

        $userservice = new UserCreditService();
    
        try{
            $you = auth()->user();
            //dd($you);

            //$classBookedDetails = DB::table('class_booking_details')->join('courses', 'courses.id', '=', 'class_booking_details.course_id')->join('class_booked', 'class_booked.id', '=', 'class_booking_details.class_booking_id')->where('class_booked.user_id', '=', $you->id)->get();

            /*if(count($classBookedDetails)>0){
                $totalCount=count($classBookedDetails)-1;
                $creditsAvailable=$classBookedDetails[$totalCount]->credit_available;
            }else{
                $creditsAvailable="";
            }*/

            $creditsAvailable = $userservice->getUserAvailableCredit($you->id);
            $classBookedDetails = UserCourseOrders::where('user_id', '=', $you->id)->get();
            $myWishlist = $you->myWishlist()->get();

            return view('buyer.manage_classes', compact( 'you','classBookedDetails','creditsAvailable','myWishlist'));
        }catch(\Exception $e){
            return $e->getMessage();
        }
  }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addCardDetails(Request $request)
    {
        //print_r($request->all());die;
        try{
            $postData = $request->all();             
            $validator = Validator::make($request->all(), [
                'user_name' => ['required', 'string', 'max:255'],
                'address' => ['required'],
                'city' => ['required'],
                'state' => ['required'],
                'zipcode' => ['required'], 
                'tel' => ['required'],
                'email' => ['required'],
                'credit_amount' => ['required'],
                'auto_refill' => ['required'],      
                'card_no' => ['required'],      
                'exp_from' => ['required'],      
                'exp_to' => ['required'],      
                'ccv_no' => ['required'],      
                //'flightdeck_login' => ['required'],      
            ]);
    
    
            if ($validator->fails()) {
                $request->session()->put('postData', $postData); 
                return redirect('member_dashboard')->withInput()->withErrors($validator);
            }else{
               $checkUser = CardDetail::where('user_id', auth()->user()->id)->first();
                    if($checkUser){
                       
                         DB::table('card_details')->where('user_id', auth()->user()->id)->update(array('user_name' => $request['user_name'],'address'=> $request['address'],'city'=> $request['city'],'state'=> $request['state'],'zipcode'=> $request['zipcode'],'tel'=> $request['tel'],'email'=> $request['email'],'credit_amount'=> $request['credit_amount'],'card_no'=> $request['card_no'],'exp_from'=> $request['exp_from'],'exp_to'=> $request['exp_to'],'ccv_no'=> $request['ccv_no'],'flightdeck_login'=> $request['flightdeck_login']));
                    }else{
                         $card = new CardDetail;
                         $card->user_id =  auth()->user()->id;
                    $card->user_name = $request['user_name'];
                    $card->address = $request['address'];
                    $card->city = $request['city'];
                    $card->state = $request['state'];
                    $card->zipcode = $request['zipcode']; 
                    $card->tel = $request['tel'];
                    $card->email = $request['email'];
                    $card->credit_amount = $request['credit_amount'];                                    
                    $card->card_no = $request['card_no'];                                    
                    $card->exp_from = $request['exp_from'];                                    
                    $card->exp_to = $request['exp_to'];                                    
                    $card->ccv_no = $request['ccv_no'];                                    
                    $card->flightdeck_login = $request['flightdeck_login'];                                    
                   
                  
                    $status = $card->save();
                    }
                   
                $user = User::findOrFail(auth()->user()->id);
                $user->name = $request['user_name'];
                $user->address = $request['address'];
                $user->city = $request['city'];
                $user->state = $request['state'];                
                $user->zipcode = $request['zipcode'];
                $user->tel = $request['tel'];
                $user->email = $request['email'];
                $user->save();
                   
                    session()->flash('success_message', 'Success');
                    return redirect()->back();
                
            }
        }catch(\Exception $e){
        return $e->getMessage();
        }
       
    }
  
   
    
}
