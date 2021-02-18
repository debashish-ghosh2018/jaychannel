<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserInfo;

class VendorsController extends Controller
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
        $you = auth()->user();
        $vendors = User::where('user_type', '=', 'Vendor')->get();
        //dd($vendors);
        return view('admin.dashboard.vendors.vendorsList', compact('vendors', 'you'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        //dd($user);
        $user_data = $user->myDetails()->get();
        //dd($user_info);
        $user_logo_path = $user->get_vendor_logo_upload_path();

        $user_info = array();
        $user_info[0] = (object) array(
                        'enterprise_name' => ((empty($user_data[0]->enterprise_name))?'':$user_data[0]->enterprise_name),
                        'business_type' => ((empty($user_data[0]->business_type))?'':$user_data[0]->business_type),
                        'business_address' => ((empty($user_data[0]->business_address))?'':$user_data[0]->business_address),
                        'business_address_zipcode' => ((empty($user_details->business_address_zipcode))?'':$user_details->business_address_zipcode),
                        'client_size' => ((empty($user_data[0]->client_size))?'':$user_data[0]->client_size),
                        'staff_size' => ((empty($user_data[0]->staff_size))?'':$user_data[0]->staff_size),
                        'business_timezone' => ((empty($user_data[0]->business_timezone))?'':$user_data[0]->business_timezone),
                        'business_email_for_inquiry' => ((empty($user_data[0]->business_email_for_inquiry ))?'':$user_data[0]->business_email_for_inquiry ),
                        'website' => ((empty($user_data[0]->website))?'':$user_data[0]->website),
                        'about_your_enterprise' => ((empty($user_data[0]->about_your_enterprise))?'':$user_data[0]->about_your_enterprise),
                        'area_of_service' => ((empty($user_data[0]->area_of_service))?'':$user_data[0]->area_of_service),
                        'service_offered_patient_monitoring' => ((empty($user_data[0]->service_offered_patient_monitoring))?'':$user_data[0]->service_offered_patient_monitoring),
                        'service_offered_home_health' => ((empty($user_data[0]->service_offered_home_health))?0:$user_data[0]->service_offered_home_health),
                        'service_offered_activities' => ((empty($user_data[0]->service_offered_activities))?0:$user_data[0]->service_offered_activities),
                        'service_offered_counselling' => ((empty($user_data[0]->service_offered_counselling))?0:$user_data[0]->service_offered_counselling),
                        'service_offered_support_group' => ((empty($user_data[0]->service_offered_support_group))?0:$user_data[0]->service_offered_support_group),
                        'service_offered_case_management' => ((empty($user_data[0]->service_offered_case_management))?0:$user_data[0]->service_offered_case_management),
                        'service_offered_food_nutrition' => ((empty($user_data[0]->service_offered_food_nutrition))?0:$user_data[0]->service_offered_food_nutrition),
                        'service_offered_memory_care' => ((empty($user_data[0]->service_offered_memory_care))?0:$user_data[0]->service_offered_memory_care),
                        'service_offered_vocational_help' => ((empty($user_data[0]->service_offered_vocational_help))?0:$user_data[0]->service_offered_vocational_help),
                        'membership_in_center' => ((empty($user_data[0]->membership_in_center))?0:$user_data[0]->membership_in_center),
                        'membership_virtual' => ((empty($user_data[0]->membership_virtual))?0:$user_data[0]->membership_virtual),
                        'membership_hybrid' => ((empty($user_data[0]->membership_hybrid))?0:$user_data[0]->membership_hybrid),
                        'logo' => ((empty($user_data[0]->logo))?0:$user_data[0]->logo),
                        'contact_person_firstname' => ((empty($user_data[0]->contact_person_firstname))?'':$user_data[0]->contact_person_firstname),
                        'contact_person_lastname' => ((empty($user_data[0]->contact_person_lastname))?'':$user_data[0]->contact_person_lastname),
                        'contact_person_position' => ((empty($user_data[0]->contact_person_position))?'':$user_data[0]->contact_person_position),
                        'contact_person_direct_line' => ((empty($user_data[0]->contact_person_direct_line))?'':$user_data[0]->contact_person_direct_line),
                        'contact_person_email' => ((empty($user_data[0]->contact_person_email))?'':$user_data[0]->contact_person_email),
                        'location' => ((empty($user_data[0]->location))?'':$user_data[0]->location),
                    );        

        return view('admin.dashboard.vendors.vendorShow', compact( 'user', 'user_info', 'user_logo_path' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $user_data = $user->myDetails()->get();
        $user_logo_path = $user->get_vendor_logo_upload_path();
        //dd($user_info);

        $user_info = array();
        $user_info[0] = (object) array(
                        'enterprise_name' => ((empty($user_data[0]->enterprise_name))?'':$user_data[0]->enterprise_name),
                        'business_type' => ((empty($user_data[0]->business_type))?'':$user_data[0]->business_type),
                        'business_address' => ((empty($user_data[0]->business_address))?'':$user_data[0]->business_address),
                        'business_address_zipcode' => ((empty($user_details->business_address_zipcode))?'':$user_details->business_address_zipcode),
                        'client_size' => ((empty($user_data[0]->client_size))?'':$user_data[0]->client_size),
                        'staff_size' => ((empty($user_data[0]->staff_size))?'':$user_data[0]->staff_size),
                        'business_timezone' => ((empty($user_data[0]->business_timezone))?'':$user_data[0]->business_timezone),
                        'business_email_for_inquiry' => ((empty($user_data[0]->business_email_for_inquiry ))?'':$user_data[0]->business_email_for_inquiry ),
                        'website' => ((empty($user_data[0]->website))?'':$user_data[0]->website),
                        'about_your_enterprise' => ((empty($user_data[0]->about_your_enterprise))?'':$user_data[0]->about_your_enterprise),
                        'area_of_service' => ((empty($user_data[0]->area_of_service))?'':$user_data[0]->area_of_service),
                        'service_offered_patient_monitoring' => ((empty($user_data[0]->service_offered_patient_monitoring))?'':$user_data[0]->service_offered_patient_monitoring),
                        'service_offered_home_health' => ((empty($user_data[0]->service_offered_home_health))?0:$user_data[0]->service_offered_home_health),
                        'service_offered_activities' => ((empty($user_data[0]->service_offered_activities))?0:$user_data[0]->service_offered_activities),
                        'service_offered_counselling' => ((empty($user_data[0]->service_offered_counselling))?0:$user_data[0]->service_offered_counselling),
                        'service_offered_support_group' => ((empty($user_data[0]->service_offered_support_group))?0:$user_data[0]->service_offered_support_group),
                        'service_offered_case_management' => ((empty($user_data[0]->service_offered_case_management))?0:$user_data[0]->service_offered_case_management),
                        'service_offered_food_nutrition' => ((empty($user_data[0]->service_offered_food_nutrition))?0:$user_data[0]->service_offered_food_nutrition),
                        'service_offered_memory_care' => ((empty($user_data[0]->service_offered_memory_care))?0:$user_data[0]->service_offered_memory_care),
                        'service_offered_vocational_help' => ((empty($user_data[0]->service_offered_vocational_help))?0:$user_data[0]->service_offered_vocational_help),
                        'membership_in_center' => ((empty($user_data[0]->membership_in_center))?0:$user_data[0]->membership_in_center),
                        'membership_virtual' => ((empty($user_data[0]->membership_virtual))?0:$user_data[0]->membership_virtual),
                        'membership_hybrid' => ((empty($user_data[0]->membership_hybrid))?0:$user_data[0]->membership_hybrid),
                        'logo' => ((empty($user_data[0]->logo))?0:$user_data[0]->logo),
                        'contact_person_firstname' => ((empty($user_data[0]->contact_person_firstname))?'':$user_data[0]->contact_person_firstname),
                        'contact_person_lastname' => ((empty($user_data[0]->contact_person_lastname))?'':$user_data[0]->contact_person_lastname),
                        'contact_person_position' => ((empty($user_data[0]->contact_person_position))?'':$user_data[0]->contact_person_position),
                        'contact_person_direct_line' => ((empty($user_data[0]->contact_person_direct_line))?'':$user_data[0]->contact_person_direct_line),
                        'contact_person_email' => ((empty($user_data[0]->contact_person_email))?'':$user_data[0]->contact_person_email),
                        'location' => ((empty($user_data[0]->location))?'':$user_data[0]->location),
                    );        

        return view('admin.dashboard.vendors.vendorEditForm', compact('user', 'user_info', 'user_logo_path'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],         //'password' => ['string', 'min:3'],
            'address' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'numeric'],
            'fld_enterprise_name' => 'required|min:1|max:200',
            'fld_business_type' => 'required',
            'fld_business_address' => 'required|max:100',
            'fld_business_address_zipcode' => 'required|max:50',
            'fld_business_location' => 'required',
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

        $user = User::find($id);
        $user->name       = $request->input('name');
        $user->email      = $request->input('email');
        $user->address    = $request->input('address');
        $user->tel        = $request->input('tel');

        $new_password = $request->input('password');
        if(!empty($new_password)){
            $user->password = Hash::make($new_password);
        }
        $user->save();


        $postData = $request->all();

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

        $userData = UserInfo::where('user_id', '=', $id)->first();
        if(empty($userData)){
            $userData = new UserInfo();
            $userData->user_id = $id;
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

        $request->session()->flash('message', 'Successfully updated vendor');
        return redirect()->route('vendors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user){
            $user->delete();
        }
        return redirect()->route('vendors.index');
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
