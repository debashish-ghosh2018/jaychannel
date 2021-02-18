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
      <h2 class="padding content-padding">Welcome back, {{ $you['name'] }}</h2>
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
                  <!--<div class="col-1"></div>-->
                  <div class="col-lg-12 col-12 text-center">
                     <!--<p class="mb-4"> <span class="blue">Enrolled Classes </span>&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Wish
                        List
                     </p>-->
                     <h2 class="text-center">You've {{$creditsAvailable}} credits</h2>
                     <br>

                     <ul class="nav nav-tabs" id="myTab" role="tablist">
                       <li class="nav-item">
                         <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Enrolled classes</a>
                       </li>
                       <li class="nav-item">
                         <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Wish List</a>
                       </li>
                     </ul>
                     <div class="tab-content" id="myTabContent">
                       <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

               <br/>
               <table class="table">
                  <thead>
                     <tr>
                        <th scope="col">Class No.</th>
                        <th scope="col">Class Name</th>
                        <th scope="col">Sign-Ups</th>
                        <th scope="col">Credit Used</th>                        
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>   
                  <?php              
                  foreach($classBookedDetails as $class_booked){

                     $booked_courses = $class_booked->bookedCourses()->get();
                     if(count($booked_courses) > 0){
                        foreach($booked_courses as $course_booked){
                           $course_details = $course_booked->Course()->get();
                  ?>
                  <tr>
                     <td class="blue">{{ $class_booked->booking_no }}</td>
                     <td class="blue">{{ $course_details[0]->title }}</td>
                     <td class="blue text-center">{{ ($course_booked->registered_participants - $course_booked->canceled_participants) }}</td>
                     <td class="blue text-center">{{ ($class_booked->credit_used - $class_booked->credit_returned) }}</td>
                     <td class="blue text-center"><a href="#" onclick="return cancel_class_participants(<?php echo $course_booked->class_booking_id; ?>,<?php echo $course_booked->course_id; ?>,'<?php echo $class_booked->booking_no; ?>',<?php echo ($course_booked->registered_participants - $course_booked->canceled_participants); ?>);">Cancel</a></td>
                  </tr>
                  <?php
                        }
                     }
                  }
                  ?>
                  </tbody>
               </table>

                       </div>
                       <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

               <br/>
               <table class="table">
                  <thead>
                     <tr>
                        <th scope="col">Course Name</th>
                        <th scope="col">Vendor Name & Location</th>
                        <th scope="col">Credit Require</th>                        
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>   
                  <?php              
                  foreach($myWishlist as $item){
                     $course_detail = $item->Course()->get();
                     $user_details = $course_details[0]->OwnerInfo()->get();
                  ?>
                  <tr>
                     <td class="blue"><a href="{{ route('view_course_details') }}/{{ $course_details[0]->id }}" target="blank">{{ $course_details[0]->title }}</a></td>
                     <td class="text-center" style="color: black;">{{ $user_details[0]->enterprise_name }}, {{ $user_details[0]->location }}</td>
                     <td class="text-center" style="color: black;">{{ $course_details[0]->credits }}</td>
                  </tr>
                  <?php
                  }
                  ?>
                  </tbody>
               </table>

                       </div>
                     </div>

                  </div>
               </div>
               <!-- <br> -->

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

 <!-- Modal -->
<div class="modal fade" id="cancelClassParticipants" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Class Cancellation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>How many participants do you want to cancel for ?:&nbsp;&nbsp;
          <select name="fldSelectParticipants" id="fldSelectParticipants">
          </select>
        </p>
        <input type="hidden" name="fldClassId" id="fldClassId" value="" />
        <input type="hidden" name="fldOrderId" id="fldOrderId" value="" />
        <input type="hidden" name="fldCurentParticipants" id="fldCurentParticipants" value="" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCloseWindow">Close</button>
        <button type="button" class="btn btn-primary" id="btnSaveChanges">Save & Close</button>
      </div>
    </div>
  </div>
</div>  
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

   function cancel_class_participants(order_id, class_id, class_booking_no, current_participants){
      var decision = confirm('Are you sure that you want to cancel the class of No. ' + class_booking_no + ' ?');

      if(decision){
         for(var index = 1; index <= current_participants; index++){
            $('#fldSelectParticipants').append(new Option(index, index))
         }
         $('#fldClassId').val(class_id);
         $('#fldOrderId').val(order_id);
         $('#fldCurentParticipants').val(current_participants);

         $('#cancelClassParticipants').modal('toggle');
      }

      return decision;
   }

   $( "#btnSaveChanges" ).click(function() {
      $.ajax({
         method: "POST",
         url: "{{ route('cancel_course') }}",
         data: { _token: "{{ csrf_token() }}", course_id: $('#fldClassId').val(), order_id: $('#fldOrderId').val(), current_participants: $('#fldCurentParticipants').val(), select_participants: $('#fldSelectParticipants').val() },
         dataType: 'json',
      })
      .done(function( msg ) {
         console.log( "Data Saved: " + msg );
         if(msg.message == 'success'){
            $('#cancelClassParticipants').modal('toggle');
            location.reload(); 
         }else{
            alert('Invalid data provided. Cannot cancel registered class.');
            location.reload(); 
         }
      });
   });    
</script>
@endsection

@section('styles')
<style>
#myTab .active, #myTabContent .active {
   background-color: transparent !important;
}
</style>
@endsection