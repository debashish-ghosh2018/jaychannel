<?php

namespace App\Http\Controllers;

use Auth;
use Cart;
//use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\Courses;

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
    public function index()
    {
        $user = Auth::user();
        //dd($user);

        if(!empty($user)){
            $user_info = $user->myDetails()->get();
            if(!empty($user_info[0])){
                $user_info = $user_info[0];
            }        

            $cart_contents = Cart::getContent();
            //dd($cart_contents);

            $cart_content_list = array();
            $total_price = 0;
            foreach($cart_contents as $item){
                $course = Courses::findOrFail($item->attributes['course_id']);
                $user_details = $course->Owner()->get();

                $cart_content_list[] = array('course_title' => $course->title, 'course_vendor' => $user_details[0]->enterprise_name.', '.$user_details[0]->location, 'course_image' => $course->browser_image_2, 'cart_qty' => $item->quantity, 'cart_item_price' => $item->price, 'cart_item_id' => $item->id);

                $total_price += $item->price;
            }

            return view('cart.basket', ['cart_content' => $cart_content_list, 'total_price' => $total_price, 'cartCount' => Cart::getContent()->count()]);
        }
        else{
            return redirect()->route('home');
        }            
    }

    public function addToCart(Request $request){
        $user = Auth::user();

        if(!empty($user)){
            $user_info = $user->myDetails()->get();
            if(!empty($user_info[0])){
                $user_info = $user_info[0];
            }

            $postData = $request->all();
            //print_r($postData);
            //die();
 
            $course = Courses::findOrFail($postData['course_id']);
            $options = $request->except('_token');

            $total_price = 0;
            $credit_cnt = 1;
            if(((int)$postData['quantity']) < $course->class_size){
                $total_price = $course->credits;
            }
            else{
                $credit_cnt = ((int)$postData['quantity']) / $course->class_size;
                $remaining_participants = ((int)$postData['quantity']) % $course->class_size;
                if($remaining_participants > 0){
                    $credit_cnt += 1; 
                }
            }

            Cart::add(uniqid(), $course->title, ($postData['course_credit'] * $credit_cnt), $request->input('quantity'), $options);

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
            $total_price = 0;
            foreach($cart_contents as $item){
                $course = Courses::findOrFail($item->attributes['course_id']);
                $user_details = $course->Owner()->get();

                $cart_content_list[] = array('course_title' => $course->title, 'cart_qty' => $item->quantity, 'cart_item_price' => $item->price);

                $total_price += $item->price;
            }

            return view('cart.checkout', ['cart_content' => $cart_content_list, 'total_price' => $total_price, 'cartCount' => Cart::getContent()->count(), 'user' => $user, 'user_info' => $user_info]);  
        }
        else{
			$request->session()->flash('message', 'You are not currently login. Please login to go for purchasing course.');
            return redirect()->route('home');
        }
    } 
}
