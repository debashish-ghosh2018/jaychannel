@extends('layouts.app_inner_page')

@section('content')
<!-- WOrk Process-->
<section id="our-process" class="padding ">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-sm-12 ">
            <hr>
            <h4 class="inline"> &nbsp; <img src="{{ asset('assets/app/images/arrow.PNG') }}" alt="">&nbsp;&nbsp; Shop for Virtual
               Classes&nbsp;&nbsp; 
            </h4>
            <h4 class="inline lightcolor padd8">&nbsp;<img src="{{ asset('assets/app/images/explore.png') }}" alt=""> &nbsp;&nbsp; what
               kind of classes are you looking for?
            </h4>
            <hr>
         </div>
      </div>
   </div>
</section>
<!--WOrk Process ends-->
<!-- Services us -->
<section id="our-services" class="padding">
   <div class="container">
      <div id="services-filter" class="cbp-l-filters dark bottom30 wow fadeIn d-table mx-auto "
         data-wow-delay="350ms">
         <div data-filter="*" class="cbp-filter-item">
            <span>Group <br> Games</span>
         </div>
         @foreach ($content_types as $content_type)
         <div class="cbp-filter-item" style="width: 90px; vertical-align: top;">
            <span>{{ $content_type->name }}</span>
         </div>
         @endforeach         
         <!--<div data-filter=".arts" class="cbp-filter-item">
            <span class="blue">Arts & <br> Crafts</span>
         </div>
         <div data-filter=".jaquard-elastics-tapes" class="cbp-filter-item">
            <span>Food & <br> Diet</span>
         </div>
         <div data-filter=".lurex-elastics-tapes" class="cbp-filter-item">
            <span>Fitness & <br> Mindfullness</span>
         </div>
         <div data-filter=".cords-laces" class="cbp-filter-item">
            <span>Memory <br> Health</span>
         </div>
         <div data-filter=".rigid-tapes" class="cbp-filter-item">
            <span> Outdoor <br> &nbsp;</span>
         </div>
         <div data-filter=".woven-elastics-tapes" class="cbp-filter-item">
            <span>@Work <br> &nbsp;</span>
         </div>
         <div data-filter=".woven-elastics-tapes" class="cbp-filter-item">
            <span>Education & <br>Family</span>
         </div>-->
         <br>
         <div data-filter="*" class="cbp-filter-item">
            <a href="#" onclick="history.go(-1)"><span>Back</span></a>
         </div>
      </div>
      <div id="services-measonry" class="cbp">
         <div class="row">
         </div>
      </div>
   </div>
</section>
<section id="our-feature" class="single-feature padding">
   <div class="container">
      <div class="row d-flex ">
         <div class="col-lg-5 offset-lg-1 col-md-5 col-sm-5 ">
                    <div class="container mt-5">
                        <div class="carousel-container position-relative row">
                            <!-- Sorry! Lightbox doesn't work - yet. -->
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active" data-slide-number="0">
                                        <img src="{{ config('app.url') }}/storage/app/course_hero_image/{{ $course_data->hero_image }}" class="d-block w-100 carouselimg" alt="..." data-remote="" data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                    </div>
                                    <div class="carousel-item" data-slide-number="1">
                                        <img src="{{ config('app.url') }}/storage/app/course_browser_image/{{ $course_data->browser_image_1 }}" class="d-block w-100 carouselimg" alt="..." data-remote="" data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                    </div>
                                    <div class="carousel-item" data-slide-number="2">
                                        <img src="{{ config('app.url') }}/storage/app/course_browser_image/{{ $course_data->browser_image_2 }}" class="d-block w-100 carouselimg" alt="..." data-remote="" data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                    </div>
                                    <div class="carousel-item" data-slide-number="3">
                                        <video playsinline="playsinline" autoplay="autoplay"  muted="muted" loop="loop" style="width:100%;height: 35vh;">
                                            <source src="{{ config('app.url') }}/storage/app/course_video_clip/{{ $course_data->video_clip }}" class="d-block w-100 carouselimg"  type="video/mp4"  data-type="video" data-toggle="lightbox" data-gallery="example-gallery">
                                            Your browser does not support the video tag.
                                         </video>
                                    </div>
                                </div>
                            </div>
                            <!-- Carousel Navigation -->
                            <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="row mx-0">
                                            <div id="carousel-selector-0" class="thumb col-4 col-sm-4 px-1 py-2 selected" data-target="#myCarousel" data-slide-to="0">
                                                <img src="{{ config('app.url') }}/storage/app/course_hero_image/{{ $course_data->hero_image }}" class="img-fluid" alt="..." />
                                            </div>
                                            <div id="carousel-selector-1" class="thumb col-4 col-sm-4 px-1 py-2" data-target="#myCarousel" data-slide-to="1">
                                                <img src="{{ config('app.url') }}/storage/app/course_browser_image/{{ $course_data->browser_image_1 }}" class="img-fluid" alt="..." />
                                            </div>
                                            <div id="carousel-selector-2" class="thumb col-4 col-sm-4 px-1 py-2"
                                                data-target="#myCarousel" data-slide-to="2">
                                                <img src="{{ config('app.url') }}/storage/app/course_browser_image/{{ $course_data->browser_image_2 }}" class="img-fluid" alt="..." />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="row mx-0">
                                          <div id="carousel-selector-3" class="thumb col-4 col-sm-4 px-1 py-2" data-target="#myCarousel" data-slide-to="3">
                                            <img src="{{ config('app.url') }}/storage/app/course_hero_image/{{ $course_data->hero_image }}" class="img-fluid" alt="..." />
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                <a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="prev">
                                    <i class='fa fa-angle-left' aria-hidden="true" style="font-size: 30px;font-weight: bold;color: black;"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="next">
                                    <i class='fa fa-angle-right' aria-hidden="true" style="font-size: 30px;font-weight: bold;color: black;"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div> <!-- /row -->
                    </div>
                    <br>          
            <div class="image">
              @if ($owner_data->logo != '')
                <img src="{{ config('app.url') }}/storage/app/vendor_logo/{{ $owner_data->logo }}" style="width: 40%; position: relative;" />
              @endif              
            </div>
            <p style="padding-top: 20px;"><b>About the class</b>:
               <br><br>
               {{ $course_data->about_class }}
            </p>
            <p style="padding-top: 20px;"><b>Equipment requirement</b>:
               <br><br>
               {{ $course_data->equipment_require }}
            </p>            
            <p style="padding-top: 20px;">
               <b>Refund policy</b>: Refunds up to 24 hours before class starts
            </p>
         </div>
         <div class="col-lg-6 col-md-7 col-sm-7 text-sm-left text-center ">
            <div class="heading-title col-md-8 mb-3">
               <h3>{{ $course_data->title }} &nbsp; ({{ $course_data->id }})</h3>
               <br>
               <p>
                  By <span class="blue">{{ $owner_data->enterprise_name }} {{ $owner_data->location }}</span>
                  <br><br>
                  <span class="fa fa-star checked"></span> <span>(4.8)</span>
                  <br><br>
                  <!--Tu,Fr,Dec 12-Feb 5, 2021 <br> 11:00AM (EST)-->
                  <?php
            if($course_data->day_monday === 1){
                 echo 'Mo,';
            }

            if($course_data->day_tuesday === 1){
                 echo 'Tu,';
            }

            if($course_data->day_wednesday === 1){
                 echo 'We,';
            }

            if($course_data->day_thursday === 1){
                 echo 'Th,';
            }

            if($course_data->day_friday === 1){
                 echo 'Fr,';
            }

            if($course_data->day_saturday === 1){
                 echo 'Sa,';
            }                                    

            if($course_data->day_sunday === 1){
                 echo 'Su,';
            }

            echo date("M d", strtotime($course_data->start_date)).'-'.date("M d, Y ", strtotime($course_data->end_date)).date("g:i A ", strtotime($course_data->start_time)).'(EST)';
                  ?>
                  <br>
               <div class="row">
                  <div class="col-lg-4">
                    &nbsp; &nbsp;&nbsp;
                    @auth                    
                    <a href="#" onclick="add_item_to_user_wishlist({{ $course_data->id }});">
                      <i style="font-size:24px;color: black;" class="fa">&#xf004;</i>
                      <br>Wish List
                    </a>
                    @endauth
                    &nbsp;
                  </div>
                  <div class="col-lg-4">
                     &nbsp; 
                    <i style='font-size:24px;color: black;cursor: pointer;' class='fa good-share' data-share-title="Chris Yee" data-share-url="https://chrisyee.ca">&#xf064;</i><br><button class="good-share" data-share-title="Chris Yee" data-share-url="https://chrisyee.ca" style="background: transparent;color: #414048;">Share</button>
                  </div>
               </div>
               <br>
               </p>
               <h3>{{ $course_data->credits }} Credit/Class</h3>
               <br>
               <!--<h3>$100.00 or Credit/Class</h3>
               <br>-->
               <form method="POST" name="frmAddToCart" id="frmAddToCart" action="{{ route('add_to_cart') }}">
                  @csrf
                  <input type="hidden" name="course_id" value="{{ $course_data->id }}" />
                  <input type="hidden" name="course_credit" value="{{ $course_data->credits }}" />
                  <input type="hidden" name="course_class_size" value="{{ $course_data->class_size }}" />
                  <input type="hidden" name="transaction_type" value="course_order" />

                  <div class="quantity buttons_added">
                    <div class="input-group inline-group">
                      <input type="button" value="-" class="minus" style="padding: 0px 10px;background-color: #ffffff;border: 1px solid #efefef;border-left-color: rgb(239, 239, 239);border-left-style: solid;border-left-width: 1px;cursor: pointer;" />
                      <input type="number" step="1" min="15" name="quantity" id="cartQuantity" value="15" title="Qty" class="input-text qty text" size="6" required />
                      <input type="button" value="+" class="plus" /> &nbsp;&nbsp;&nbsp;
                      <span style="display: inline-flex; padding-top: 15px;">Participants</span>
                    </div>
                  </div>
                  <br><br>
                  <input type="submit" id="btnAddToCart" name="btnAddToCart" class="button button6" value="Add to Cart" />
                  <input type="submit" id="btnCheckout" name="btnCheckout" class="submit-lg btn-lg" value="Checkout" /> 
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
</div>
</section>
<!-- WOrk Process-->
<section id="our-process" class="padding ">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-sm-12 ">
            <hr>
            <h4 class="inline">&nbsp; &nbsp; <img src="{{ asset('assets/app/images/arrow.PNG') }}" alt="">&nbsp;&nbsp; Shop for
               In-Center Programs 
            </h4>
            <h4 class="inline padd8">&nbsp;&nbsp;<img src="{{ asset('assets/app/images/arrow.PNG') }}" alt=""> &nbsp;&nbsp; what is
               Hybrid Programming? 
            </h4>
            <hr>
         </div>
      </div>
   </div>
</section>
<!--WOrk Process ends-->
<br><br>
<br>
<br>
@endsection


@section('styles')
    <style>
        .carousel {
            position: relative;
        }
        .carousel-item img {
            object-fit: cover;
        }
        .carousel-item video{
            object-fit: cover;
            border-radius: 30px;
        }
        #carousel-thumbs {
            /* background: rgba(255,255,255,.3); */
            bottom: 0;
            left: 0;
            padding: 0 50px;
            right: 0;
        }
        #carousel-thumbs img {
            border: 5px solid transparent;
            cursor: pointer;
        }
        #carousel-thumbs .img-fluid {
            border-radius: 10px;
            cursor: pointer;
        }
        #carousel-thumbs img:hover {
            /* border-color: rgba(255,255,255,.3); */
        }
        #carousel-thumbs .selected img {
            border-color: rgb(17, 17, 17);
        }
        .carousel-control-prev,.carousel-control-next {
            width: 50px;
        }
        @media all and (max-width: 767px) {
            .carousel-container #carousel-thumbs img {
                border-width: 3px;
            }
        }
        @media all and (min-width: 576px) {
            .carousel-container #carousel-thumbs {
                /* position: absolute; */
            }
        }
        @media all and (max-width: 576px) {
            .carousel-container #carousel-thumbs {
                background: #ccccce;
            }
        }
        .active {
            background: white !important;
        }
        .carouselimg{
            border-radius: 30px;
        }
    </style>
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

    $('.minus').click(function() {
        var cartQty = $('#cartQuantity').val();
        cartQty = parseInt(cartQty) - 1;
        $('#cartQuantity').val(cartQty);
    });

    $('.plus').click(function() {
        var cartQty = $('#cartQuantity').val();
        cartQty = parseInt(cartQty) + 1;
        $('#cartQuantity').val(cartQty);
    });        

    $('#myCarousel').carousel({
        interval: false
    });

    $('#carousel-thumbs').carousel({
        interval: false
    });

    // handles the carousel thumbnails
    // https://stackoverflow.com/questions/25752187/bootstrap-carousel-with-thumbnails-multiple-carousel
    $('[id^=carousel-selector-]').click(function () {
        var id_selector = $(this).attr('id');
        var id = parseInt(id_selector.substr(id_selector.lastIndexOf('-') + 1));
        $('#myCarousel').carousel(id);
    });

    // Only display 3 items in nav on mobile.
    if ($(window).width() < 575) {
        $('#carousel-thumbs .row div:nth-child(4)').each(function () {
            var rowBoundary = $(this);
            $('<div class="row mx-0">').insertAfter(rowBoundary.parent()).append(rowBoundary.nextAll().addBack());
        });

        $('#carousel-thumbs .carousel-item .row:nth-child(even)').each(function () {
            var boundary = $(this);
            $('<div class="carousel-item">').insertAfter(boundary.parent()).append(boundary.nextAll().addBack());
        });
    }

    // Hide slide arrows if too few items.
    if ($('#carousel-thumbs .carousel-item').length < 2) {
        $('#carousel-thumbs [class^=carousel-control-]').remove();
        $('.machine-carousel-container #carousel-thumbs').css('padding', '0 5px');
    }

    // when the carousel slides, auto update
    $('#myCarousel').on('slide.bs.carousel', function (e) {
        var id = parseInt($(e.relatedTarget).attr('data-slide-number'));
        $('[id^=carousel-selector-]').removeClass('selected');
        $('[id=carousel-selector-' + id + ']').addClass('selected');
    });

    // when user swipes, go next or previous
    /*$('#myCarousel').swipe({
        fallbackToMouseEvents: true,
        swipeLeft: function (e) {
            $('#myCarousel').carousel('next');
        },
        swipeRight: function (e) {
            $('#myCarousel').carousel('prev');
        },
        allowPageScroll: 'vertical',
        preventDefaultEvents: false,
        threshold: 75
    });*/

    $('#myCarousel .carousel-item img').on('click', function (e) {
        var src = $(e.target).attr('data-remote');
        if (src) $(this).ekkoLightbox();
    }); 

    function add_item_to_user_wishlist(course_id) {
      $.ajax({
         method: "POST",
         url: "{{ route('add_course_to_user_wishlist') }}",
         data: { _token: "{{ csrf_token() }}", course_id: course_id },
         dataType: 'json',
      })
      .done(function( msg ) {
         console.log( "Data Saved: " + msg );
         if(msg.message == 'success'){
            alert("Item has been successfully added to your wishlist.");
         }else{
            alert('Item already exist to your wishlist.');
         }
      });
    }    
</script>
@endsection