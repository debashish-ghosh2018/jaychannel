<?php

namespace App\Http\Controllers\Enterprise;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CardDetail;
use App\Models\ClassBook;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('admin');
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
            return view('enterprise.account', compact( 'you','checkUser'));
        }catch(\Exception $e){
        return $e->getMessage();
        }
        
    }
      public function enterpriseClasses()
        {
        
            try{
                $you = auth()->user();
                $classBookedDetails = DB::table('class_booking_details')->join('courses', 'courses.id', '=', 'class_booking_details.course_id')->join('class_booked', 'class_booked.id', '=', 'class_booking_details.class_booking_id')
                ->where('class_booked.user_id', '=', $you->id)->get();
                
                if(count($classBookedDetails)>0){
                    $totalCount=count($classBookedDetails)-1;
                    $creditsAvailable=$classBookedDetails[$totalCount]->credit_available;
                }else{
                    $creditsAvailable="";
                }
               
                return view('enterprise.dashboard', compact( 'you','classBookedDetails','creditsAvailable'));
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
    public function addEnterpriseCardDetails(Request $request)
    {
       
        try{
            $validator = Validator::make($request->all(), [
                'user_name' => ['required', 'string', 'max:255'],
                'address' => ['required'],
                'tel' => ['required'],
                'email' => ['required'],
                'credit_amount' => ['required'],
                'auto_refill' => ['required'],      
                'card_no' => ['required'],      
                'exp_from' => ['required'],      
                'exp_to' => ['required'],      
                'ccv_no' => ['required'],     
                'jaypad_users'=> ['required'], 
                'jaymobile_users'=>['required'], 
                    
            ]);
    
    
            if ($validator->fails()) {
               
                return  redirect()->back()->withInput()->withErrors($validator);
    
            }else{
                if($request['file']){
                    $img_name= $this->oneFileUpload__($request['file']);
                }
                else{
                    $img_name= "";
                }
                  $checkUser = CardDetail::where('user_id', auth()->user()->id)->first();
               
             
                    if($checkUser){
                       
                         DB::table('card_details')->where('user_id', auth()->user()->id)->update(array('user_name' => $request['user_name'],'address'=> $request['address'],'tel'=> $request['tel'],'email'=> $request['email'],'credit_amount'=> $request['credit_amount'],'card_no'=> $request['card_no'],'exp_from'=> $request['exp_from'],'exp_to'=> $request['exp_to'],'ccv_no'=> $request['ccv_no'],'flightdeck_login'=> $request['flightdeck_login'],'jaypad_users'=> $request['jaypad_users'],'jaymobile_users'=> $request['jaymobile_users'],'offline_invoice'=> $request['offline_invoice'],'logo'=> $request['logo']));
                    }else{
                    $card = new CardDetail;
                    $card->user_id =  auth()->user()->id;
                    $card->user_name = $request['user_name'];
                    $card->address = $request['address'];
                    $card->tel = $request['tel'];
                    $card->email = $request['email'];
                    $card->credit_amount = $request['credit_amount'];                                    
                    $card->card_no = $request['card_no'];                                    
                    $card->exp_from = $request['exp_from'];                                    
                    $card->exp_to = $request['exp_to'];                                    
                    $card->ccv_no = $request['ccv_no'];                                    
                    $card->flightdeck_login = $request['flightdeck_login'];                                    
                   
                    $card->jaypad_users = $request['jaypad_users'];
                    $card->jaymobile_users = $request['jaymobile_users'];   
                    $card->offline_invoice = $request['offline_invoice'];   
                    
                   
                    $card->logo = $img_name;     

                    $status = $card->save();
                    }
                    session()->flash('success_message', 'Success');
                    return redirect()->back();
                
            }
        }catch(\Exception $e){
        return $e->getMessage();
        }
       
    }
  
   
    
}
