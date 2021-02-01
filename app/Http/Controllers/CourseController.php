<?php

namespace App\Http\Controllers;

use Auth;
use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\Courses;
use App\Models\ContentTypes;
use App\Models\UserCourseOrderLists;


class CourseController extends Controller
{

    const STORAGE_COURSE_HERO_IMAGE = 'course_hero_image';   
    const STORAGE_COURSE_BROWSE_IMAGE_1 = 'course_browse_image_1';   
    const STORAGE_COURSE_BROWSE_IMAGE_2 = 'course_browse_image_2';   
    const STORAGE_COURSE_VIDEO_CLIP = 'course_video_clip';                    

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

        $user = Auth::user();
        //dd($user);

        if(!empty($user)){
            $user_info = $user->myDetails()->get();
            if(!empty($user_info[0])){
                $user_info = $user_info[0];
            }
            //dd($user_info);

            $user_course_info = $user->myCourses()->get();
            //dd($user_course_info); 

            $course_info = array();
            $course_info[] = array();
            foreach ($user_course_info as $key => $course) {
                $courseOrders = UserCourseOrderLists::where('course_id', $course->id)->get()->count();
                $course_info[$key] = (object)array('id' => $course->id, 'title' => $course->title, 'signut_cnt' => $courseOrders);
            } 
            //dd($course_info);          

            if($user->isMember()){
                //return view('vendor.dashboard', ['user_info' => $user_info]);
            }
            elseif($user->isVendor()){
                return view('vendor.manageclasses', ['user_course_info' => $course_info, 'user_info' => $user_info, 'vendor_logo_upload_path' => $user->get_vendor_logo_upload_path()]);
            }
            elseif($user->isEnterprise()){
                //return view('vendor.dashboard', ['user_info' => $user_info]);
            }
        }
        else{
            return redirect()->route('home');
        }
    }

    public function create_course(){
        $user = Auth::user();

        if(!empty($user)){
            $user_info = $user->myDetails()->get();
            if(!empty($user_info[0])){
                $user_info = $user_info[0];
            }

            $content_types = ContentTypes::ALL();

            return view('vendor.course_create', ['userInfo' => $user_info, 'content_types' => $content_types, 'vendor_logo_upload_path' => $user->get_vendor_logo_upload_path()]);        
        }
        else{
            return redirect()->route('home');
        }
    }

    public function edit_course($id, Request $request){
        $user = Auth::user();

        if(!empty($user)){
            $user_info = $user->myDetails()->get();
            if(!empty($user_info[0])){
                $user_info = $user_info[0];
            }

            $content_types = ContentTypes::ALL();            

            $course_data = Courses::findOrFail($id);
            //dd($course_data);

            return view('vendor.course_edit', ['userInfo' => $user_info, 'course_data' => $course_data, 'content_types' => $content_types, 'vendor_logo_upload_path' => $user->get_vendor_logo_upload_path()]);        
        }
        else{
            return redirect()->route('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $postData = $request->all();

        //print_r($postData);
        //die();

        if(!empty($postData['course_id'])){

        $validatedData = $request->validate([
            'fld_title' => 'required',
            'fld_start_date'  => 'required',
            'fld_end_date'     => 'required',
            'fld_start_time'     => 'required',
            'fld_end_time'     => 'required',
            'fld_content_type'     => 'required',
            'fld_about_class'     => 'required',                    
        ]);

        }
        else{

        $validatedData = $request->validate([
            'fld_title' => 'required',
            'fld_start_date'  => 'required',
            'fld_end_date'     => 'required',
            'fld_start_time'     => 'required',
            'fld_end_time'     => 'required',
            'fld_content_type'     => 'required',
            'fld_about_class'     => 'required',
            'fld_equipment_require'     => 'required',
            'fld_hero_image'     => 'required',
            'fld_browser_image_1'     => 'required',
            'fld_browser_image_2'     => 'required',
            'fld_video_clip'     => 'required',                      
        ]);

        }

        // add vendor logo
        if (isset($postData['fld_hero_image'])) {
            $fileMeta = $this->saveImageFile($postData['fld_hero_image'], 'course_hero_image');

            $hero_image_filename = $fileMeta['filename'];
            $hero_image_mime = $fileMeta['mime'];
        }
        else {
            $hero_image_filename = '';
            $hero_image_mime = '';
        }

        // add vendor logo
        if (isset($postData['fld_browser_image_1'])) {
            $fileMeta = $this->saveImageFile($postData['fld_browser_image_1'], 'course_browser_image');

            $browser_image_filename = $fileMeta['filename'];
            $browser_image_mime = $fileMeta['mime'];
        }
        else {
            $browser_image_filename = '';
            $browser_image_mime = '';
        } 
        
        // add vendor logo
        if (isset($postData['fld_browser_image_2'])) {
            $fileMeta = $this->saveImageFile($postData['fld_browser_image_2'], 'course_browser_image');

            $browser_image_2_filename = $fileMeta['filename'];
            $browser_image_2_mime = $fileMeta['mime'];
        }
        else {
            $browser_image_2_filename = '';
            $browser_image_2_mime = '';
        }   

        // add vendor logo
        if (isset($postData['fld_video_clip'])) {
            $fileMeta = $this->saveImageFile($postData['fld_video_clip'], 'course_video_clip');

            $video_clip_filename = $fileMeta['filename'];
            $video_clip_mime = $fileMeta['mime'];
        }
        else {
            $video_clip_filename = '';
            $video_clip_mime = '';
        }                      


        if(!empty($postData['course_id'])){

        $course = Courses::findOrFail($postData['course_id']);

        $course->title = $postData['fld_title'];
        $course->start_date = $postData['fld_start_date'];
        $course->end_date = $postData['fld_end_date'];
        $course->start_time = $postData['fld_start_time'];
        $course->end_time = $postData['fld_end_time'];
        $course->day_monday = (empty($postData['fld_day_monday']))?0:1;
        $course->day_tuesday = (empty($postData['fld_day_tuesday']))?0:1;
        $course->day_wednesday = (empty($postData['fld_day_wednesday']))?0:1;
        $course->day_thursday = (empty($postData['fld_day_thursday']))?0:1;
        $course->day_friday = (empty($postData['fld_day_friday']))?0:1;
        $course->day_saturday = (empty($postData['day_saturday']))?0:1;
        $course->day_sunday = (empty($postData['fld_day_sunday']))?0:1;
        $course->re_occur = (empty($postData['fld_re_occur']))?0:1;
        $course->credits = $postData['fld_credits'];
        $course->class_size = $postData['fld_class_size'];
        $course->join_by = $postData['fld_join_by'];
        $course->content_type_id = $postData['fld_content_type'];
        $course->about_class = $postData['fld_about_class'];
        $course->equipment_require = $postData['fld_equipment_require'];

        if(!empty($hero_image_filename)){
            $course->hero_image = $hero_image_filename;
        }
        
        if(!empty($browser_image_filename)){
            $course->browser_image_1 = $browser_image_filename;
        }

        if(!empty($browser_image_2_filename)){
            $course->browser_image_2 = $browser_image_2_filename;
        }

        if(!empty($video_clip_filename)){
            $course->video_clip = $video_clip_filename;
        }
        $course->save();

        }
        else{

        $course = new Courses();
        $course->user_id = $user->id;

        $course->title = $postData['fld_title'];
        $course->start_date = $postData['fld_start_date'];
        $course->end_date = $postData['fld_end_date'];
        $course->start_time = $postData['fld_start_time'];
        $course->end_time = $postData['fld_end_time'];
        $course->day_monday = (empty($postData['fld_day_monday']))?0:1;
        $course->day_tuesday = (empty($postData['fld_day_tuesday']))?0:1;
        $course->day_wednesday = (empty($postData['fld_day_wednesday']))?0:1;
        $course->day_thursday = (empty($postData['fld_day_thursday']))?0:1;
        $course->day_friday = (empty($postData['fld_day_friday']))?0:1;
        $course->day_saturday = (empty($postData['day_saturday']))?0:1;
        $course->day_sunday = (empty($postData['fld_day_sunday']))?0:1;
        $course->re_occur = (empty($postData['fld_re_occur']))?0:1;
        $course->credits = $postData['fld_credits'];
        $course->class_size = $postData['fld_class_size'];
        $course->join_by = $postData['fld_join_by'];
        $course->content_type_id = $postData['fld_content_type'];
        $course->about_class = $postData['fld_about_class'];
        $course->equipment_require = $postData['fld_equipment_require'];
        $course->hero_image = $hero_image_filename;
        $course->browser_image_1 = $browser_image_filename;
        $course->browser_image_2 = $browser_image_2_filename;
        $course->video_clip = $video_clip_filename;
        $course->save();

        }


        $request->session()->flash('message', 'Successfully save details');
        $request->session()->flash('alert-class', 'alert-success'); 
        return redirect()->route('show_signinvendor_manageclasses');
    }

    public function course_details($course_id = null, Request $request){

        if(!empty($course_id)){
            $content_types = ContentTypes::ALL();
            $course_data = Courses::findOrFail($course_id);
            $owner_data = $course_data->Owner()->get();
            //dd($owner_data);

            return view('coursedetails', ['course_data' => $course_data, 'content_types' => $content_types, 'owner_data' => $owner_data[0]]);      
        }
        else{
            return redirect()->route('home');
        }
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
