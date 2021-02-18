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
                  <?php
                  foreach($courses as $course){
                    $user_details = $course->OwnerInfo()->get();
                  ?>
                  <div class="card item" style="height: auto;width:18rem;">
                     <a href="{{ route('view_course_details') }}/{{ $course->id }}" target="blank"><img class="card-img-top" src="<?php echo config('app.url').'/storage/app/course_browser_image/'.$course->browser_image_2; ?>" alt="<?php echo $course->title; ?>"></a>
                     <div class="card-body">
                        <a href="{{ route('view_course_details') }}/{{ $course->id }}" target="blank"><h5 class="mb-2 slidertextspace"><?php echo $course->title; ?></h5></a>
                        <h6 class="lightcolor mb-2"><?php echo $user_details[0]->enterprise_name; ?></h6>
                        <h6 class="mb-2">
                           <span class="checked">4.6</span> &nbsp;
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span> &nbsp;
                           <span class="lightcolor">(24)</span>
                        </h6>
                        <h4 class=" mb-2" style="font-size: 14px;"><?php echo $course->credits; ?> Credits
                           <!--<span class="lightcolor txtlinethrough"><a href="#"> $12.99</a></span>-->
                        </h4>
                        <a href="#" class="btn btnseller">Bestseller</a>
                     </div>
                  </div>
                  <?php
                  }
                  ?>
                  <!--<div class="card item" style="height: auto;width:18rem;">
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
                  </div>-->
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
<script>
    // duration of scroll animation
    var scrollDuration = 300;

    // paddles
    var leftPaddle = document.getElementsByClassName('left-paddle');
    var rightPaddle = document.getElementsByClassName('right-paddle');

    // get items dimensions
    var itemsLength = $('.item').length;
    var itemSize = $('.item').outerWidth(true);

    // get some relevant size for the paddle triggering point
    var paddleMargin = 20;

    // get wrapper width
    var getMenuWrapperSize = function () {
        return $('.menu-wrapper').outerWidth();
    }
    var menuWrapperSize = getMenuWrapperSize();
    // the wrapper is responsive
    $(window).on('resize', function () {
        menuWrapperSize = getMenuWrapperSize();
    });
    // size of the visible part of the menu is equal as the wrapper size 
    var menuVisibleSize = menuWrapperSize;

    // get total width of all menu items
    var getMenuSize = function () {
        return itemsLength * itemSize;
    };
    var menuSize = getMenuSize();

    // get how much of menu is invisible
    var menuInvisibleSize = menuSize - menuWrapperSize;

    // get how much have we scrolled to the left
    var getMenuPosition = function () {
        return $('.menu').scrollLeft();
    };

    // finally, what happens when we are actually scrolling the menu
    $('.menu').on('scroll', function () {
        // get how much of menu is invisible
        menuInvisibleSize = menuSize - menuWrapperSize;

        // get how much have we scrolled so far
        var menuPosition = getMenuPosition();
        var menuEndOffset = menuInvisibleSize - paddleMargin;

        // show & hide the paddles 
        // depending on scroll position
        if (menuPosition <= paddleMargin) {
            $(leftPaddle).addClass('hidden');
            $(rightPaddle).removeClass('hidden');
        } else if (menuPosition < menuEndOffset) {
            // show both paddles in the middle
            $(leftPaddle).removeClass('hidden');
            $(rightPaddle).removeClass('hidden');
        } else if (menuPosition >= menuEndOffset) {
            $(leftPaddle).removeClass('hidden');
            $(rightPaddle).addClass('hidden');
        }

        // print important values
        $('#print-wrapper-size span').text(menuWrapperSize);
        $('#print-menu-size span').text(menuSize);
        $('#print-menu-invisible-size span').text(menuInvisibleSize);
        $('#print-menu-position span').text(menuPosition);
    });

    // scroll to left
    $(rightPaddle).on('click', function () {
        $('.menu').animate({ scrollLeft: menuInvisibleSize }, scrollDuration);
    });

    // scroll to right
    $(leftPaddle).on('click', function () {
        $('.menu').animate({ scrollLeft: '0' }, scrollDuration);
    });
</script>
@endsection

@section('styles')
<style>
  .menu-wrapper {
    position: relative;
    max-width: 100%;
    height: max-content;
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
    height: 350px;
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
    position: relative;
    top: 0;
    bottom: 0;
    width: 4em;
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