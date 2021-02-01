@extends('layouts.app_inner_page')

@section('content')
<!-- section -->
<br><br><br><br><br>
<section id="main-banner-page" class="position-relative page-header contact-header section-nav-smooth parallax" style="display:none;background-image: url('{{ asset('assets/app/images/vendorbg.png') }}'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; background-position: center -68.85px; height: 500px;">
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
      <h2 class="padding content-padding">Welcome back, {{ $user_info->enterprise_name }}!</h2>
      <br>
   </div>
   <!--  -->
   <div class="container ">
      <div class="row d-flex ">
         <div class="col-lg-2 offset-lg-1 col-md-5 col-sm-5 " >
            <h4><a href="{{ route('show_signinvendor_dashboard') }}">Account</a></h4>
            <br>
            <h4><a href="{{ route('show_signinvendor_manageclasses') }}">Manage <br> Classes</a></h4>
            <br>
            <h4><span class="blue">  <a href="#">
               Finance
               </a></span>
            </h4>
            <br>
         </div>
         <div class="col-lg-9 col-md-7 col-sm-7 text-sm-left text-center " >
            <div class="heading-title col-md-8 mb-3">
               <h4> &nbsp; &nbsp; <img  src="{{ asset('assets/app/images/arrow.PNG') }}" alt="" width="25px" height="25px">&nbsp; &nbsp; Finance</h4>
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
                    @foreach ($orders as $order)
                     <tr >
                        <td class="blue">{{ $order->booking_no }}</td>
                        <td class="blue"><?php echo date("M Y", strtotime($order->created_at)); ?></td>
                        <td class="blue">{{ $order->credit_used }}</td>
                        <td class="blue">Completed</td>
                     </tr>
                    @endforeach
                     <!--<tr>
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
                     </tr>-->
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</section>
<!--<section>
   <div class="container padding_top text-center">
      <h3>Hey EasterSeals Southern California,
         <br>
         You've successfully added a new class!
      </h3>
      <br><br>
      <h3>The Class No. is: <br> 0348876</h3>
   </div>
</section>-->
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