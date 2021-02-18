<?php

namespace App\Http\Controllers;

use Auth;
use Cart;
use Mail;
//use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Services\UserCreditService;

use App\Models\Courses;
use App\Models\Credits;
use App\Models\UserCourseOrders;
use App\Models\UserCourseOrderLists;
use App\Models\UserCreditOrders;
use App\Models\UserCreditOrderLists;
use App\Models\UserCredits;
use App\Models\EmailTemplate;

class CartController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        //dd($user);

        $courses = Courses::orderBy('created_at', 'desc')->inRandomOrder()->limit(6)->get();
        //dd($course);        

        if(!empty($user)){
            $user_info = $user->myDetails()->get();
            if(!empty($user_info[0])){
                $user_info = $user_info[0];
            }        

            $cart_contents = Cart::getContent();
            //dd($cart_contents);

            $cart_content_list = array();
            $total_price = 0;
            $transaction_type = 'course_order';
            foreach($cart_contents as $item){
                if(!empty($item->attributes['transaction_type']) && $item->attributes['transaction_type'] == 'credit_purchase'){
                    $transaction_type = 'credit_purchase';
                    $credit = Credits::findOrFail($item->attributes['credit_id']);
                    //$user_details = $course->Owner()->get();

                    $cart_content_list[] = array('title' => $credit->title, 'details' => $credit->content , 'image' => 'credit_homepage_image/'.$credit->homepage_image, 'cart_qty' => $item->quantity, 'cart_item_price' => $item->price, 'cart_item_id' => $item->id, 'qty_unit' => '', 'price_unit' => '');

                    $total_price += $item->price;
                }
                else{
                    $course = Courses::findOrFail($item->attributes['course_id']);
                    $user_details = $course->Owner()->get();

                    $cart_content_list[] = array('title' => $course->title, 'details' => $user_details[0]->enterprise_name.', '.$user_details[0]->location, 'image' => 'course_browser_image/'.$course->browser_image_2, 'cart_qty' => $item->quantity, 'cart_item_price' => $item->price, 'cart_item_id' => $item->id, 'qty_unit' => '(Classes)', 'price_unit' => '(Credits)');

                    $total_price += $item->price;                    
                }

            }

            if($transaction_type == 'credit_purchase'){
                return view('cart.basket', ['cart_content' => $cart_content_list, 'total_price' => $total_price, 'cartCount' => Cart::getContent()->count(), 'transaction_type' => $transaction_type, 'currency_symbol' => '$', 'total_unit' => '', 'courses' => $courses]);
            }
            else{
                return view('cart.basket', ['cart_content' => $cart_content_list, 'total_price' => $total_price, 'cartCount' => Cart::getContent()->count(), 'transaction_type' => $transaction_type, 'currency_symbol' => '', 'total_unit' => 'Credit Points', 'courses' => $courses]);
            }
        }
        else{
            $request->session()->flash('message', 'You are not currently login. Please login to go for purchasing course.');
            return redirect()->route('home');
        }            
    }

    public function addToCart(Request $request){
        $user = Auth::user();

        if(!empty($user)){
            $userservice = new UserCreditService();

            $user_info = $user->myDetails()->get();
            if(!empty($user_info[0])){
                $user_info = $user_info[0];
            }

            $postData = $request->all();
            //dd($postData);

            if(!empty($postData['transaction_type']) && $postData['transaction_type'] == 'credit_purchase'){
                $credit = Credits::findOrFail($postData['credit_id']);
                $options = $request->except('_token');

                $total_price = $credit->cost_amount;
                $qty_cnt = (int)$postData['quantity'];          

                Cart::add(uniqid(), $credit->title, ($total_price * $qty_cnt), $qty_cnt, $options);
            }
            else{
                $course = Courses::findOrFail($postData['course_id']);
                $options = $request->except('_token');

                $total_price = 0;
                $credit_cnt = 1;
                if(((int)$postData['quantity']) < $course->class_size){
                    $total_price = $course->credits;
                }
                else{
                    $credit_cnt = ceil(((int)$postData['quantity']) / $course->class_size);
                }

                $userCreditCnt = $userservice->getUserAvailableCredit($user->id);
                //dd($userCreditCnt);

                if($userCreditCnt < ($postData['course_credit'] * $credit_cnt)) {
                    $request->session()->flash('message', 'You are don\'t have sufficient credit to go for this purchase. Please go for adding more credits to your acount.');
                    return redirect()->route('home');
                }           

                Cart::add(uniqid(), $course->title, ($postData['course_credit'] * $credit_cnt), $credit_cnt, $options);
            }

            $request->session()->flash('message', 'Item added to cart successfully.');

            if(!empty($postData['btnAddToCart'])){
                return redirect()->route('view_cart');
            }
            else{
                return redirect()->route('checkout.cart');
            }              
        }
        else{
            $request->session()->flash('message', 'You are not currently login. Please login to go for purchasing course.');
            return redirect()->route('home');
        }
    }

    public function removeItem($id){
        Cart::remove($id);

        if (Cart::isEmpty()) {
            return redirect('/');
        }
        return redirect()->back()->with('message', 'Item removed from cart successfully.');
    }  

    public function clearCart(){
        Cart::clear();

        return redirect('/');
    }      

    public function checkout(Request $request){
        $user = Auth::user();

        if(!empty($user)){
            $user_info = $user->myDetails()->get();
            if(!empty($user_info[0])){
                $user_info = $user_info[0];
            }

            $cart_contents = Cart::getContent();
            //dd($cart_contents);

            $cart_content_list = array();
            $total_price = $total_credit_points = 0;
            $transaction_type = 'course_order';            
            foreach($cart_contents as $item){
                if(!empty($item->attributes['transaction_type']) && $item->attributes['transaction_type'] == 'credit_purchase'){
                    $transaction_type = 'credit_purchase';
                    $credit = Credits::findOrFail($item->attributes['credit_id']);

                    $cart_content_list[] = array('title' => $credit->title, 'cart_qty' => $item->quantity, 'cart_item_price' => $item->price);

                    $total_price += $item->price;
                    $total_credit_points += $credit->points;
                }
                else{                
                    $course = Courses::findOrFail($item->attributes['course_id']);
                    $user_details = $course->Owner()->get();

                    $cart_content_list[] = array('title' => $course->title, 'cart_qty' => $item->quantity, 'cart_item_price' => $item->price);

                    $total_price += $item->price;
                }
            }


            if($transaction_type == 'credit_purchase'){
                return view('cart.checkout', ['cart_content' => $cart_content_list, 'total_price' => $total_price, 'cartCount' => Cart::getContent()->count(), 'user' => $user, 'user_info' => $user_info, 'transaction_type' => $transaction_type, 'currency_symbol' => '$', 'total_credit_points_purchased' => $total_credit_points, 'cart_qty_unit' => '']);
            }
            else{
                return view('cart.checkout', ['cart_content' => $cart_content_list, 'total_price' => $total_price, 'cartCount' => Cart::getContent()->count(), 'user' => $user, 'user_info' => $user_info, 'transaction_type' => $transaction_type, 'currency_symbol' => '', 'total_credit_points_purchased' => $total_credit_points, 'cart_qty_unit' => ' Classes']);
            }
  
        }
        else{
            $request->session()->flash('message', 'You are not currently login. Please login to go for purchasing course.');
            return redirect()->route('home');
        }
    }

    public function placeOrder(Request $request){
        $user = Auth::user();

        $validatedData = $request->validate([
            'fldName' => 'required',
            'fldEmail' => 'required|email',
            'fldMobile' => 'required|numeric',
            'fldAddress' => 'required',
            'fldCountry' => 'required',                        
            'fldCity' => 'required',
            'fldState' => 'required',
            'fldPostal' => 'required|numeric'
        ]);     

        if(!empty($user)){
            $userservice = new UserCreditService();

            $user_info = $user->myDetails()->get();
            if(!empty($user_info[0])){
                $user_info = $user_info[0];
            }

            $postData = $request->all();
            $order_id = uniqid();
            //dd($postData);

            if(!empty($postData['transaction_type']) && $postData['transaction_type'] == 'credit_purchase'){
                $creditOrder = new UserCreditOrders();
                $creditOrder->booking_no = $order_id;
                $creditOrder->user_id = $user->id;
                $creditOrder->credit_available = $userservice->getUserAvailableCredit($user->id);
                $creditOrder->credit_purchase = $postData['total_credit_points_purchased'];
                $creditOrder->booking_person_name = $postData['fldName'];
                $creditOrder->booking_person_email = $postData['fldEmail'];
                $creditOrder->booking_person_phone = $postData['fldMobile'];
                $creditOrder->booking_person_address = $postData['fldAddress'];
                $creditOrder->booking_person_country = $postData['fldCountry'];
                $creditOrder->booking_person_city = $postData['fldCity'];
                $creditOrder->booking_person_state = $postData['fldState'];
                $creditOrder->booking_person_postalcode = $postData['fldPostal'];
                $creditOrder->save();

                if(!empty($creditOrder->id)){
                    $cart_contents = Cart::getContent();
                    foreach($cart_contents as $item){
                        $orderCredits = new UserCreditOrderLists();
                        $orderCredits->credit_purchase_order_id = $creditOrder->id;
                        $orderCredits->credit_qty = $item->quantity;
                        $orderCredits->credit_points = $item->attributes['credit_points'];
                        $orderCredits->credit_amount = $item->price;                        
                        $orderCredits->credit_id = $item->attributes['credit_id'];
                        $orderCredits->save();


                        $userCredit = new UserCredits();
                        $userCredit->user_id = $user->id;
                        $userCredit->credit_id = $item->attributes['credit_id'];                    
                        $userCredit->credit_purchased = $item->attributes['credit_points'];
                        $userCredit->credit_purchase_order_id = $creditOrder->id;
                        $userCredit->credit_purchase_amt = $item->price;                        
                        $userCredit->credit_purchase_datetime = date("Y-m-d H:i:s");
                        $userCredit->save();                         
                    }

                    Cart::clear();
                
                    $request->session()->flash('message', 'Order has been recorded successfully with Order No. '.$order_id);
                    return redirect()->route('home');                           
                }
                else{
                    $request->session()->flash('message', 'Your order canot be registered. Please try after sometime.');
                    return redirect()->route('home');    
                } 
            }
            else{
                $courseOrder = new UserCourseOrders();
                $courseOrder->booking_no = $order_id;
                $courseOrder->user_id = $user->id;
                $courseOrder->credit_available = $userservice->getUserAvailableCredit($user->id);
                $courseOrder->credit_used = $postData['fldCreditRequire'];
                $courseOrder->booking_person_name = $postData['fldName'];
                $courseOrder->booking_person_email = $postData['fldEmail'];
                $courseOrder->booking_person_phone = $postData['fldMobile'];
                $courseOrder->booking_person_address = $postData['fldAddress'];
                $courseOrder->booking_person_country = $postData['fldCountry'];
                $courseOrder->booking_person_city = $postData['fldCity'];
                $courseOrder->booking_person_state = $postData['fldState'];
                $courseOrder->booking_person_postalcode = $postData['fldPostal'];
                $courseOrder->save();

                if(!empty($courseOrder->id)){
                    $cart_contents = Cart::getContent();
                    foreach($cart_contents as $item){
                        $mail_content = '';                        

                        $orderCourses = new UserCourseOrderLists();
                        $orderCourses->class_booking_id = $courseOrder->id;
                        $orderCourses->no_of_participants_per_class = $item->attributes['course_credit'];
                        $orderCourses->registered_participants = $item->attributes['quantity'];
                        $orderCourses->course_id = $item->attributes['course_id'];
                        $orderCourses->save();


                        $course = Courses::find($item->attributes['course_id']);
                        $user_details = $course->OwnerInfo()->get();

                        $mail_content = 'Course Name:: '.$course->title.', Course Start Date:: '.$course->start_date.', Course End Date:: '.$course->end_date.', Course Booking Date:: '.date("d-M-Y").', Registered Participants:: '.$course->registered_participants.', Course Booking Id:: '.$order_id.', Total Credit Used:: '.$postData['fldCreditRequire'];


                        // ================= Sending booking Email to vendor of the course =================
                        $template = EmailTemplate::where('email_key', '=', 'vendor_course_booking_notification')->get();
                        if(!empty($template[0])){
                            $template = $template[0];
                            Mail::send([], [], function($message) use ($request, $template, $user_details, $mail_content) {
                                $message->to($user_details[0]->contact_person_email, $user_details[0]->contact_person_firstname)->subject($template->subject);
                                $message->from('email2mkashif@gmail.com','Joychannel');

                                $body = $template->content;
                                $body = str_replace('<content>', $mail_content, $body);

                                $message->setBody($body,'text/html');                
                            });
                        }


                        // ================= Sending booking Email to Admin of the site =================
                        $template = EmailTemplate::where('email_key', '=', 'admin_course_booking_notification')->get();
                        if(!empty($template[0])){
                            $template = $template[0];
                            Mail::send([], [], function($message) use ($request, $template, $mail_content) {
                                $message->to('email2mkashif@gmail.com', 'Administrator')->subject($template->subject);
                                $message->from($request->input('fldEmail'),$request->input('fldName'));

                                $body = $template->content;
                                $body = str_replace('<content>', $mail_content, $body);

                                $message->setBody($body,'text/html');                
                            });
                        }

                    }

                    $userCredit = new UserCredits();
                    $userCredit->user_id = $user->id;
                    $userCredit->credit_used = $postData['fldCreditRequire'];
                    $userCredit->credit_redeem_order_id = $courseOrder->id;
                    $userCredit->credit_redeem_datetime = date("Y-m-d H:i:s");
                    $userCredit->save();     

                    Cart::clear();
                
                    $request->session()->flash('message', 'Order has been recorded successfully with Order No. '.$order_id);
                    return redirect()->route('home');                           
                }
                else{
                    $request->session()->flash('message', 'Your order canot be registered. Please try after sometime.');
                    return redirect()->route('home');    
                } 
            }

        }
        else{
            $request->session()->flash('message', 'You are not currently login. Please login to go for purchasing course.');
            return redirect()->route('home');
        }                    
    } 
}
