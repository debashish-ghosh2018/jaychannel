@extends('layouts.app_inner_page')

@section('content')
<!-- section -->
<section id="main-banner-page" class="position-relative page-header contact-header section-nav-smooth parallax" style="background-image: url(images/userbg.png); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; background-position: center -68.85px;height: 500px;
   display: none;">
   <div class="container">
      <div class="row1">
      </div>
   </div>
</section>
<!--Some Feature -->
<section id="our-feature" class="single-feature padding">
   <div style="background-image: url('{{ asset('assets/app/images/userbg.png') }}');background-repeat: no-repeat;height: 15vh;display: flex;align-items: center;background-attachment: fixed">
      <h2 class="padding content-padding">Checkout</h2>
   </div>
   <div class="container ">
      <br>
      <br>
      <div class="row d-flex ">
         <div class="col-lg-8 col-md-7 col-sm-7 text-sm-left text-center ">
            <div class="heading-title col-md-12 mb-3">
               <h4> Billing Information</h4>
               <br>
               <form action="#">
                  <div class="row mb-3">
                     <div class="col-lg-12 col-12">
                        <label>Name <span class="textred">*</span> </label>
                        <input type="text" class="form-control custom-file float-right" value="{{ $user->name }}" placeholder="Name">
                     </div>
                  </div>
                  <div class="row mb-3">
                     <div class="col-lg-6 col-12">
                        <label>Email <span class="textred">*</span> </label>
                        <input type="email" class="form-control custom-file float-right" value="{{ $user->email }}" placeholder="Email">
                     </div>
                     <div class="col-lg-6 col-12">
                        <label>Mobile <span class="textred">*</span></label>
                        <input type="number" class="form-control custom-file float-right" value="{{ $user->tel }}" placeholder="Mobile">
                     </div>
                  </div>
                  <div class="row mb-3">
                     <div class="col-lg-6 col-12">
                        <label>Address <span class="textred">*</span></label>
                        <input type="text" class="form-control custom-file float-right" value="{{ $user->address }}" placeholder="Address">
                     </div>
                     <div class="col-lg-6 col-12">
                        <label>Country <span class="textred">*</span></label>
                        <select class="form-control select inline " id="sel1">
                           <option>-- select one --</option>
                           <option>Pakistan</option>
                        </select>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <div class="col-lg-4 col-12">
                        <label>Town/City <span class="textred">*</span></label>
                        <input type="text" class="form-control custom-file float-right" placeholder="Town/City">
                     </div>
                     <div class="col-lg-4 col-12">
                        <label>State <span class="textred">*</span></label>
                        <input type="text" class="form-control custom-file float-right" placeholder="State">
                     </div>
                     <div class="col-lg-4 col-12">
                        <label>Postal/Zip <span class="textred">*</span></label>
                        <input type="number" class="form-control custom-file float-right" placeholder="Postal/Zip">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <label class="containercheckmark">
                        <input type="checkbox" class="form-control">
                        <span class="checkmark"></span>
                        <span>Create an account</span>
                        </label>
                     </div>
                  </div>
               </form>
               <br>
            </div>
         </div>
         <div class="col-lg-4">
            <h3>Your Order</h3>
            <hr>
            <span class="boldtxt">Course</span>
            <span class="text-right boldtxt">Total</span>
            <hr>
            @foreach ($cart_content as $item)
            <span class="lighttxt">
            {{ $item['course_title'] }} ({{ $item['cart_qty'] }} Participants)
            </span>
            <span class="text-right">{{ $item['cart_item_price'] }}</span>
            @endforeach
            <hr>
            <span class="boldtxt">Subtotal</span>
            <span class="text-right boldtxt">{{ $total_price }}</span>
            <hr>
            <span class=" boldtxt">Total</span>
            <span class="text-right boldtxt">{{ $total_price }}</span>
            <br>
            <br>
            <!--<input type="radio" id="Paypal" name="paypal" value="Paypal">
            <label for="Paypal">Paypal</label><br><br>
            <input type="radio" id="Stripe" name="stripe" value="Stripe">
            <label for="Stripe">Stripe</label><br><br>
            <input type="radio" id="PayU" name="PayU" value="PayU">
            <label for="PayU">PayU</label><br><br>-->
            <button class="submit btnorder">Place Order</button>
         </div>
      </div>
   </div>
</section>
@endsection


@section('scripts')
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
  window.onclick = function(event) {
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

@section('styles')
<style>

</style>
@endsection