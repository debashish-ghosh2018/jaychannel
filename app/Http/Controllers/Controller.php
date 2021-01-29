<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function oneFileUpload__($images, $folder='images',$name_start_from="img_"){
        $img_ext = $images->getClientOriginalExtension();
        $img_name =   $name_start_from.'_'.mt_rand(100000,999999).time().'.'.$img_ext;
        $destinationPath=   public_path('/uploads/'.$folder.'/');
        $images->move($destinationPath,$img_name);
        return $img_name;
    }

}
