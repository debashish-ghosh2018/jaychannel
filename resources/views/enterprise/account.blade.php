@extends('layouts.app_inner_page')

@section('content')
<!-- section -->
<br><br><br><br><br>
<section id="main-banner-page" class="position-relative page-header contact-header section-nav-smooth parallax"
   style="display:none;background-image: url('{{ asset('assets/app/images/enterprisebg.PNG') }}'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; background-position: center -68.85px;height: 500px;">
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
      <div class="row">
         <div class="col-sm-9" style="align-self: center;">
            <h2 class="padding content-padding">
               Welcome back, {{$you['name']}}
            </h2>
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
            
            <div class="col-sm-3">
                @if ($checkUser && $checkUser['logo'] )
               <img src="http://digibee.site/jayjay/public/uploads/images/{{$checkUser?$checkUser['logo']:''}}" alt="sunny" style="width: 50%;
            position: relative;" />
            @endif
            </div>
         </div>
      </div>
      <br>
      <div class="row d-flex ">
         <div class="col-lg-2 offset-lg-1 col-md-5 col-sm-5">
            <h4><span class="blue"><a href="#">JayChannel <br> Account</a></span></h4>
            <br>
            <h4><a href="{{ route('show_enterprise_dashboard') }}">Classes <br> Overview</a></h4>
            <br>
            <h4>JayPad <br> Subscriptions</h4>
            <br>
         </div>
         <div class="col-lg-9 col-md-7 col-sm-7 text-sm-left text-center ">
            <div class="heading-title col-md-12 mb-3">
               <!-- <hr> -->
               <h4> &nbsp; &nbsp; <img src="{{ asset('assets/app/images/arrow.PNG') }}" alt="" width="25px"
                     height="25px">&nbsp; &nbsp; Enterprise
                  Account
               </h4>
               <!-- <hr> -->
               <br>
               <br>

               <?php
               $postData = session('postData');
               //print_r($postData);
               ?>
               <form action="{{ route('add_enterprise_card_details') }}" name="frmCreateCourse" method="POST"
               enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                     <div class="col-lg-2 col-6 text-left">
                        <label>Name </label>
                     </div>
                     <div class="col-lg-8 col-12">
                        <input type="text" class="form-control custom-file float-right" id="" name="user_name"
                           value="{{$checkUser?$checkUser['user_name']:($postData?$postData['user_name']:$you['name'])}}">
                        <label class="error">{{ $errors->first('user_name') }}</label>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-lg-2 col-6 text-left">
                        <label class="inline">Address </label>
                     </div>
                     <div class="col-lg-8 col-12">
                        <input type="text" class="form-control custom-file float-right" name="address"
                           value="{{$checkUser?$checkUser['address']:($postData?$postData['address']:$you['address'])}}">
                        <label class="error">{{ $errors->first('address') }}</label>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-lg-2 col-6 text-left">
                        <label class="inline">City </label>
                     </div>
                     <div class="col-lg-8 col-12">
                        <input type="text" class="form-control custom-file float-right" id="city" name="city"
                        value="{{$checkUser?$checkUser['city']:($postData?$postData['city']:$you['city'])}}" required />
                        <label class="error">{{ $errors->first('city') }}</label>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-lg-2 col-6 text-left">
                        <label class="inline">State </label>
                     </div>
                     <div class="col-lg-8 col-12">
                        <input type="text" class="form-control custom-file float-right" id="state" name="state"
                        value="{{$checkUser?$checkUser['state']:($postData?$postData['state']:$you['state'])}}" required />
                        <label class="error">{{ $errors->first('state') }}</label>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-lg-2 col-6 text-left">
                        <label class="inline">Zipcode </label>
                     </div>
                     <div class="col-lg-8 col-12">
                        <input type="number" class="form-control custom-file float-right" id="zipcode" name="zipcode"
                        value="{{$checkUser?$checkUser['zipcode']:($postData?$postData['zipcode']:$you['zipcode'])}}" required />
                        <label class="error">{{ $errors->first('zipcode') }}</label>
                     </div>
                  </div>
                  <br>                  
                  <div class="row">
                     <div class="col-lg-2 col-6 text-left">
                        <label class="inline">Tel </label>
                     </div>
                     <div class="col-lg-8 col-12">
                        <input type="text" class="form-control custom-file float-right" name="tel" id=""
                           value="{{$checkUser?$checkUser['tel']:($postData?$postData['tel']:$you['tel'])}}">
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
                           value="{{$checkUser?$checkUser['email']:($postData?$postData['email']:$you['email'])}}">
                        <label class="error">{{ $errors->first('email') }}</label>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-sm-2 col-6 text-left">
                        <label class="inline">Credit </label> &nbsp;&nbsp;
                     </div>
                     <div class="col-sm-2 col-12 text-left">
                        <input type="text" class="form-control custom-file float-right" name="credit_amount" id=""
                           placeholder="2000" value="{{!empty($checkUser['credit_amount'])?$checkUser['credit_amount']:(!empty($postData['credit_amount'])?$postData['credit_amount']:old('credit_amount'))}}">&nbsp;&nbsp;
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
                           <?php

                           $checked = '';
                           if(!empty($checkUser['auto_refill']) && ((int)$checkUser['auto_refill']) > 0){
                              $checked = 'checked';
                           }
                           elseif(!empty($postData['auto_refill']) && ((int)$postData['auto_refill']) > 0){
                              $checked = 'checked';
                           }
                           
                           ?>
                           <input type="checkbox" name="auto_refill" value="1" <?php echo $checked; ?> />
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
                           <img src="{{ asset('assets/app/images/mastercard_logo.0.png') }}" class="cardimgs"
                              style="width: 50px;"><br>
                           <img src="{{ asset('assets/app/images/americancard.jpg') }}" class="cardimgs"
                              style="width: 50px;height: 39px;">
                           <img src="{{ asset('assets/app/images/paypal2.png') }}" class="cardimgs"
                              style="width: 50px;height: 39px;">
                        </span>
                     </div>
                     <div class="col-lg-8 col-12">
                        <input type="text" class="form-control custom-file mb-2" name="card_no" id=""
                           placeholder="4155 3341 2298 9900" value="{{ !empty($checkUser['card_no'])?$checkUser['card_no']:(!empty($postData['card_no'])?$postData['card_no']:old('card_no')) }}">
                        <label class="error">{{ $errors->first('card_no') }}</label>
                        <div class="row">
                           <div class="col-lg-1 col-1">
                              <label for="" class="inline">Exp</label> &nbsp;
                           </div>
                           <div class="col-lg-3 col-3">
                              <?php

                              $selected_value = '';
                              if(!empty($checkUser['exp_from']) && (((int)$checkUser['exp_from']) > 0)){
                                 $selected_value = $checkUser['exp_from'];
                              }
                              elseif(!empty($postData['exp_from']) && (((int)$postData['exp_from']) > 0)){
                                 $selected_value = $postData['exp_from'];
                              }
                              
                              ?>                              
                              <select class="form-control select inline" name="exp_from" id="sel1" value="{{$checkUser?$checkUser['exp_from']:''}}">
                                 <!-- <option <?php echo ((int)$selected_value == 1)?'selected':''; ?>>1</option>
                                 <option <?php echo ((int)$selected_value == 2)?'selected':''; ?>>2</option>
                                 <option <?php echo ((int)$selected_value == 3)?'selected':''; ?>>3</option>
                                 <option <?php echo ((int)$selected_value == 4)?'selected':''; ?>>4</option> -->
                                 <?php
                                 for($i = 1; $i <= 12; $i++){
                                 ?>
                                 <option <?php echo ((int)$selected_value == $i)?'selected':''; ?>><?php echo $i; ?></option>
                                 <?php
                                 }
                                 ?>
                              </select>
                              <label class="error">{{ $errors->first('exp_from') }}</label>
                           </div>
                           <div class="col-lg-3 col-3">
                              <?php

                              $selected_value = '';
                              if(!empty($checkUser['exp_to']) && (((int)$checkUser['exp_to']) > 0)){
                                 $selected_value = $checkUser['exp_to'];
                              }
                              elseif(!empty($postData['exp_to']) && (((int)$postData['exp_to']) > 0)){
                                 $selected_value = $postData['exp_to'];
                              }
                              
                              ?>                               
                              <select class="form-control select inline " name="exp_to" id="sel1" value="{{$checkUser?$checkUser['exp_to']:''}}">
                                 <!--<option>25</option>
                                 <option>26</option>
                                 <option>27</option>
                                 <option>28</option>-->
                                 <?php
                                 for($i = (date('y') - 10); $i <= (date('y') + 20); $i++){
                                 ?>
                                 <option <?php echo ((int)$selected_value == $i)?'selected':''; ?>><?php echo $i; ?></option>
                                 <?php
                                 }
                                 ?>
                              </select>
                              <label class="error">{{ $errors->first('exp_to') }}</label>                              
                              &nbsp;
                           </div>
                           <div class="col-lg-2 col-2">
                              <label class="inline">CCV </label>
                           </div>
                           <div class="col-lg-3 col-3">
                              <input type="text" class="form-control custom-file inline" name="ccv_no" id=""
                                 placeholder="123" value="{{ !empty($checkUser['ccv_no'])?$checkUser['ccv_no']:(!empty($postData['ccv_no'])?$postData['ccv_no']:old('ccv_no')) }}">
                              <label class="error">{{ $errors->first('ccv_no') }}</label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <br><br><br>
                  <div class="row d-flex">
                     <div class="col-lg-12 col-12 text-left">
                        <label class="switch">
                           <?php

                           $checked = '';
                           if(!empty($checkUser['offline_invoice']) && ((int)$checkUser['offline_invoice']) > 0){
                              $checked = 'checked';
                           }
                           elseif(!empty($postData['offline_invoice']) && ((int)$postData['offline_invoice']) > 0){
                              $checked = 'checked';
                           }
                           
                           ?>                           
                           <input type="checkbox" name="offline_invoice" value="1" <?php echo $checked; ?> />
                           <span class="slider round"> </span>
                        </label> &nbsp; Offline Invoice
                     </div>
                     <label class="error">{{ $errors->first('offline_invoice') }}</label>
                  </div>
                  <br>
                  <div class="row d-flex">
                     <div class="col-lg-3 col-6 text-left">
                        <span class="inline">Upload your logo</span>
                     </div>
                     <div class="col-lg-7 col-12">
                        <div class="custom-file inline float-right mb-3">
                           <input type="file" class="custom-file-input" id="customFile" name="file">
                           <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                     </div>
                  </div>
                  <br>
                  <div class="row d-flex">
                     <div class="col-lg-3 col-6">
                        <label class="inline"> No. of JayPad Users </label>
                     </div>
                     <div class="col-lg-2 col-6">
                        <input type="text"   name="jaypad_users" class="form-control custom-file inline" id="" placeholder="125" value="{{ !empty($checkUser['jaypad_users'])?$checkUser['jaypad_users']:(!empty($postData['jaypad_users'])?$postData['jaypad_users']:old('jaypad_users')) }}">
                        <label class="error">{{ $errors->first('jaypad_users') }}</label>
                     </div>
                  </div>
                  <br>
                  <div class="row d-flex">
                     <div class="col-lg-3 col-6">
                        <label class="inline">No. of JayMobile Users</label>
                     </div>
                     <div class="col-lg-2 col-6">
                        <input type="text" name="jaymobile_users" class="form-control custom-file inline" id="" placeholder="125" value="{{ !empty($checkUser['jaymobile_users'])?$checkUser['jaymobile_users']:(!empty($postData['jaymobile_users'])?$postData['jaymobile_users']:old('jaymobile_users')) }}">&nbsp;&nbsp;
                        <label class="error">{{ $errors->first('jaymobile_users') }}</label>
                     </div>
                  </div>
                  <br>
                  <?php

                  $checked = '';
                  if(!empty($checkUser['flightdeck_login']) && (((int)$checkUser['flightdeck_login']) > 0)){
                     $checked = 'checked';
                  }
                  elseif(!empty($postData['flightdeck_login']) && (((int)$postData['flightdeck_login']) > 0)){
                     $checked = 'checked';
                  }
                  
                  ?>                  
                  <label class="containercheckmark">
                     <input type="checkbox" class="form-control" value="1" <?php echo $checked; ?>>
                     <span class="checkmark"></span>
                     <span>I have a FlightDeck account</span>
                  </label>
                  <br>
                  <div class="row">
                     <div class="col-sm-2">
                        <label class="inline" style="white-space: nowrap;">FlightDeck Login
                        </label>
                     </div>
                     <div class="col-sm-10">
                        <input type="text" name="flightdeck_login" class="form-control custom-file float-right" id=""
                           placeholder="Sue@sunnysideurbanmanor.com" value="{{ !empty($checkUser['flightdeck_login'])?$checkUser['flightdeck_login']:(!empty($postData['flightdeck_login'])?$postData['flightdeck_login']:old('flightdeck_login')) }}">
                        
                     </div>
                  </div>
                  <br>
                  <br>
                  <br>

                  <input type="submit" value="Save" class="submit">
               </form>



               <!-- <button class="submit">Save</button> -->
            </div>
         </div>
      </div>
   </div>
   <!-- <div class="container padding_top " style="display: none;">
      <div class="row d-flex ">
         <div class="col-lg-2 offset-lg-1 col-md-5 col-sm-5">
            <h4>Enterprise <br> Account</h4>
            <br>
            <h4 class="blue"> Classes <br> Overview</h4>
            <br>
         </div>
         <div class="col-lg-9 col-md-7 col-sm-7 text-sm-left text-center ">
            <div class="heading-title col-md-8 mb-3">
               <hr>
               <h4> &nbsp; &nbsp; <img src="{{ asset('assets/app/images/arrow.PNG') }}" alt="" width="25px"
                     height="25px">&nbsp; &nbsp; Classes
                  Overview
               </h4>
               <hr>
               <p><span class="blue">Enrolled Classes </span>&nbsp;&nbsp;&nbsp; Wish List</p>
               <br>
               <h2 class="text-center">You've 566 credits</h2>
               <br>
               <table class="table">
                  <thead>
                     <tr>
                        <th scope="col">Class No.</th>
                        <th scope="col">Class Name</th>
                        <th scope="col">Sign-Ups</th>
                        <th scope="col">Credit Used</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td class="blue">0348876</td>
                        <td class="blue">Disability Thrives</td>
                        <td class="blue">15</td>
                        <td class="blue">250</td>
                     </tr>
                     <tr>
                        <td>0348661</td>
                        <td>Gardening Homes</td>
                        <td>12</td>
                        <td>80</td>
                     </tr>
                     <tr>
                        <td>0348110</td>
                        <td>Travelling in Time</td>
                        <td>10</td>
                        <td>150</td>
                     </tr>
                     <tr>
                        <td>0348668</td>
                        <td>Happy Hour with Dee</td>
                        <td>8</td>
                        <td>141</td>
                     </tr>
                     <tr>
                        <td>0348222</td>
                        <td>One World One Love</td>
                        <td>13</td>
                        <td>132</td>
                     </tr>
                     <tr>
                        <td>0348441</td>
                        <td>Tea Master in Ceremony</td>
                        <td>11</td>
                        <td>112</td>
                     </tr>
                     <tr>
                        <td>0348752</td>
                        <td>Zumba for Begineers</td>
                        <td>12</td>
                        <td>90</td>
                     </tr>
                     <tr>
                        <td>0348757</td>
                        <td>Mexcio Travel Fun</td>
                        <td>12</td>
                        <td>45</td>
                     </tr>
                     <tr>
                        <td>0348300</td>
                        <td>Music With A Chair</td>
                        <td>10</td>
                        <td>66</td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div> -->
</section>
<br>
<br>
<br>
<br>
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