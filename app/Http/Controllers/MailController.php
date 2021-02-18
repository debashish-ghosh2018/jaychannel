<?php

// Reference: https://laravel.com/docs/5.2/mail
//            https://www.tutorialspoint.com/laravel/laravel_sending_email.htm   
//            https://code.tutsplus.com/tutorials/how-to-send-emails-in-laravel--cms-30046
//            https://laravel.com/docs/5.2/mail

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class MailController extends Controller {
   public function basic_email() {
      $data = array('name'=>"Virat Gandhi");
   
      Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('ws.debashish@gmail.com', 'Tutorials Point')->subject('Laravel Basic Testing Mail');
         $message->from('email2mkashif@gmail.com','Joychannel');
      });
	  
	  if( count(Mail::failures()) > 0 ) {

	   echo "There was one or more failures. They were: <br />";

	   foreach(Mail::failures() as $email_address) {
		   echo " - $email_address <br />";
		}

	  } else {
		echo "No errors, all sent successfully!";
	  }	  
	  
      echo "Basic Email Sent. Check your inbox.";
   }

    public function html_email() {
        $data = array('name'=>"Virat Gandhi");

		try{
            Mail::send('mail', $data, function($message) {
                $message->to('ws.debashish@gmail.com', 'Tutorials Point')->subject('Laravel HTML Testing Mail');
                $message->from('email2mkashif@gmail.com','Joychannel');
            });
	  
	        if( count(Mail::failures()) > 0 ) {
	            echo "There was one or more failures. They were: <br />";
	            foreach(Mail::failures() as $email_address) {
		            echo " - $email_address <br />";
		        }
	        } else {
		        echo "No errors, all sent successfully!";
	        }
	  
            echo "<br/>HTML Email Sent. Check your inbox.";
		
		}catch(\Swift_TransportException $transportExp){
            echo $transportExp->getMessage();
        }
   }

   public function attachment_email() {
      $data = array('name'=>"Virat Gandhi");
      Mail::send('mail', $data, function($message) {
         $message->to('ws.debashish@gmail.com', 'Tutorials Point')->subject('Laravel Testing Mail with Attachment');
         //$message->attach('C:\laravel-master\laravel\public\uploads\image.png');
         //$message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
         $message->from('email2mkashif@gmail.com','Joychannel');
      });
	  
	  if( count(Mail::failures()) > 0 ) {

	   echo "There was one or more failures. They were: <br />";

	   foreach(Mail::failures() as $email_address) {
		   echo " - $email_address <br />";
		}

	  } else {
		echo "No errors, all sent successfully!";
	  }
	  
      echo "Email Sent with attachment. Check your inbox.";
   }
}