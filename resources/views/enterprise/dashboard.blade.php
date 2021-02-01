@extends('layouts.app_inner_page')

@section('content')
<!-- section -->
<br><br><br><br><br>
<section id="main-banner-page" class="position-relative page-header contact-header section-nav-smooth parallax" style="background-image: url('{{ asset('assets/app/images/vendorbg.png') }}'); background-size: cover; background-repeat: no-repeat; 
   background-attachment: fixed; background-position: center -68.85px; height: 500px;display: none;">
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
      <h2 class="padding content-padding">Welcome back, {{$you['name']}}</h2>
      <br>
  
      <div class="row d-flex ">
         <div class="col-lg-2 offset-lg-1 col-md-5 col-sm-5 " >
            <h4><a href="{{ route('show_enterprise_account') }}">JayChannel <br> Account</a></h4>
            <br>
            <h4><span class="blue"><a href="#">Classes <br> Overview</a></span></h4>
            <br>
            <!-- <h4>leads</h4> <br> -->
            <h4>Jaypad<br>Subscriptions</h4>
            <br>
         </div>
         <div class="col-lg-9 col-md-7 col-sm-7 text-sm-left text-center " >
            <div class="heading-title col-md-10 mb-3">
               <h4> &nbsp; &nbsp; <img src="{{ asset('assets/app/images/arrow.PNG') }}" alt="" width="25px" height="25px">&nbsp; &nbsp;
                  Classes Overview
               </h4>
               <br>
               <div class="row">
                  <div class="col-1"></div>
                  <div class="col-lg-8 col-12 text-center">
                     <p class="mb-4"> <span class="blue">Enrolled Classes </span>&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Wish
                        List
                     </p>
                     <h2 class="text-center">You've {{$creditsAvailable}} credits</h2>
                     <br>
                  </div>
               </div>
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
                  @foreach($classBookedDetails as $class_details)
                     <tr>
                        <td class="blue">{{ $class_details->course_id }}</td>
                        <td class="blue">{{ $class_details->title }}</td>
                        <td class="blue text-center">{{ $class_details->registered_participants }}</td>
                        <td class="blue text-center">{{$class_details->credit_used}} </td>
                        <!-- <td class="blue text-center">250</td> -->
                        <td >Cancel</td>
                     </tr>
                     @endforeach
                   
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