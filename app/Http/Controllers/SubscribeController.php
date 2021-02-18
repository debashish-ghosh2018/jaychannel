<?php

namespace App\Http\Controllers;

use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Subscribers;
use App\Models\EmailTemplate;


class SubscribeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname'  => 'required',
            'email'     => 'required',                       
        ]);

        $subscriber = new Subscribers();
        $subscriber->firstname     = $request->input('firstname');
        $subscriber->lastname   = $request->input('lastname');
        $subscriber->email = $request->input('email');
        $subscriber->created_at = date("Y-m-d H:i:s");        
        $subscriber->save();
		
        $template = EmailTemplate::where('email_key', '=', 'subscription_response')->get();
        if(!empty($template[0])){
            $template = $template[0];			
            Mail::send([], [], function($message) use ($request, $template) {
                $message->to($request->input('email'), $request->input('firstname') . " " . $request->input('lastname'))
                        ->subject($template->subject);
                $message->from('email2mkashif@gmail.com','Joychannel');
                $message->setBody($template->content,'text/html');                
            });
        }		

        echo "success";
    }

}
