<?php

namespace App\Http\Controllers\Enterprise;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CardDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

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
           
            return view('enterprise.account', compact( 'you'));
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
                'offline_invoice'  => ['required'],   
                'jaypad_users'=> ['required'], 
                'jaymobile_users'=>['required'], 
                'flightdeck_login' => ['required'],      
            ]);
    
    
            if ($validator->fails()) {
               
                return redirect('show_enterprise_account')->withInput()->withErrors($validator);
    
            }else{
                $img_name= $this->oneFileUpload__($request['file']);
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
                    session()->flash('success_message', 'Success');
                    return redirect()->back();
                
            }
        }catch(\Exception $e){
        return $e->getMessage();
        }
       
    }
  
   
    
}
