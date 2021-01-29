@extends('layouts.app_inner_page')

@section('content')
<!-- section -->
<br><br><br><br><br>
<section id="main-banner-page" class="position-relative page-header contact-header section-nav-smooth parallax"
   style="background-image: url('{{ asset('assets/app/images/userbg.png') }}'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; background-position: center -68.85px;height: 500px;
   display: none;">
   <div class="container">
      <div class="row1">
      </div>
   </div>
</section>
<!--Some Feature -->
<section id="our-feature" class="single-feature padding">
   <div class="container ">
      <br>
      <br>
      <h2 class="padding content-padding">Welcome back, {{$you['name']}}!</h2>
      <br>
      <div class="notification-box">
                          @if(Session::has('success_message'))
                              <div class="alert alert-success" role="alert">
                              {{ Session::get('success_message') }}
                             </div>
                        @endif
 
                        @if(Session::has('error_message'))
                            <div class="alert alert-danger" role="alert">
                            {{ Session::get('error_message') }}
                        </div>
                        @endif
                        
                        
                        </div>
      <div class="row d-flex ">
         <div class="col-lg-2 offset-lg-1 col-md-5 col-sm-5 " >
            <h4><span class="blue"><a href="#">Account</a></span></h4>
            <br>
            <h4><a href="{{ route('show_member_classes') }}">Manage <br> Classes</a></h4>
            <br>
         </div>
         <div class="col-lg-9 col-md-7 col-sm-7 text-sm-left text-center" >
            <div class="heading-title col-md-12 mb-3">
               <h4> &nbsp; &nbsp; <img src="{{ asset('assets/app/images/arrow.PNG') }}" alt="" width="25px" height="25px">&nbsp; &nbsp; Personal
                  Account
               </h4>
               <br>
               <br>
               
               <form action="{{ route('add_card_details') }}" name="frmCreateCourse" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                     <div class="col-lg-2 col-6 text-left">
                        <label>Name </label>
                     </div>
                     <div class="col-lg-8 col-12">
                        <input type="text" class="form-control custom-file float-right" id="" name="user_name" value="{{$you['name']}}">
                        <label class="error">{{ $errors->first('user_name') }}</label>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-lg-2 col-6 text-left">
                        <label class="inline">Address </label>
                     </div>
                     <div class="col-lg-8 col-12">
                        <input type="text" class="form-control custom-file float-right" id="" name="address"
                        value="{{$you['address']}}">
                        <label class="error">{{ $errors->first('address') }}</label>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-lg-2 col-6 text-left">
                        <label class="inline">Tel </label>
                     </div>
                     <div class="col-lg-8 col-12">
                        <input type="text" class="form-control custom-file float-right" name="tel" id="" value="{{$you['tel']}}">
                        <label class="error">{{ $errors->first('tel') }}</label>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-lg-2 col-6 text-left">
                        <label class="inline">Email </label>
                     </div>
                     <div class="col-lg-8 col-12">
                        <input type="text" class="form-control custom-file float-right" name="email" id=""
                        value="{{$you['email']}}">
                        <label class="error">{{ $errors->first('email') }}</label>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-sm-2 col-6 text-left">
                        <label class="inline">Credit </label> &nbsp;&nbsp;
                     </div>
                     <div class="col-sm-2 col-12 text-left">
                        <input type="text" class="form-control custom-file float-right" name="credit_amount" id="" placeholder="2000">&nbsp;&nbsp;
                        <label class="error">{{ $errors->first('credit_amount') }}</label>
                     </div>
                     <div class="col-sm-1"></div>
                     <div class="col-sm-7 text-left col-12">
                        <label class="inline">Approved Price/Credit &nbsp;&nbsp; $3.00 </label> &nbsp;&nbsp;
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-lg-6 col-sm-6 col-xs-6">
                        <label class="switch">
                        <input type="checkbox" checked="checked" name="auto_refill" value="1">
                        <span class="slider round"> </span>
                        </label> &nbsp; Auto Refill &nbsp;&nbsp; Unused Credit &nbsp; 36
                        <label class="error">{{ $errors->first('auto_refill') }}</label>
                     </div>
                  </div>
                  <br>
                  <div class="row d-flex">
                     <div class="col-lg-2 col-5 text-left mb-1">
                        <span><img src="{{ asset('assets/app/images/Visaimg.jpg') }}" class="cardimgs" style="width: 50px;height: 39px;
                           padding: 6px;">
                        <img src="{{ asset('assets/app/images/mastercard_logo.0.png') }}" class="cardimgs" style="width: 50px;"><br>
                        <img src="{{ asset('assets/app/images/americancard.jpg') }}" class="cardimgs" style="width: 50px;height: 39px;">
                        <img src="{{ asset('assets/app/images/paypal2.png') }}" class="cardimgs" style="width: 50px;height: 39px;">
                        </span>
                     </div>
                     <div class="col-lg-8 col-12">
                        <input type="text" class="form-control custom-file mb-2" name="card_no" id="" placeholder="4155 3341 2298 9900">
                        <label class="error">{{ $errors->first('card_no') }}</label>
                        <div class="row">
                           <div class="col-lg-1 col-1">
                              <label for="" class="inline">Exp</label> &nbsp;
                           </div>
                           <div class="col-lg-3 col-3">
                              <select class="form-control select inline" name="exp_from" id="sel1">
                                 <option>1</option>
                                 <option>2</option>
                                 <option>3</option>
                                 <option>4</option>
                              </select>
                              <label class="error">{{ $errors->first('exp_from') }}</label>
                           </div>
                           <div class="col-lg-3 col-3">
                              <select class="form-control select inline " name="exp_to" id="sel1">
                                 <option>25</option>
                                 <option>26</option>
                                 <option>27</option>
                                 <option>28</option>
                                 <label class="error">{{ $errors->first('exp_to') }}</label>
                              </select>
                              &nbsp;
                           </div>
                           <div class="col-lg-2 col-2">
                              <label class="inline">CCV </label> 
                           </div>
                           <div class="col-lg-3 col-3">
                              <input type="text" class="form-control custom-file inline" name="ccv_no" id="" placeholder="123">
                              <label class="error">{{ $errors->first('ccv_no') }}</label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <br><br><br>
                  <label class="containercheckmark">
                  <input type="checkbox"  class="form-control">
                  <span class="checkmark"></span>
                  <span>I have a FlightDeck account</span>
                  </label>
                  <br>
                  <div class="row">
                     <div class="col-sm-2" >
                        <label class="inline" style="white-space: nowrap;">FlightDeck Login
                        </label>
                     </div>
                     <div class="col-sm-10" >
                        <input type="text" name="flightdeck_login" class="form-control custom-file float-right" id=""
                           placeholder="Sue@sunnysideurbanmanor.com">
                           <label class="error">{{ $errors->first('flightdeck_login') }}</label>
                     </div>
                  </div>
                  <br>
                  <br>
                  <br>
              
               <input type="submit" value="Save" class="submit">
               </form>
            </div>
         </div>
      </div>
   </div>
   <!--  -->
   <div class="container padding_top " style="display: none;">
      <div class="row d-flex ">
         <div class="col-lg-2 offset-lg-1 col-md-5 col-sm-5 " >
            <h4> Account</h4>
            <br>
            <h4> Manage <br> Classes</h4>
            <br>
         </div>
         <div class="col-lg-9 col-md-7 col-sm-7 text-sm-left text-center" >
            <div class="heading-title col-md-8 mb-3">
               <hr>
               <h4> &nbsp; &nbsp; <img src="{{ asset('assets/app/images/arrow.PNG') }}" alt="" width="25px" height="25px">&nbsp; &nbsp; Classes
                  Overview
               </h4>
               <hr>
               <p><span class="blue">Enrolled Classes </span>&nbsp;&nbsp;&nbsp; Wish List</p>
               <br>
               <h2 class="text-center">You've 36 credits</h2>
               <br>
               <table class="table">
                  <thead>
                     <tr>
                        <th scope="col">Class No.</th>
                        <th scope="col">Class Name</th>
                        <th scope="col">Credit Used</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td class="blue">0348876</td>
                        <td class="blue">Disability Thrives</td>
                        <td class="blue">12</td>
                     </tr>
                     <tr>
                        <td>0348661</td>
                        <td>Gardening Homes</td>
                        <td>10</td>
                     </tr>
                     <tr>
                        <td>0348110</td>
                        <td>Travelling in Time</td>
                        <td>10</td>
                     </tr>
                     <tr>
                        <td>0348668</td>
                        <td>Happy Hour with Dee</td>
                        <td>8</td>
                     </tr>
                     <tr>
                        <td>0348222</td>
                        <td>One World One Love</td>
                        <td>13</td>
                     </tr>
                     <tr>
                        <td>0348441</td>
                        <td>Tea Master in Ceremony</td>
                        <td>11</td>
                     </tr>
                     <tr>
                        <td>0348752</td>
                        <td>Zumba for Begineers</td>
                        <td>12</td>
                     </tr>
                     <tr>
                        <td>0348757</td>
                        <td>Mexcio Travel Fun</td>
                        <td>12</td>
                     </tr>
                     <tr>
                        <td>0348300</td>
                        <td>Music With A Chair</td>
                        <td>10</td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</section>
<br>
<br>
<br>
<br>
 <!-- end section -->
@endsection


@section('scripts')
<!-- <script src="{{ asset('assets/app/js/custom.js') }}"></script> -->
<script>
    /* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */

    function signin() {
      document.getElementById("loginDropdown").classList.toggle("show");
    }

    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function (event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
</script>
@endsection