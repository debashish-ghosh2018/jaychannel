@extends('layouts.app_inner_page')

@section('content')
<!-- section -->
<br><br><br><br><br>
<section id="main-banner-page" class="position-relative page-header contact-header section-nav-smooth parallax"
   style="display:none;background-image: url('{{ asset('assets/app/images/vendorbg.png') }}'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; background-position: center -68.85px; height: 500px;">
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
         <div class="col-sm-8" style="align-self: center;">
            <h2 class="padding content-padding">
               Welcome back,EasterSeals!
         </div>
         <div class="col-sm-4">
         <!--<img src="{{ asset('assets/app/images/easter-logo.jpg') }}" alt="EasterSeals" style="width: 50%;
            position: relative;" />-->
         @if ($user_info->logo != '')
         <img src="{{ config('app.url') }}/storage/app/{{ $vendor_logo_upload_path }}/{{ $user_info->logo }}" alt="EasterSeals" style="width: 50%; position: relative;"/>
         @endif            
         </div>
      </div>
      </h2>
      <br>
      <div class="row d-flex ">
         <div class="col-lg-2 offset-lg-1 col-md-5 col-sm-5" >
            <h4><a href="{{ route('show_signinvendor_dashboard') }}">Account</a></h4>
            <br>
            <h4><span class="blue"><a href="#">Manage <br> Classes</a></span></h4>
            <br>
            <!-- <h4><span class="blue">Manage <br> Classes</span></h4> <br> -->
            <!-- <h4>leads</h4> <br> -->
            <a href="{{ route('show_signinvendor_finance') }}">Finance</a>
         </div>
         <div class="col-lg-9 col-md-7 col-sm-7 text-sm-left text-center " >
            <div class="heading-title col-md-12 mb-3">
               <h4> &nbsp; &nbsp; <img src="{{ asset('assets/app/images/arrow.PNG') }}" alt="" width="25px" height="25px">&nbsp; &nbsp; Manage
                  Classes
               </h4>
               <!-- <hr> -->
               <br>
               <div class="row">
                  <div class="col-lg-8 col-12 text-center">
                     <p> &nbsp;&nbsp; &nbsp;&nbsp;
                        <a href="{{ route('show_signinvendor_createcourse') }}">New Class</a><!-- &nbsp;&nbsp;&nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp;<span class="blue"> <a href="#">Edit Classes</a>--></span>
                     </p>
                  </div>
               </div>
               <br>
               <table class="table">
                  <thead>
                     <tr>
                        <th scope="col" style="color: black;">Class No.</th>
                        <th scope="col" style="color: black;">Class Name</th>
                        <th scope="col" style="color: black;">Sign-Ups</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($user_course_info as $course)
                     <tr>
                        <td class="blue"><a href="{{ route('show_signinvendor_editcourse') }}/{{ $course->id }}">{{ $course->id }}</a></td>
                        <td class="blue"><a href="{{ route('show_signinvendor_editcourse') }}/{{ $course->id }}">{{ $course->title }}</a></td>
                        <td>{{ $course->signut_cnt }}</td>
                     </tr>
                     @endforeach
                     <!--<tr>
                        <td class="blue">0348876</td>
                        <td class="blue">Disability Thrives</td>
                        <td class="blue">15</td>
                     </tr>                     
                     <tr>
                        <td>0348661</td>
                        <td>Gardening Homes</td>
                        <td>12</td>
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
                     </tr>-->
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   <!--  -->
   <div class="container padding_top " style="display: none;">
      <div class="row d-flex ">
         <div class="col-lg-2 offset-lg-1 col-md-5 col-sm-5 " >
            <h4>Account</h4>
            <br>
            <h4>Manage <br> Classes</h4>
            <br>
            <h4><span class="blue"><a href="{{ route('show_signinvendor_finance') }}">Finance</a></span></h4>
            <br>
         </div>
         <div class="col-lg-9 col-md-7 col-sm-7 text-sm-left text-center " >
            <div class="heading-title col-md-8 mb-3">
               <h4> &nbsp; &nbsp; <img src="{{ asset('assets/app/images/arrow.PNG') }}" alt="" width="25px" height="25px">&nbsp; &nbsp; Finance
               </h4>
               <br>
               <table class="table">
                  <thead>
                     <tr>
                        <th scope="col">Issue No.</th>
                        <th scope="col">Month</th>
                        <th scope="col">Income</th>
                        <th scope="col">Deposit</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td class="blue">0348876</td>
                        <td class="blue">Nov 2020 </td>
                        <td class="blue">5,400</td>
                        <td class="blue">Pending</td>
                     </tr>
                     <tr>
                        <td>0348661</td>
                        <td> Oct 2020</td>
                        <td>6,880</td>
                        <td>Done</td>
                     </tr>
                     <tr>
                        <td>0348110</td>
                        <td> Sep 2020</td>
                        <td>8,990</td>
                        <td>Done</td>
                     </tr>
                     <tr>
                        <td>0348668</td>
                        <td>Aug 2020</td>
                        <td>10,765</td>
                        <td>Done</td>
                     </tr>
                     <tr>
                        <td>0348222</td>
                        <td>July 2020</td>
                        <td>6,995</td>
                        <td>Done</td>
                     </tr>
                     <tr>
                        <td>0348441</td>
                        <td>June 2020</td>
                        <td>8,890</td>
                        <td>Done</td>
                     </tr>
                     <tr>
                        <td>0348752</td>
                        <td>May 2020</td>
                        <td>12,770</td>
                        <td>Done</td>
                     </tr>
                     <tr>
                        <td>0348757</td>
                        <td>Apr</td>
                        <td>15,005</td>
                        <td>Done</td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</section>
<section style="display:none;">
   <div class="container padding_top text-center">
      <h3>Hey EasterSeals Southern California,
         <br>
         You've successfully added a new class!
      </h3>
      <br><br>
      <h3>The Class No. is: <br> 0348876</h3>
   </div>
</section>
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