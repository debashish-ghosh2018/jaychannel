<?php

namespace App\Http\Controllers\Admin;

use Storage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Credits;


class CreditsController extends Controller
{

    const STORAGE_CREDIT_HOMEPAGE_IMAGE = 'credit_homepage_image'; 

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
        $credits = Credits::paginate( 20 );
        return view('admin.dashboard.credits.creditsList', ['credits' => $credits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.credits.create');
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
            'title'             => 'required|min:1|max:64',
            'content'           => 'required',
            'type'              => 'required',
            'cost_amount'       => 'required|numeric',
            'points'            => 'required|numeric',
            'is_for_sale'       => 'required|numeric',
            'is_auto_renewal'   => 'required|numeric',                        
        ]);

        // add credit logo
        $fld_image = $request->input('fld_image');
        if (!empty($fld_image)) {
            $fileMeta = $this->saveImageFile($fld_image, SELF::STORAGE_CREDIT_HOMEPAGE_IMAGE);

            $credit_logo_filename = $fileMeta['filename'];
            $credit_logo_mime = $fileMeta['mime'];
        }
        else {
            $credit_logo_filename = '';
            $credit_logo_mime = '';
        }

        $user = auth()->user();
        $credit = new Credits();
        $credit->title     = $request->input('title');
        $credit->content   = $request->input('content');
        $credit->type = $request->input('type');
        $credit->cost_amount = $request->input('cost_amount');
        $credit->points = $request->input('points');   
        $credit->is_for_sale = (int)$request->input('is_for_sale');  
        $credit->is_auto_renewal = (int)$request->input('is_auto_renewal'); 
        $credit->homepage_image = $credit_logo_filename;
        $credit->created_by = $user->id;
        $credit->created_at = date("Y-m-d H:i:s");        
        $credit->save();

        $request->session()->flash('message', 'Successfully created credit');
        return redirect()->route('credits.index');
    }*/

    public function save_details(Request $request)
    {
        $validatedData = $request->validate([
            'title'             => 'required|min:1|max:64',
            'content'           => 'required',
            'type'              => 'required',
            'cost_amount'       => 'required|numeric',
            'points'            => 'required|numeric',
            'is_for_sale'       => 'required|numeric',
            'is_auto_renewal'   => 'required|numeric',                        
        ]);

        $postData = $request->all();

        // add credit logo
        if (!empty($postData['fld_image']) && $postData['fld_image'] != 'undefined') {
            $fileMeta = $this->saveImageFile($postData['fld_image'], SELF::STORAGE_CREDIT_HOMEPAGE_IMAGE);

            $credit_logo_filename = $fileMeta['filename'];
            $credit_logo_mime = $fileMeta['mime'];
        }
        else {
            $credit_logo_filename = '';
            $credit_logo_mime = '';
        }

        $user = auth()->user();
        $credit = new Credits();
        $credit->title = $postData['title'];
        $credit->status = (int)$postData['status'];        
        $credit->content = $postData['content'];
        $credit->type = $postData['type'];
        $credit->cost_amount = $postData['cost_amount'];
        $credit->points = $postData['points'];
        $credit->is_for_sale = $postData['is_for_sale'];
        $credit->is_auto_renewal = $postData['is_auto_renewal'];

        if(!empty($credit_logo_filename)){
            $credit->homepage_image = $credit_logo_filename;  
        } 

        $credit->created_by = $user->id;
        $credit->created_at = date("Y-m-d H:i:s");        
        $credit->save();

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
        $credit = Credits::find($id);
        return view('admin.dashboard.credits.creditsShow', [ 'credit' => $credit ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $credit = Credits::find($id);
        return view('admin.dashboard.credits.edit', [ 'credit' => $credit ]);
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
        //var_dump('bazinga');
        //die();
        $validatedData = $request->validate([
            'title'             => 'required|min:1|max:64',
            'content'           => 'required',
            'type'              => 'required',
            'cost_amount'       => 'required|numeric',
            'points'            => 'required|numeric',
            'is_for_sale'       => 'required|numeric',
            'is_auto_renewal'   => 'required|numeric', 
        ]);

        // add credit logo
        $fld_image = $request->input('fld_image');
        if (!empty($fld_image)) {
            $fileMeta = $this->saveImageFile($fld_image, SELF::STORAGE_CREDIT_HOMEPAGE_IMAGE);

            $credit_logo_filename = $fileMeta['filename'];
            $credit_logo_mime = $fileMeta['mime'];
        }
        else {
            $credit_logo_filename = '';
            $credit_logo_mime = '';
        }

        $credit = Credits::find($id);
        $credit->title     = $request->input('title');
        $credit->content   = $request->input('content');
        $credit->type = $request->input('type');
        $credit->cost_amount = $request->input('cost_amount');
        $credit->points = $request->input('points');
        $credit->is_for_sale = $request->input('is_for_sale');
        $credit->is_auto_renewal = $request->input('is_auto_renewal'); 
        $credit->homepage_image = $credit_logo_filename;               
        $credit->save();

        if(!empty($request->input('fld_image_existing')))
            Storage::delete($request->input('fld_image_existing'));

        $request->session()->flash('message', 'Successfully edited credit');
        return redirect()->route('credits.index');
    }*/

    public function update_details(Request $request, $id)
    {
        //var_dump('bazinga');

        $validatedData = $request->validate([
            'title'             => 'required|min:1|max:64',
            'content'           => 'required',
            'type'              => 'required',
            'cost_amount'       => 'required|numeric',
            'points'            => 'required|numeric',
            'is_for_sale'       => 'required|numeric',
            'is_auto_renewal'   => 'required|numeric', 
        ]);

        $postData = $request->all();

        // add credit logo
        if (!empty($postData['fld_image']) && $postData['fld_image'] != 'undefined') {
            $fileMeta = $this->saveImageFile($postData['fld_image'], SELF::STORAGE_CREDIT_HOMEPAGE_IMAGE);

            $credit_logo_filename = $fileMeta['filename'];
            $credit_logo_mime = $fileMeta['mime'];
        }
        else {
            $credit_logo_filename = '';
            $credit_logo_mime = '';
        }

        if(!empty($postData['fld_image_existing']) && $postData['fld_image_existing'] != 'undefined' && !empty($credit_logo_filename)){
            $unlink_file_path = storage_path('app/'.SELF::STORAGE_CREDIT_HOMEPAGE_IMAGE.'/'.$postData['fld_image_existing']);
            if(file_exists($unlink_file_path)){
                unlink($unlink_file_path);
            }
        }

        $credit = Credits::find($id);
        $credit->title = $postData['title'];
        $credit->status = (int)$postData['status'];        
        $credit->content = $postData['content'];
        $credit->type = $postData['type'];
        $credit->cost_amount = $postData['cost_amount'];
        $credit->points = $postData['points'];
        $credit->is_for_sale = $postData['is_for_sale'];
        $credit->is_auto_renewal = $postData['is_auto_renewal'];

        if(!empty($credit_logo_filename)){
            $credit->homepage_image = $credit_logo_filename;  
        }  
        $credit->save();

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
        $credit = Credits::find($id);
        if($credit){
            if(!empty($credit->homepage_image))
               unlink(storage_path('app/'.SELF::STORAGE_CREDIT_HOMEPAGE_IMAGE.'/'.$credit->homepage_image));            

            $credit->delete();
        }
        return redirect()->route('credits.index');
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
