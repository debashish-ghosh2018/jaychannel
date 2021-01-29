<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        //dd($request);
     
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'address' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'numeric'],
            'user_type' => ['required', 'string', 'max:255'],      
        ]);


        if ($validator->fails()) {
            $data['msg'] = 'All Errors';
            $data['data']['error'] = $validator->errors(); 

         
            //session()->flash('error', 'Please provide name, email and password!');
            return redirect()->back()->withInput()->withErrors($validator);

        }else{
            $checkUser = User::where('email', $request->email)->first();
            
            if($checkUser) {
                session()->flash('error', 'User already exists!');
                return redirect()->error_message();
            }else{
                $user = new User;
                $user->name = $request['name'];
                $user->email = $request['email'];
                $user->address = $request['address'];
                $user->tel = $request['tel'];
                $user->user_type = $request['user_type'];                                    
                $user->password = Hash::make($request['password']);
              
                $status = $user->save();
                if($status) {
               
                    $lastInsertId= $user->id;
                    $userDetail =new UserDetail;
                    $userDetail->user_id = $lastInsertId;
                    $userDetail->service_offered_patient_monitoring=0;
                    $userDetail->service_offered_home_health=0;
                    $userDetail->service_offered_activities=0;
                    $userDetail->service_offered_counselling=0;
                    $userDetail->service_offered_support_group=0;
                    $userDetail->service_offered_case_management=0;
                    $userDetail->service_offered_food_nutrition=0;
                    $userDetail->service_offered_memory_care=0;
                    $userDetail->service_offered_vocational_help=0;
                    $userDetail->membership_in_center=0;
                    $userDetail->membership_virtual=0;
                    $userDetail->membership_hybrid=0;
                    $status = $userDetail->save();
                    session()->flash('success_message', 'User added successfully!');
                    $this->guard()->login($user);
                    return redirect($this->redirectPath());
                }else{
                    session()->flash('error_message', 'Failed to add user!');
                    return redirect()->back();
                }
            }
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'address' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'numeric'],
            'user_type' => ['required', 'string', 'max:255'],                                    
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

    private function generateUid ($params = array()){
        try{
            return Uuid::uuid3(Uuid::NAMESPACE_DNS, $params['name']."###".$params['email']);
        } catch(UnsatisfiedDependencyException $dependencyException){
            Log::error("UUID was not generated successful for User with name ".$params['name']." Error: ".$dependencyException->getCode()." - Message: ".$dependencyException->getMessage());
        }
        catch (\Exception $ex){
            Log::error('Error: '.$ex->getCode()." - Message: ".$ex->getMessage());
        }

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $data['id'] = $this->generateUid($data);
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'tel' => $data['tel'],
            'user_type' => $data['user_type'],                                    
            'password' => Hash::make($data['password']),
        ]);
        $user->assignRole('user');
        return $user;
    }
}
