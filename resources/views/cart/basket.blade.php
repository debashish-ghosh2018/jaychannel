@extends('layouts.app_inner_page')

@section('content')
<!-- section -->
<br><br><br><br><br>
<section id="main-banner-page" class="position-relative page-header contact-header section-nav-smooth parallax" style="background:#414042; background-size: cover; background-repeat: no-repeat;background-attachment: fixed; background-position: center -68.85px;height: 150px;">
   <div class="container" style="padding: 20px;">
      <div class="row">
         <div class="col-lg-8 col-12">
            <div class="container" style="    padding: 21px;">
               <h5 class="text-light"> <span><i class="fa fa-home"></i></span> / Shopping Cart</h5>
               <h2 class="text-light">Shopping Cart</h2>
            </div>
         </div>
      </div>
   </div>
</section>
<!--Some Feature -->
<section id="our-feature" class="single-feature padding">
   <div class="container ">
      <br>
      <br>
      <div class="row d-flex ">
         <div class="col-lg-9 col-md-7 col-sm-7 text-sm-left text-center ">
            <div class="heading-title col-md-12 mb-3">
               <h4 class="lightcolor">&nbsp; {{ $cartCount ?? '0' }} Course in Cart</h4>
               <br>
               <div class="container borderdiv">

                  @if (\Cart::isEmpty())
                    <p class="alert alert-warning">Your shopping cart is empty.</p>
                  @else
                    @foreach($cart_content as $item)
                  <div class="row">
                     <div class="col-lg-2">
                        <img src="{{ config('app.url') }}/storage/app/{{ $item['image'] }}" class="imgwidth" />
                     </div>
                     <div class="col-lg-6">
                        <h4 class="blackcolor">{{ $item['title'] }}</h4>
                        <h6 class="lightcolor">By {{ $item['details'] }}
                        </h6>
                     </div>
                     <div class="col-lg-2">
                        <h6 class="mb-1 mt-1"><span class="blue "><a href="{{ route('checkout.cart.remove', $item['cart_item_id']) }}">Remove</a></span></h6>
                        <h6><span class="blue"><a href="#">Save for Later</a></span></h6>
                        <br>
                     </div>
                     <div class="col-lg-2">
                        <h6 class="mb-1 mt-1"><span class="textred "><a href="#">{{ $item['cart_qty'] }}</a> {{ $item['qty_unit'] }}</span></h6>
                        <h6 class="txtlinethrough_none"><span class="lightcolor">{{ $currency_symbol }} <a href="#">{{ $item['cart_item_price'] }}</a> {{ $item['price_unit'] }}</span>
                        </h6>
                        <br>
                     </div>
                  </div>
                    @endforeach
                  @endif

               </div>
               <br>
               <h4 class=" mb-2">&nbsp; Saved for later</h4>
               <h6 class="lightcolor">&nbsp; You haven't saved any courses for later</h6>
               <br>
            </div>
         </div>
         <div class="col-lg-3">
            <h6 class="lightcolor mb-2">Total</h6>
            <h2 class="blackcolor boldtxt mb-1">{{ $currency_symbol }} {{ $total_price }} </h2><span class="lightcolor">{{ $total_unit }}</span>
            <!--<h6 class="txtlinethrough mb-1"><span class="lightcolor"><a href="#">{{ $total_price }}</a></span></h6>
            <h6 class="mb-3"><span class="lightcolor"><a href="#">90% off</a></span></h6>-->
            <button class="submit btncheckout mb-3"><a href="{{ route('checkout.cart') }}">Checkout</a></button>
            <a href="{{ route('checkout.cart.clear') }}" class="btn btn-danger btn-block mb-4">Clear Cart</a>
            <!--<div class="input-group mb-3">
               <input type="text" class="form-control" placeholder="Enter Coupen" aria-label="Enter Coupen"
                  aria-describedby="basic-addon2">
               <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2" style="background: #0b66f2;
                     color: white;">Apply</span>
               </div>
            </div>
            <h6 class="blackcolor boldtxt"><span class="blue" style="font-size: 18px;"><a href="#">x</a></span>&nbsp; 2020ROW30 <span class="lightcolor lighttxt">is applied</span></h6>-->
            <br>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-10">
            <h4 class=" ">&nbsp; &nbsp;&nbsp;&nbsp; You might also like</h4>
         </div>
      </div>
      <div class="row ">
         <div class="col-lg-12">
            <div class="menu-wrapper">
               <button class="left-paddle paddle hidden">
               <span class="spanpadles">
               <i class='fa fa-angle-left'></i>
               </span> </button>
               <div class="menu">
                  <div class="card item" style="height: auto;width:18rem;">
                     <img class="card-img-top" src="{{ asset('assets/app/images/enterprisebg.PNG') }}" alt="Card image cap">
                     <div class="card-body">
                        <h5 class="mb-2 slidertextspace">2021 Complete Phython Bootcamp From Zero to
                           Hero in Phython
                        </h5>
                        <h6 class="lightcolor mb-2">Jose Portilla</h6>
                        <h6 class="mb-2">
                           <span class="checked">4.6</span> &nbsp;
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span> &nbsp;
                           <span class="lightcolor">(324,321)</span>
                        </h6>
                        <h4 class=" mb-2">$12.99
                           <span class="lightcolor txtlinethrough"><a href="#"> $12.99</a></span>
                        </h4>
                        <a href="#" class="btn btnseller">Bestseller</a>
                     </div>
                  </div>
                  <div class="card item" style="height: auto;width:18rem;">
                     <img class="card-img-top" src="{{ asset('assets/app/images/enterprisebg.PNG') }}" alt="Card image cap">
                     <div class="card-body">
                        <h5 class="mb-2 slidertextspace">2021 Complete Phython Bootcamp From Zero to
                           Hero in Phython
                        </h5>
                        <h6 class="lightcolor mb-2">Jose Portilla</h6>
                        <h6 class="mb-2">
                           <span class="checked">4.6</span> &nbsp;
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span> &nbsp;
                           <span class="lightcolor">(324,321)</span>
                        </h6>
                        <h4 class=" mb-2">$12.99
                           <span class="lightcolor txtlinethrough"><a href="#"> $12.99</a></span>
                        </h4>
                        <a href="#" class="btn btnseller">Bestseller</a>
                     </div>
                  </div>
                  <div class="card item" style="height: auto;width:18rem;">
                     <img class="card-img-top" src="{{ asset('assets/app/images/enterprisebg.PNG') }}" alt="Card image cap">
                     <div class="card-body">
                        <h5 class="mb-2 slidertextspace">2021 Complete Phython Bootcamp From Zero to
                           Hero in Phython
                        </h5>
                        <h6 class="lightcolor mb-2">Jose Portilla</h6>
                        <h6 class="mb-2">
                           <span class="checked">4.6</span> &nbsp;
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span> &nbsp;
                           <span class="lightcolor">(324,321)</span>
                        </h6>
                        <h4 class=" mb-2">$12.99
                           <span class="lightcolor txtlinethrough"><a href="#"> $12.99</a></span>
                        </h4>
                        <a href="#" class="btn btnseller">Bestseller</a>
                     </div>
                  </div>
                  <div class="card item" style="height: auto;width:18rem;">
                     <img class="card-img-top" src="{{ asset('assets/app/images/enterprisebg.PNG') }}" alt="Card image cap">
                     <div class="card-body">
                        <h5 class="mb-2 slidertextspace">2021 Complete Phython Bootcamp From Zero to
                           Hero in Phython
                        </h5>
                        <h6 class="lightcolor mb-2">Jose Portilla</h6>
                        <h6 class="mb-2">
                           <span class="checked">4.6</span> &nbsp;
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span> &nbsp;
                           <span class="lightcolor">(324,321)</span>
                        </h6>
                        <h4 class=" mb-2">$12.99
                           <span class="lightcolor txtlinethrough"><a href="#"> $12.99</a></span>
                        </h4>
                        <a href="#" class="btn btnseller">Bestseller</a>
                     </div>
                  </div>
               </div>
               <!-- <div class="paddles"> -->
               <button class="right-paddle paddle">
               <span class="spanpadles">
               <i class='fa fa-angle-right'></i>
               </span>
               </button>
               <!-- </div> -->
            </div>
         </div>
      </div>
   </div>
</section>
<br>
<br>
<br>
<br>
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
  .menu-wrapper {
    position: relative;
    max-width: 100%;
    height: 322px;
    /* height: 100px; */
    margin: 1em auto;
    /* border: 1px solid black; */
    overflow-x: hidden;
    overflow-y: hidden;
    display: flex;
    justify-content: center;
  }
  .menu {
    /* height: 120px; */
    /* background: #f3f3f3; */
    box-sizing: border-box;
    height: 340px;
    white-space: nowrap;
    /* overflow-x: auto; */
    overflow-x: auto;
    overflow-y: hidden;
    -webkit-overflow-scrolling: touch;
    width: 96%;
  }
  .item {
    display: inline-block;
    width: 100px;
    height: 100%;
    /* padding: 1em; */
    margin: 10px;
    box-sizing: border-box;
  }
  .paddles {}

  .paddle {
    position: absolute;
    top: 0;
    bottom: 0;
    width: 3em;
    background: none;
  }
  .left-paddle {
    left: 0;
    z-index: 9;
  }
  .right-paddle {
    right: 0;
  }
  .hidden {
    display: none;
  }
  .print {
    margin: auto;
    max-width: 500px;
  }
  .print span {
    display: inline-block;
    width: 100px;
  }
  .card {
    border: none;
  }
  .card-body {
    background: white;
    padding: 11px 1px
  }
  .btnseller {
    background-color: #ffe799;
    color: #593d00;
    padding: 1px 10px;
  }
  .slidertextspace {
    white-space: normal;
  }
  .spanpadles{
    background: white;
    font-size: 22px;
    font-weight: bold;
    color: #0b66f2;
    border-radius: 20px;
    box-shadow: 1px 1px 5px 0px #b5b5b5;
    padding: 0px 14px;
  }
</style>
@endsection