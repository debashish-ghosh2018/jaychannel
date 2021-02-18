<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserInfo;
use App\Models\Courses;
use App\Models\ContentTypes;

class CoursesController extends Controller
{

    const STORAGE_COURSE_HERO_IMAGE = 'course_hero_image';   
    const STORAGE_COURSE_BROWSE_IMAGE_1 = 'course_browser_image';   
    const STORAGE_COURSE_BROWSE_IMAGE_2 = 'course_browser_image';   
    const STORAGE_COURSE_VIDEO_CLIP = 'course_video_clip'; 

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
        $courses = Courses::all();
        //dd($courses);
        return view('admin.dashboard.courses.coursesList', compact('courses', 'you'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Courses::find($id);
        //dd($course);

        $course_hero_img_path = SELF::STORAGE_COURSE_HERO_IMAGE;
        $course_browser_1_img_path = SELF::STORAGE_COURSE_BROWSE_IMAGE_1;
        $course_browser_2_img_path = SELF::STORAGE_COURSE_BROWSE_IMAGE_2;
        $course_video_path = SELF::STORAGE_COURSE_VIDEO_CLIP;                        

        return view('admin.dashboard.courses.courseShow', compact( 'course', 'course_hero_img_path', 'course_browser_1_img_path', 'course_browser_2_img_path', 'course_video_path' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Courses::find($id);
        //dd($course);

        $content_types = ContentTypes::ALL();

        $course_hero_img_path = SELF::STORAGE_COURSE_HERO_IMAGE;
        $course_browser_1_img_path = SELF::STORAGE_COURSE_BROWSE_IMAGE_1;
        $course_browser_2_img_path = SELF::STORAGE_COURSE_BROWSE_IMAGE_2;
        $course_video_path = SELF::STORAGE_COURSE_VIDEO_CLIP;      

        return view('admin.dashboard.courses.courseEditForm', compact('course', 'course_hero_img_path', 'course_browser_1_img_path', 'course_browser_2_img_path', 'course_video_path', 'content_types'));
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
            'fld_title' => 'required',
            'fld_start_date'  => 'required',
            'fld_end_date'     => 'required',
            'fld_start_time'     => 'required',
            'fld_end_time'     => 'required',
            'fld_content_type'     => 'required',
            'fld_about_class'     => 'required',
            'fld_equipment_require'     => 'required',                    
        ]);

        $postData = $request->all();

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

        $course = Courses::findOrFail($id);

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

        $request->session()->flash('message', 'Successfully updated course');
        return redirect()->route('courses.index');
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
        return redirect()->route('courses.index');
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
