<?php

namespace App\Http\Controllers\Admin;

use Storage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Banners;


class BannersController extends Controller
{

    const STORAGE_BANNER_IMAGE = 'banner_image'; 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banners::paginate( 20 );
        return view('admin.dashboard.banners.bannersList', ['banners' => $banners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',                       
        ]);

        // add banner image
        $fld_image = $request->input('fld_image');
        if (!empty($fld_image)) {
            $fileMeta = $this->saveImageFile($fld_image, SELF::STORAGE_BANNER_IMAGE);

            $banner_image_filename = $fileMeta['filename'];
            $banner_image_mime = $fileMeta['mime'];
        }
        else {
            $banner_image_filename = '';
            $banner_image_mime = '';
        }

        $user = auth()->user();
        $banner = new Banners();
        $banner->title = $request->input('title');
        $banner->banner_image = $banner_image_filename;
        $banner->created_at = date("Y-m-d H:i:s");        
        $banner->save();

        $request->session()->flash('message', 'Successfully created banner');
        return redirect()->route('banners.index');
    }*/

    public function save_details(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',                       
        ]);

        $postData = $request->all();

        // add credit logo
        if (!empty($postData['fld_image']) && $postData['fld_image'] != 'undefined') {
            $fileMeta = $this->saveImageFile($postData['fld_image'], SELF::STORAGE_BANNER_IMAGE);

            $banner_image_filename = $fileMeta['filename'];
            $banner_image_mime = $fileMeta['mime'];
        }
        else {
            $banner_image_filename = '';
            $banner_image_mime = '';
        }

        $user = auth()->user();
        $banner = new Banners();
        $banner->title = $postData['title'];
        $banner->status = (int)$postData['status'];

        if(!empty($banner_image_filename)){
            $banner->banner_image = $banner_image_filename;  
        } 

        $banner->created_at = date("Y-m-d H:i:s");        
        $banner->save();

        return 'success';
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner = Banners::find($id);
        return view('admin.dashboard.banners.bannersShow', [ 'banner' => $banner ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banners::find($id);
        return view('admin.dashboard.banners.edit', [ 'banner' => $banner ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'title'             => 'required',
        ]);

        // add banner image
        $fld_image = $request->input('fld_image');
        if (!empty($fld_image)) {
            $fileMeta = $this->saveImageFile($fld_image, SELF::STORAGE_BANNER_IMAGE);

            $banner_image_filename = $fileMeta['filename'];
            $banner_image_mime = $fileMeta['mime'];
        }
        else {
            $banner_image_filename = '';
            $banner_image_mime = '';
        }

        $banner = Banners::find($id);
        $banner->title = $request->input('title');
        $banner->banner_image = $banner_image_filename;               
        $banner->save();

        if(!empty($request->input('fld_image_existing')))
            Storage::delete($request->input('fld_image_existing'));

        $request->session()->flash('message', 'Successfully edited banner');
        return redirect()->route('banners.index');
    }*/

    public function update_details(Request $request, $id)
    {

        $validatedData = $request->validate([
            'title' => 'required', 
        ]);

        $postData = $request->all();

        // add credit logo
        if (!empty($postData['fld_image']) && $postData['fld_image'] != 'undefined') {
            $fileMeta = $this->saveImageFile($postData['fld_image'], SELF::STORAGE_BANNER_IMAGE);

            $banner_image_filename = $fileMeta['filename'];
            $banner_image_mime = $fileMeta['mime'];
        }
        else {
            $banner_image_filename = '';
            $banner_image_mime = '';
        }

        if(!empty($postData['fld_image_existing']) && $postData['fld_image_existing'] != 'undefined' && !empty($banner_image_filename)){
            $unlink_file_path = storage_path('app/'.SELF::STORAGE_BANNER_IMAGE.'/'.$postData['fld_image_existing']);
            if(file_exists($unlink_file_path)){
                unlink($unlink_file_path);
            }
        }

        $banner = Banners::find($id);
        $banner->title = $postData['title'];
        $banner->status = (int)$postData['status'];

        if(!empty($banner_image_filename)){
            $banner->banner_image = $banner_image_filename;  
        }  
        $banner->save();

        return 'success';
    }    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banners::find($id);
        if($banner){
            if(!empty($banner->banner_image))
               unlink(storage_path('app/'.SELF::STORAGE_BANNER_IMAGE.'/'.$banner->banner_image));            

            $banner->delete();
        }
        return redirect()->route('banners.index');
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
