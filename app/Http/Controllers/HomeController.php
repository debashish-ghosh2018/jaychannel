<?php

namespace App\Http\Controllers;

use Auth;
use Storage;
use Mail;
use Illuminate\Http\Request;

use App\Models\UserInfo;
use App\Models\Courses;
use App\Models\ContentTypes;
use App\Models\Credits;
use App\Models\Notes;
use App\Models\UserCourseOrders;
use App\Models\UserCourseOrderLists;
use App\Models\EmailTemplate;
use App\Models\Banners;


class HomeController extends Controller
{

    //Cart functionality reference url https://www.larashout.com/laravel-e-commerce-application-development-shopping-cart

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content_types = ContentTypes::ALL();
        //dd($content_types); 

        $banners = Banners::ALL();
        //dd($banners);		

        $courses = Courses::orderBy('created_at', 'desc')->inRandomOrder()->limit(6)->get();
        //dd($course);

        $credits = Credits::where('status', '=', 1)->orderBy('id', 'asc')->limit(4)->get();
        //dd($credits);

        $way_we_care = Notes::where('note_type', '=', 'way_we_care')->get(); 
        if(!empty($way_we_care[0])){
            $way_we_care = $way_we_care[0];
        }

        $how_it_work = Notes::where('note_type', '=', 'how_it_work')->get();
        if(!empty($how_it_work[0])){
            $how_it_work = $how_it_work[0];
        }         

        //dd($way_we_care);       

		return view('home', ['courses' => $courses, 'banners' => $banners, 'content_types' => $content_types, 'credits' => $credits, 'way_we_care' => $way_we_care, 'how_it_work' => $how_it_work]);
    }

    /**
     * Send email message to admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function send_email_to_admin(Request $request)
    {

        $template = EmailTemplate::where('email_key', '=', 'contact_us')->get();
        if(!empty($template[0])){
            $template = $template[0];
            Mail::send([], [], function($message) use ($request, $template) {
                $message->to('email2mkashif@gmail.com', 'Administrator')->subject($template->subject);
				//$message->to('ws.debashish@gmail.com', 'Administrator')->subject($template->subject);
                $message->from('email2mkashif@gmail.com','Joychannel');

                $body = $template->content;
                $content = "<b>Name:</b>&nbsp;" . $request->input('firstname') . ' ' . $request->input('lastname') . '<br/><b>Email:</b>&nbsp;' . $request->input('email') . '<br/><b>Enquiry:</b>&nbsp;' . $request->input('message');
                $body = str_replace('<content>', $content, $body);
                
                $message->setBody($body,'text/html');                
            });
        }

        echo "success";
    }

    public function other_pages($content_key, Request $request){

        $page_content = Notes::where('note_type', '=', $content_key)->get(); 
        if(!empty($page_content[0])){
            $page_content = $page_content[0];
        }

        return view('other_pages', ['page_content' => $page_content]);  
    }

    public function our_services($content_type = null, Request $request){

        $content_types = ContentTypes::ALL();
        //dd($content_types);        
        
        if(!empty($content_type)){
            $courses = Courses::where('content_type_id', '=', $content_type)->orderBy('created_at', 'desc')->inRandomOrder()->paginate( 20 );
        }else{
            $courses = Courses::orderBy('created_at', 'desc')->inRandomOrder()->paginate( 20 );
            //dd($course);       
        }

        return view('ourservices', ['courses' => $courses, 'content_types' => $content_types]);  
    }
	
    public function search_courses_by_description(Request $request){
        
        $content_types = ContentTypes::ALL();
        //dd($content_types); 

        $postData = $request->all();
        //dd($postData);
        
        if(!empty($postData['fldSearch'])){
            $courses = Courses::where('title', 'like', '%' . $postData['fldSearch'] . '%')->orWhere('about_class', 'like', '%' . $postData['fldSearch'] . '%')->orderBy('created_at', 'desc')->inRandomOrder()->paginate( 20 );
            return view('ourservices', ['courses' => $courses, 'content_types' => $content_types]);
        }else{
            return redirect()->route('our_services_view_all');       
        }

        
    }	

    public function member_signin()
    {
        $user = Auth::user();
        //dd($user);

        if(!empty($user)){
            return $this->redirect_user_to_dashboard($user);
        }
        else{
            return view('buyer.login');
        }
    }  

    public function vendor_signin()
    {
        $user = Auth::user();
        //dd($user);

        if(!empty($user)){
            return $this->redirect_user_to_dashboard($user);
        }
        else{
            return view('vendor.login');
        }
    }  

    public function enterprise_signin()
    {
        $user = Auth::user();
        //dd($user);
        
        if(!empty($user)){
            return $this->redirect_user_to_dashboard($user);
        }
        else{
            return view('enterprise.login');
        }        
    }

    public function vendor_dashboard()
    {
        $user = Auth::user();      
        if(!empty($user)){
            $user_details = $user->myDetails()->get();
            if(!empty($user_details[0])){
                $user_details = $user_details[0];
            }
            //dd($user_details);

            $user_data = array(
                            'id' => $user->id,
                            'name' => $user->name,
                            'email' => $user->email,
                            'tel' => $user->tel,
                            'user_type' => $user->user_type,
                        );

            $session_data = session('postData');

            if(empty($session_data['fld_business_type'])){ $session_data['fld_business_type'] = ''; }
            if(empty($session_data['fld_business_location'])){ $session_data['fld_business_location'] = ''; }
            if(empty($session_data['fld_business_address_zipcode'])){ $session_data['fld_business_address_zipcode'] = ''; }
            if(empty($session_data['fld_client_size'])){ $session_data['fld_client_size'] = ''; }
            if(empty($session_data['fld_staff_size'])){ $session_data['fld_staff_size'] = ''; }
            if(empty($session_data['fld_business_timezone'])){ $session_data['fld_business_timezone'] = ''; }
            if(empty($session_data['fld_website'])){ $session_data['fld_website'] = ''; }
            if(empty($session_data['fld_about_your_enterprise'])){ $session_data['fld_about_your_enterprise'] = ''; }
            if(empty($session_data['fld_area_of_service'])){ $session_data['fld_area_of_service'] = ''; }
            if(empty($session_data['fld_service_offered_patient_monitoring'])){ $session_data['fld_service_offered_patient_monitoring'] = ''; }
            if(empty($session_data['fld_service_offered_home_health'])){ $session_data['fld_service_offered_home_health'] = ''; }
            if(empty($session_data['fld_service_offered_activities'])){ $session_data['fld_service_offered_activities'] = ''; }
            if(empty($session_data['fld_service_offered_counselling'])){ $session_data['fld_service_offered_counselling'] = ''; }
            if(empty($session_data['fld_service_offered_support_group'])){ $session_data['fld_service_offered_support_group'] = ''; }
            if(empty($session_data['fld_service_offered_case_management'])){ $session_data['fld_service_offered_case_management'] = ''; }
            if(empty($session_data['fld_service_offered_food_nutrition'])){ $session_data['fld_service_offered_food_nutrition'] = ''; }
            if(empty($session_data['fld_service_offered_memory_care'])){ $session_data['fld_service_offered_memory_care'] = ''; }
            if(empty($session_data['fld_service_offered_vocational_help'])){ $session_data['fld_service_offered_vocational_help'] = ''; }
            if(empty($session_data['fld_membership_in_center'])){ $session_data['fld_membership_in_center'] = ''; }
            if(empty($session_data['fld_membership_virtual'])){ $session_data['fld_membership_virtual'] = ''; }
            if(empty($session_data['fld_membership_hybrid'])){ $session_data['fld_membership_hybrid'] = ''; }
            if(empty($session_data['fld_contact_person_firstname'])){ $session_data['fld_contact_person_firstname'] = ''; }
            if(empty($session_data['fld_contact_person_lastname'])){ $session_data['fld_contact_person_lastname'] = ''; }
            if(empty($session_data['fld_contact_person_position'])){ $session_data['fld_contact_person_position'] = ''; }
            if(empty($session_data['fld_contact_person_direct_line'])){ $session_data['fld_contact_person_direct_line'] = ''; }


            $user_info = array(
                            'fld_enterprise_name' => ((empty($user_details->enterprise_name))?$user->name:$user_details->enterprise_name),
                            'fld_business_type' => ((empty($user_details->business_type))?$session_data['fld_business_type']:$user_details->business_type),
                            'fld_business_address' => ((empty($user_details->business_address))?$user->address:$user_details->business_address),
                            'fld_business_location' => ((empty($user_details->location))?$session_data['fld_business_location']:$user_details->location),
                            'fld_business_address_zipcode' => ((empty($user_details->business_address_zipcode))?$session_data['fld_business_address_zipcode']:$user_details->business_address_zipcode),
                            'fld_client_size' => ((empty($user_details->client_size))?$session_data['fld_client_size']:$user_details->client_size),
                            'fld_staff_size' => ((empty($user_details->staff_size))?$session_data['fld_staff_size']:$user_details->staff_size),
                            'fld_tel' => ((empty($user->tel))?'':$user->tel),
                            'fld_business_timezone' => ((empty($user_details->business_timezone))?$session_data['fld_business_timezone']:$user_details->business_timezone),
                            'fld_business_email_for_inquiry' => ((empty($user_details->business_email_for_inquiry))?$user->email:$user_details->business_email_for_inquiry),
                            'fld_website' => ((empty($user_details->website))?$session_data['fld_website']:$user_details->website),
                            'fld_about_your_enterprise' => ((empty($user_details->about_your_enterprise))?$session_data['fld_about_your_enterprise']:$user_details->about_your_enterprise),
                            'fld_area_of_service' => ((empty($user_details->area_of_service))?$session_data['fld_area_of_service']:$user_details->area_of_service),
                            'fld_service_offered_patient_monitoring' => ((empty($user_details->service_offered_patient_monitoring))?$session_data['fld_service_offered_patient_monitoring']:$user_details->service_offered_patient_monitoring),
                            'fld_service_offered_home_health' => ((empty($user_details->service_offered_home_health))?$session_data['fld_service_offered_home_health']:$user_details->service_offered_home_health),
                            'fld_service_offered_activities' => ((empty($user_details->service_offered_activities))?$session_data['fld_service_offered_activities']:$user_details->service_offered_activities),
                            'fld_service_offered_counselling' => ((empty($user_details->service_offered_counselling))?$session_data['fld_service_offered_counselling']:$user_details->service_offered_counselling),
                            'fld_service_offered_support_group' => ((empty($user_details->service_offered_support_group))?$session_data['fld_service_offered_support_group']:$user_details->service_offered_support_group),
                            'fld_service_offered_case_management' => ((empty($user_details->service_offered_case_management))?$session_data['fld_service_offered_case_management']:$user_details->service_offered_case_management),
                            'fld_service_offered_food_nutrition' => ((empty($user_details->service_offered_food_nutrition))?$session_data['fld_service_offered_food_nutrition']:$user_details->service_offered_food_nutrition),
                            'fld_service_offered_memory_care' => ((empty($user_details->service_offered_memory_care))?$session_data['fld_service_offered_memory_care']:$user_details->service_offered_memory_care),
                            'fld_service_offered_vocational_help' => ((empty($user_details->service_offered_vocational_help))?$session_data['fld_service_offered_vocational_help']:$user_details->service_offered_vocational_help),
                            'fld_membership_in_center' => ((empty($user_details->membership_in_center))?$session_data['fld_membership_in_center']:$user_details->membership_in_center),
                            'fld_membership_virtual' => ((empty($user_details->membership_virtual))?$session_data['fld_membership_virtual']:$user_details->membership_virtual),
                            'fld_membership_hybrid' => ((empty($user_details->membership_hybrid))?$session_data['fld_membership_hybrid']:$user_details->membership_hybrid),
                            'fld_logo' => ((empty($user_details->logo))?'':'/storage/app/'.$user->get_vendor_logo_upload_path().'/'.$user_details->logo),
                            'fld_contact_person_firstname' => ((empty($user_details->contact_person_firstname))?$session_data['fld_contact_person_firstname']:$user_details->contact_person_firstname),
                            'fld_contact_person_lastname' => ((empty($user_details->contact_person_lastname))?$session_data['fld_contact_person_lastname']:$user_details->contact_person_lastname),
                            'fld_contact_person_position' => ((empty($user_details->contact_person_position))?$session_data['fld_contact_person_position']:$user_details->contact_person_position),
                            'fld_contact_person_direct_line' => ((empty($user_details->contact_person_direct_line))?$session_data['fld_contact_person_direct_line']:$user_details->contact_person_direct_line),
                            'fld_contact_person_email' => ((empty($user_details->contact_person_email))?$session_data['fld_contact_person_email']:$user_details->contact_person_email),
                        );            

            return view('vendor.dashboard', ['user_data' => $user_data, 'user_info' => $user_info]);
        }
        else{
            return redirect()->route('signinvendor_login');
        }
    } 

    public function update_user_data(Request $request)
    {
        $user = Auth::user();      

        $postData = $request->all();
        $validator = Validator::make($request->all(), [
            'fld_enterprise_name' => 'required|min:1|max:200',
            'fld_business_type' => 'required',
            'fld_business_address' => 'required|max:100',
            'fld_business_address_zipcode' => 'required|max:50',
            'fld_business_location' => 'required',                        
            'fld_tel' => 'required|numeric',
            'fld_business_email_for_inquiry' => 'required|email',
            'fld_website' => 'required|url',
            'fld_about_your_enterprise' => 'required|max:500',
            'fld_area_of_service' => 'required|max:500',
            'fld_contact_person_firstname' => 'required',
            'fld_contact_person_lastname' => 'required',
            'fld_contact_person_position' => 'required',
            'fld_contact_person_direct_line' => 'required|numeric',
            'fld_contact_person_email' => 'required|email'
        ]);        

        if ($validator->fails()) {
            $request->session()->put('postData', $postData);                
            return redirect('show_signinvendor_dashboard')->withInput()->withErrors($validator);
        }else{

            // add vendor logo
            if (isset($postData['fld_logo'])) {
                $fileMeta = $this->saveImageFile($postData['fld_logo'], $user->get_vendor_logo_upload_path());

                $vendor_logo_filename = $fileMeta['filename'];
                $vendor_logo_mime = $fileMeta['mime'];
            }
            else {
                $vendor_logo_filename = '';
                $vendor_logo_mime = '';
            }

            $userData = UserInfo::where('user_id', '=', $request->input('user_id'))->first();
            if(empty($userData)){
                $userData = new UserInfo();
                $userData->user_id = $postData['user_id'];
            }
            $userData->enterprise_name = $postData['fld_enterprise_name'];
            $userData->business_type = $postData['fld_business_type'];
            $userData->business_address = $postData['fld_business_address'];
            $userData->business_address_zipcode = $postData['fld_business_address_zipcode']; 
            $userData->location = $postData['fld_business_location'];                
            $userData->client_size = $postData['fld_client_size'];
            $userData->staff_size = $postData['fld_staff_size'];

            if(!empty($vendor_logo_filename)){
                $userData->logo = $vendor_logo_filename;
            }

            $userData->business_timezone = $postData['fld_business_timezone'];
            $userData->business_email_for_inquiry = $postData['fld_business_email_for_inquiry'];
            $userData->website = $postData['fld_website'];
            $userData->about_your_enterprise = $postData['fld_about_your_enterprise'];
            $userData->area_of_service = $postData['fld_area_of_service'];
            $userData->service_offered_patient_monitoring = (empty($postData['fld_service_offered_patient_monitoring']))?0:1;
            $userData->service_offered_home_health = (empty($postData['fld_service_offered_home_health']))?0:1;
            $userData->service_offered_activities = (empty($postData['fld_service_offered_activities']))?0:1;
            $userData->service_offered_counselling = (empty($postData['fld_service_offered_counselling']))?0:1;
            $userData->service_offered_support_group = (empty($postData['fld_service_offered_support_group']))?0:1;
            $userData->service_offered_case_management = (empty($postData['fld_service_offered_case_management']))?0:1;
            $userData->service_offered_food_nutrition = (empty($postData['fld_service_offered_food_nutrition']))?0:1;
            $userData->service_offered_memory_care = (empty($postData['fld_service_offered_memory_care']))?0:1;
            $userData->service_offered_vocational_help = (empty($postData['fld_service_offered_vocational_help']))?0:1;
            $userData->membership_in_center = (empty($postData['fld_membership_in_center']))?0:1;
            $userData->membership_virtual = (empty($postData['fld_membership_virtual']))?0:1;
            $userData->membership_hybrid = (empty($postData['fld_membership_hybrid']))?0:1;
            $userData->contact_person_firstname = $postData['fld_contact_person_firstname'];
            $userData->contact_person_lastname = $postData['fld_contact_person_lastname'];
            $userData->contact_person_position = $postData['fld_contact_person_position'];
            $userData->contact_person_direct_line = $postData['fld_contact_person_direct_line'];
            $userData->contact_person_email = $postData['fld_contact_person_email'];
            $userData->save();

            $request->session()->flash('message', 'Successfully update details');
            $request->session()->flash('alert-class', 'alert-success'); 
            return redirect()->route('show_signinvendor_dashboard'); 

        }                 
    }

    public function show_vendor_finamce(){
        $user = Auth::user(); 

        if(!empty($user)){
            $user_details = $user->myDetails()->get();
            if(!empty($user_details[0])){
                $user_details = $user_details[0];
            }
            //dd($user_details);

            $user_course_ids = array();
            $courses = Courses::where('user_id', '=', $user->id)->get();
            //dd($courses);

            foreach($courses as $course){
                $user_course_ids[] = $course->id;
            }
            //dd($user_course_ids);


            $user_order_ids = array();
            $courseOrders = UserCourseOrderLists::whereIn('course_id', $user_course_ids)->get(); 
            //dd($courseOrders);     

            foreach($courseOrders as $courseOrder){
                $user_order_ids[] = $courseOrder->class_booking_id;
            }


            $orders = UserCourseOrders::whereIn('id', $user_order_ids)->get();
            //dd($orders);

            return view('vendor.finance', ['orders' => $orders, 'user_info' => $user_details]); 
        }
        else{
            $request->session()->flash('message', 'You are not currently login. Please login to go to finance section.');
            return redirect()->route('home');
        }                
    }       

    public function searchVendor(Request $request){

        $postData = $request->all();
        if(empty($postData['zipcode'])){
            $vendors = UserInfo::orderBy('created_at', 'desc')->inRandomOrder()->limit(4)->get();
        }
        else{
            $vendors = UserInfo::where('business_address_zipcode', $postData['zipcode'])->orderBy('created_at', 'desc')->inRandomOrder()->limit(4)->get();
        }
        //dd($vendors);
        
        $content = '';
        foreach ($vendors as $key => $vendor) {
          //dd($vendor->User()->get());
          $userObj = $vendor->User()->get();
          if(!empty($userObj[0]) && $userObj[0]->user_type == 'Vendor'){

            $content .= '<p class="">
                  <span> <img src="'.asset('assets/app/images/H_Logo.png').'" style="width: 40px;" /></span>
                  <span class="blue"><a href="#activeDay" onClick="show_vendor_details('.$vendor->user_id.')">'.$vendor->enterprise_name.', '.$vendor->location.'</a></span>&nbsp;&nbsp;';

                if(((int)$vendor->service_offered_patient_monitoring) === 1){
                    $content .= '<button class="button1 button5">Patient Monitoring</button>';
                }

                if(((int)$vendor->service_offered_home_health) === 1){
                    $content .= '<button class="button1 button5">Home Health</button>';
                }

                if(((int)$vendor->service_offered_activities) === 1){
                    $content .= '<button class="button1 button5">Activities</button>';
                }

                if(((int)$vendor->service_offered_counselling) === 1){
                    $content .= '<button class="button1 button5">Counselling</button>';
                }

                if(((int)$vendor->service_offered_support_group) === 1){
                    $content .= '<button class="button1 button5">Support Group</button>';
                }

                if(((int)$vendor->service_offered_case_management) === 1){
                    $content .= '<button class="button1 button5">Case Management</button>';
                }

                if(((int)$vendor->service_offered_food_nutrition) === 1){
                    $content .= '<button class="button1 button5">Food & Nutrition</button>';
                }

                if(((int)$vendor->service_offered_memory_care) === 1){
                    $content .= '<button class="button1 button5">Memory Care</button>';
                }

                if(((int)$vendor->service_offered_vocational_help) === 1){
                    $content .= '<button class="button1 button5">Vocational Help</button>';
                }   
            $content .= '</p>';

          }
        }

        return $content;
    }

    public function showVendorDetails(Request $request){

        $postData = $request->all();
        $content = '';     
        if(!empty($postData['vendor_id'])){
            $vendor = UserInfo::where('user_id', $postData['vendor_id'])->get();

            if(!empty($vendor)){
                $vendor = $vendor[0];

                $content .= '<br><br><div class="text-center"><div><img src="'.config('app.url').'/storage/app/vendor_logo/'.$vendor->logo.'" style="width: 20%;" /><h2 class="inline ">'.$vendor->enterprise_name.', '.$vendor->location.'</h2></div><br><span> <img src="'.asset('assets/app/images/H_Logo.png').'" style="width: 40px;" /></span>';

                if(((int)$vendor->service_offered_patient_monitoring) === 1){
                    $content .= '<button class="button1 button5">Patient Monitoring</button>';
                }

                if(((int)$vendor->service_offered_home_health) === 1){
                    $content .= '<button class="button1 button5">Home Health</button>';
                }

                if(((int)$vendor->service_offered_activities) === 1){
                    $content .= '<button class="button1 button5">Activities</button>';
                }

                if(((int)$vendor->service_offered_counselling) === 1){
                    $content .= '<button class="button1 button5">Counselling</button>';
                }

                if(((int)$vendor->service_offered_support_group) === 1){
                    $content .= '<button class="button1 button5">Support Group</button>';
                }

                if(((int)$vendor->service_offered_case_management) === 1){
                    $content .= '<button class="button1 button5">Case Management</button>';
                }

                if(((int)$vendor->service_offered_food_nutrition) === 1){
                    $content .= '<button class="button1 button5">Food & Nutrition</button>';
                }

                if(((int)$vendor->service_offered_memory_care) === 1){
                    $content .= '<button class="button1 button5">Memory Care</button>';
                }

                if(((int)$vendor->service_offered_vocational_help) === 1){
                    $content .= '<button class="button1 button5">Vocational Help</button>';
                } 
                
                $content .= '</div><br><br><div class="row d-flex "><div class="col-lg-4 offset-lg-1 col-md-5 col-sm-5 wow"><div class="image"><img alt="SEO" src="'.asset('assets/app/images/activeday.PNG').'"></div><br><p>Active Day of '.$vendor->business_type.'<br><br>'.$vendor->about_your_enterprise.'<br><br>'.$vendor->business_address.'<br><br>P: '.$vendor->contact_person_direct_line.'<br>Email: '.$vendor->contact_person_email .'<br/><br/>Hours of Operation:<br>Mon-Fri: 8am-4:30pm ('.$vendor->business_timezone.')<br><br/>Position: '.$vendor->contact_person_position.'<br>Contact Person: '.$vendor->contact_person_firstname.' '.$vendor->contact_person_lastname.'</p></div><div class="col-lg-6 col-md-7 col-sm-7 text-sm-left wow "><div class="heading-title col-md-12 mb-3"><ul class="ul ullist">';

                $features_list = explode("\n", $vendor->area_of_service);
                foreach($features_list as $feature){
                    $content .= '<li>'.$feature.'</li>';
                }

                $content .= '</ul><br>';                

                if(((int)$vendor->membership_in_center) === 1){
                    $content .= '<br><span class="blue"><span><img src="'.asset('assets/app/images/H_Logo.png').'" style="width: 40px;" /></span>In-Center Membership available</span>';
                }

                if(((int)$vendor->membership_virtual) === 1){
                    $content .= '<br><span class="blue"><span><img src="'.asset('assets/app/images/H_Logo.png').'" style="width: 40px;" /></span>Virtual Membership available</span>';
                }

                if(((int)$vendor->membership_hybrid) === 1){
                    $content .= '<br><span class="blue"><span><img src="'.asset('assets/app/images/H_Logo.png').'" style="width: 40px;" /></span>Hybrid Membership available</span>';
                }

                $content .= '</div></div></div><div class="text-center"><a href="'.$vendor->website.'" target="blank" class="submit-lg btn-lg"> Visit Vendor\'s Website</a>&nbsp;&nbsp;<a href="mailto:'.$vendor->business_email_for_inquiry.'" class=" button button6 button4"> Email Vendor</a></div>';                
            }           
        }

        return $content;
    }

    public function showCreditDetails(Request $request){

        $postData = $request->all();

        $content = '';       
        if(!empty($postData['credit_id'])){
            $credit = Credits::where('id', $postData['credit_id'])->get();

            if(!empty($credit)){
                $credit = $credit[0];

                if($credit->is_for_sale == 1){
                    $content .= '<input type="hidden" name="credit_id" value="'.$credit->id.'" /><input type="hidden" name="credit_points" value="'.$credit->points.'" /><input type="hidden" name="credit_cost_amount" value="'.$credit->cost_amount.'" /><input type="hidden" name="transaction_type" value="credit_purchase" /><div class="col-lg-4 offset-lg-1 col-md-5 col-sm-5 wow "><div class="image"><img alt="SEO" src="'.config('app.url').'/storage/app/credit_homepage_image/'.$credit->homepage_image.'"></div></div><div class="col-lg-6 col-md-7 col-sm-7 text-sm-left text-center wow "><div class="heading-title col-md-10 mb-3"><h3>'.$credit->title.'</h3><br><ul class="ul ullist"><li>Purchase '.$credit->points.' credits for $'.number_format($credit->cost_amount).'</li><li>&'.number_format(($credit->cost_amount/$credit->points)).' / credit</li><li>'.$credit->content.'</li><li>One year expiration</li><li>'.(($credit->is_auto_renewal == 1)?'Automatic refill available':'Automatic refill not available').'</li></ul><br><div class="row"><div class="col-lg-4">&nbsp; &nbsp;&nbsp;<i style="font-size:24px;color: black;" class="fa">&#xf004;</i><br>Wish List&nbsp;</div><div class="col-lg-4">&nbsp;<i style=\'font-size:24px;color: black;\' class=\'fa\'>&#xf064;</i><br>Share</div></div><br><div class="quantity buttons_added"><div class="input-group inline-group"><h3 class="inline"><span style="padding-top: 10px;display: inline-flex;">$'.number_format($credit->cost_amount).'</span> &nbsp; &nbsp; &nbsp;</h3><input type="button" value="-" class="minus" style="padding: 0px 10px;background-color: #ffffff;border: 1px solid #efefef;border-left-color: rgb(239, 239, 239);border-left-style: solid;border-left-width: 1px;cursor: pointer;" /><input type="number" step="1" min="1" name="quantity" id="cartQuantity" value="1" title="Qty" class="input-text qty text" size="6" required /><input type="button" value="+" class="plus" /></div></div><br><br><label class="switch"><input type="checkbox" checked="checked" value="1" name="fldAutoRenewal" /><span class="slider round"> </span></label> &nbsp; Auto-Renewal<br><br><input type="submit" id="btnAddToCart" name="btnAddToCart" class="button button6" value="Add to Cart" /><input type="submit" id="btnCheckout" name="btnCheckout" class="submit-lg btn-lg" value="Checkout" /></div></div><script>$(\'.minus\').click(function() { var cartQty = $(\'#cartQuantity\').val(); cartQty = parseInt(cartQty) - 1; $(\'#cartQuantity\').val(cartQty); }); $(\'.plus\').click(function() { var cartQty = $(\'#cartQuantity\').val(); cartQty = parseInt(cartQty) + 1; $(\'#cartQuantity\').val(cartQty); });</script>';
                }
            }           
        }

        return $content;
    } 

    public function redirectToHomeLogin(){
        return redirect()->route('show_admin_login');  
    }             

    private function redirect_user_to_dashboard($user)
    {
        return redirect()->route($user->getUserAccountUrl());       
    } 

    private function saveImageFile($uploadFile, $storage)
    {
        // Save photo
        $path = $uploadFile->store($storage);

        // Get filename
        $filename = explode('/', $path)[1];
        $mime = $uploadFile->getMimeType();

        return [
            'filename' => $filename,
            'mime' => $mime
        ];
    }                 
}
