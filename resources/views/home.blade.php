@extends('layouts.app')

@section('content')
<!--PreLoader-->
<div class="loader">
   <div class="loader-inner">
      <div class="cssload-loader"></div>
   </div>
</div>
<!--PreLoader Ends-->
<!-- header -->
<header class="site-header" id="header">
   <nav class="navbar navbar-expand-lg transparent-bg bg-transparent darkcolor static-nav mt-sm-4 mt-2">
      <div class="container bg-white position-relative">
         <a class="navbar-brand pl-2" href="{{ route('home') }}">
                <img src="{{ asset('assets/app/images/logo.PNG') }}" alt="logo" class="logo-default">
                <img src="{{ asset('assets/app/images/logo.PNG') }}" alt="logo" class="logo-scrolled">
         </a>
         <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('home') }}#our-process">Ways we care</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('home') }}#howitworks">How it works</a>
               </li>
               <li class="nav-item dropdown static">
                  <a class="nav-link  " href="{{ route('home') }}#aboutjaypad"> JayPad </a>
               </li>
               <li class="nav-item ">
                  @guest
                  <a onclick="signin()" class="nav-link dropbtn">Sign in</a>
                  <div id="loginDropdown" class="dropdown-content">
                          <a href="{{ route('member_login') }}">I'm a Member</a>
                          <a href="{{ route('enterprise_login') }}">I'm an Enterprise</a>
                          <a href="{{ route('signinvendor_login') }}">I'm a Vendor</a>
                  </div>
                  @endguest

                  @auth
                     <a onclick="signin()" class="nav-link dropbtn">Welcome ({{ Auth::user()->name }})</a>
                     <div id="loginDropdown" class="dropdown-content">
                        <a href="{{ route(Auth::user()->getUserAccountUrl()) }}">Manage Profile</a>
						<a href="{{ route('view_cart') }}">View Cart</a>
                        <a href="{{ route('user_logout') }}">Sign Out</a>
                     </div>                      
                  @endauth
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Contact</a>
               </li>
            </ul>
         </div>
         <!--side menu open button-->
         <a href="javascript:void(0)" class="d-inline-block d-lg-none sidemenu_btn mr-0" id="sidemenu_toggle">
         <span class="bg-dark"></span> <span class="bg-dark"></span> <span class="bg-dark"></span>
         </a>
      </div>
   </nav>
   <br>
   <br>
   <!-- side menu -->
   <div class="side-menu opacity-0 gradient-bg">
      <div class="overlay"></div>
      <div class="inner-wrapper">
         <span class="btn-close btn-close-no-padding" id="btn_sideNavClose"><i></i><i></i></span>
         <nav class="side-nav w-100">
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('home') }}#our-process">Ways we care</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('home') }}#howitworks">How it works</a>
               </li>
               <li class="nav-item dropdown static">
                  <a class="nav-link  " href="{{ route('home') }}#aboutjaypad"> JayPad </a>
               </li>
               <li class="nav-item ">
                  @guest
                  <a onclick="myFunction()" class="nav-link dropbtn">Sign in</a>
                  <div id="loginDropdown" class="dropdown-content">
                          <a href="{{ route('member_login') }}">I'm a Member</a>
                          <a href="{{ route('enterprise_login') }}">I'm an Enterprise</a>
                          <a href="{{ route('signinvendor_login') }}">I'm a Vendor</a>
                  </div>
                  @endguest

                  @auth
                     <a onclick="myFunction()" class="nav-link dropbtn">Welcome ({{ Auth::user()->name }})</a>
                     <div id="loginDropdown" class="dropdown-content">
                          <a href="{{ route(Auth::user()->getUserAccountUrl()) }}">Manage Profile</a>
						  <a href="{{ route('view_cart') }}">View Cart</a>
                          <a href="{{ route('user_logout') }}">Sign Out</a>
                     </div>                      
                  @endauth                  
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Contact</a>
               </li>
            </ul>
         </nav>
      </div>
   </div>
   <div id="close_side_menu" class="tooltip"></div>
   <!-- End side menu -->
</header>
<!-- header -->
<!--Some Feature -->
<br/><br/><br/>
<section style="margin-top: auto;min-height: max-content;">
  <div class="container">
  @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
  @endif

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  </div>  
</section> 

<section id="our-feature" class="single-feature padding">
   <div class="container">
      <div class="row d-flex align-items-center">
         <div class="col-lg-6 col-md-7 col-sm-7 text-sm-left text-center ">
            <div class="heading-title mb-4">
               <h2 class="darkcolor font-medium bottom30">Happiness <br> is around the corner.</h2>
               <h3 class="font-medium">Enjoy online classes on <span class="blue">JayPad</span> .</h3>
            </div>
         </div>
         <div class="col-lg-6  col-md-5 col-sm-5 ">
            <div class="fadein">
               <img src="{{ asset('assets/app/images/New/top1.jpg') }}" style="width:100%">
               <img src="{{ asset('assets/app/images/New/shop1.jpg') }}" style="width:100%">
               <img src="{{ asset('assets/app/images/New/tablet.jpg') }}" style="width:100%">
            </div>
         </div>
      </div>
   </div>
</section>
<br>
<br>
<!--Some Feature ends-->
<!-- WOrk Process-->
<section id="our-process">
   <div class="container">
   <div class="row">
      <div class="col-md-12 col-sm-12 ">
         <hr>
         <button class="collapsible font-medium"><img src="{{ asset('assets/app/images/arrow.PNG') }}" alt="" width="28px"
            height="28px">&nbsp; Ways we care</button>
         <div class=" content padding">
            <br><br>
            <p class="subs">{{ $way_we_care->content }}<br><br>
            <div class="padd8 inline">
               Like how we care? &nbsp;&nbsp; 
            </div>
            <div class="padd8 inline">
               <img class="subs" src="{{ asset('assets/app/images/arrow.PNG') }}" alt="" width="28px" height="28px">
               &nbsp;&nbsp;&nbsp;
               Follow us &nbsp;&nbsp;
               <img src="{{ asset('assets/app/images/twitter.png') }}" alt="" width="28px" height="28px"> &nbsp;
               <img src="{{ asset('assets/app/images/fb.png') }}" alt="" width="28px" height="28px"> &nbsp;
               <img src="{{ asset('assets/app/images/insta.png') }}" alt="" width="28px" height="28px"> &nbsp;&nbsp;&nbsp;
            </div>
            <!-- <button id="subscribe" type="button" class="btn btn-primary submit" >Subscribe to JayNews</button> -->
            <button data-toggle="modal" data-target="#wayswecare" type="button"
               class="btn btn-primary submit">Subscribe to JayNews</button>
            <br><br><br><br><br><br><br>
            </p>
            <div id="wayswecare" class="modal fade" role="dialog">
               <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                     <!-- <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div> -->
                     <div class="modal-body ClasModalBody">
                        <h2 class="text-center" id="Idwayswecare" style="display: block;">Subscribed to
                           the JayNews
                        </h2>
                        <h2 class="text-center" id="Idgreatchoice" style="display: none;">Great choice!
                           <br>You've successfully subscribed to the JayNews!
                        </h2>
                        <!-- action_page.php -->
                    <form name="frmRegisterSubscriber" id="Idwayswecareform" style="display: block;">
                        <br>
                        <div class="row ">
                            <div class="col-lg-6"> 
                                <label for="fldSubscribeFirstname">First Name</label><br>
                                <input  type="text" id="fldSubscribeFirstname" name="firstname" class="inputfields" required ><br>
                            </div>
                            <div class="col-lg-6">
                                <label for="fldSubscribeLastname">Last Name</label><br>
                                <input   type="text" id="fldSubscribeLastname" name="lastname" class="inputfields" required><br>
                            </div>
                            <div class="col-lg-9">
                                <label for="fldSubscribeEmail">Email</label><br>
                                <input type="email" id="fldSubscribeEmail" name="email" class="inputfields" required><br>
                            </div>
                            <div class="col-lg-3">
                                <br>
                                <button class="btn btn-primary btnsubmit" type="button" onclick="btnsubmit()"  >Submit</button> 
                                <!-- data-dismiss="modal" -->
                            </div>
                        </div>
                    </form>
                        <br><br>
                     </div>
                     <div class="modal-footer" style="border: none;">
                        <!-- <div class="text-center"> 
                           </div> -->
                     </div>
                  </div>
               </div>
            </div>
            <!-- <hr> -->
         </div>
         <hr>
      </div>
   </div>
</section>
<!--WOrk Process ends-->
<!--Some Feature -->
<section id="our-feature" class="single-feature ">
   <div id="subs">
      <div class="padd">
         <h2 class="inline">Subscribed to the JayNews</h2>
         <br> <br>
         <form action="action_page.php">
            <div class="row ">
               <div class="col">
                  <label for="fname">First Name</label><br>
                  <input type="text" id="fname" name="firstname"><br>
                  <br>
                  <label for="email">Email</label><br>
                  <input type="email" id="email" name="email"><br>
               </div>
               <div class="col">
                  <label for="lname">Last Name</label><br>
                  <input type="text" id="lname" name="lastname"><br>
                  <br><br>
                  <button class="btn btn-primary">Submit</button>
               </div>
            </div>
         </form>
      </div>
      <br><br>
      <div class="text-center">
         <h2 class="inline">Great choice! <br> You've successfully subscribed to the JayNews!</h2>
      </div>
   </div>
</section>
<!-- WOrk Process-->
<section id="howitworks">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-sm-12 ">
            <hr>
            <button class="collapsible font-medium">
            <img src="{{ asset('assets/app/images/arrow.PNG') }}" alt="" width="28px" height="28px">&nbsp; How it works</button>
            <div class="content">
               <br>
               <br>
               <p>{{ $how_it_work->content }}</p>
               <br><br><br><br><br><br><br>
            </div>
            <hr>
         </div>
      </div>
   </div>
</section>
<!--WOrk Process ends-->
<!-- WOrk Process-->
<section id="our-process">
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
<br>
<br>
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
            <a href="{{ route('our_services_view_all') }}/{{ $content_type->id }}"><span>{{ $content_type->name }}</span></a>
         </div>
         @endforeach
         <!--<div data-filter=".arts" class="cbp-filter-item">
            <span>Arts & <br> Crafts</span>
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
         <div class="cbp-filter-item">
            <span><a href="{{ route('our_services_view_all') }}"><button class="submit">View all</button></a></span>
         </div>
      </div>
      <br>
      <br>
      <div id="services-measonry" class="cbp">
         <div class="row">
         <?php
         $course_listing = '';
         foreach($courses as $course){
            $user_details = $course->Owner()->get();

            $course_listing .= '<div class="cbp-item brand design graphics arts">
               <div class="services-main">
                  <div class="image bottom10">
                     <div class="image"><a href="'.route('view_course_details').'/'.$course->id.'"><img alt="SEO" src="'.config('app.url').'/storage/app/course_browser_image/'.$course->browser_image_2.'" /></a></div>
                     <div class="overlay">
                        <a href="#" class="overlay_center border_radius"><i class="fa fa-eye"></i></a>
                     </div>
                  </div>
                  <div class="services-content text-center text-md-left">
                     <p class="bottom15"><a href="'.route('view_course_details').'/'.$course->id.'">'.$course->title.'</a><br><br>';

            if($course->day_monday === 1){
                 $course_listing .= 'Mo,';
            }

            if($course->day_tuesday === 1){
                 $course_listing .= 'Tu,';
            }

            if($course->day_wednesday === 1){
                 $course_listing .= 'We,';
            }

            if($course->day_thursday === 1){
                 $course_listing .= 'Th,';
            }

            if($course->day_friday === 1){
                 $course_listing .= 'Fr,';
            }

            if($course->day_saturday === 1){
                 $course_listing .= 'Sa,';
            }                                    

            if($course->day_sunday === 1){
                 $course_listing .= 'Su,';
            }

            $course_listing .= date("M d", strtotime($course->start_date)).'-'.date("M d, Y ", strtotime($course->end_date)).date("g:i A ", strtotime($course->start_time)).'(EST)<br><br>By <span class="blue">'.$user_details[0]->enterprise_name.', '.$user_details[0]->location.'</span>
                     </p>
                  </div>
               </div>
            </div>';
         }
         echo $course_listing;
         ?>
            <!--<div class="cbp-item brand design graphics arts">
               <div class="services-main">
                  <div class="image bottom10">
                     <div class="image"><img alt="SEO" src="{{ asset('assets/app/images/New/cat1.jpg') }}"></div>
                     <div class="overlay">
                        <a href="#" class="overlay_center border_radius"><i class="fa fa-eye"></i></a>
                     </div>
                  </div>
                  <div class="services-content text-center text-md-left">
                     <p class="bottom15">Indian Handmade Art- a Journey Back in History
                        <br><br>
                        Tu,Fr,Dec 12-Feb 5, 2021 11:00AM (EST)
                        <br><br>
                        By <span class="blue">EasterSeals Southern California</span>
                     </p>
                  </div>
               </div>
            </div>
            <div class="cbp-item brand design graphics arts">
               <div class="services-main">
                  <div class="image bottom10">
                     <div class="image"><img alt="SEO" src="{{ asset('assets/app/images/New/cat2.jpg') }}"></div>
                  </div>
                  <div class="services-content text-center text-md-left">
                     <p class="bottom15">Water Color in Spanish
                        <br><br>
                        Tu,Sa,Dec 10-Feb 28, 2021 2:00PM (EST)
                        <br><br>
                        By <span class="blue">DayBreak Adult Day Centers, Oakland CA</span>
                     </p>
                  </div>
               </div>
            </div>
            <div class="cbp-item brand design graphics arts">
               <div class="services-main">
                  <div class="image bottom10">
                     <div class="image"><img alt="SEO" src="{{ asset('assets/app/images/New/cat3.jpg') }}"></div>
                  </div>
                  <div class="services-content text-center text-md-left">
                     <p class="bottom15">Young Artist on Stage
                        <br><br>
                        M,Sa,Dec 4-Feb 28, 2021 9:00AM (EST)
                        <br><br>
                        By <span class="blue">Ative Day, Maryland</span>
                     </p>
                  </div>
               </div>
            </div>
            <div class="cbp-item brand design graphics arts">
               <div class="services-main">
                  <div class="image bottom10">
                     <div class="image"><img alt="SEO" src="{{ asset('assets/app/images/New/cat4.jpg') }}"></div>
                     <div class="overlay">
                        <a href="#" class="overlay_center border_radius"><i class="fa fa-eye"></i></a>
                     </div>
                  </div>
                  <div class="services-content text-center text-md-left">
                     <p class="bottom15">Building Block in Action
                        <br><br>
                        M,Sa,Nov 29-Feb 28, 2021 3:00PM (EST)
                        <br><br>
                        By <span class="blue">EasterSeals New Hampshire</span>
                     </p>
                  </div>
               </div>
            </div>
            <div class="cbp-item brand design graphics">
               <div class="services-main">
                  <div class="image bottom10">
                     <div class="image"><img alt="SEO" src="{{ asset('assets/app/images/7.PNG') }}"></div>
                     <div class="overlay">
                        <a href="#" class="overlay_center border_radius"><i class="fa fa-eye"></i></a>
                     </div>
                  </div>
                  <div class="services-content text-center text-md-left">
                     <p class="bottom15">Backyard Race in Korean
                        <br><br>
                        Fr,Su,Dec 20-Feb 23, 2021 5:00PM (EST)
                        <br><br>
                        By <span class="blue">Korean United Center, Seoul,Korea</span>
                     </p>
                  </div>
               </div>
            </div>
            <div class="cbp-item brand design graphics">
               <div class="services-main">
                  <div class="image bottom10">
                     <div class="image"><img alt="SEO" src="{{ asset('assets/app/images/8.PNG') }}"></div>
                  </div>
                  <div class="services-content text-center text-md-left">
                     <p class="bottom15">Indian Handmade Art- a Journey Back in History
                        <br><br>
                        Tu,Fr,Dec 12-Feb 5, 2021 11:00AM (EST)
                        <br><br>
                        By <span class="blue">EasterSeals Southern California</span>
                  </div>
               </div>
            </div>-->
            <!-- <div class="cbp-item brand design graphics">
               <div class="services-main">
                   <div class="image bottom10">
                       <div class="image"><img alt="SEO" src="/images/9.PNG"></div>
                   </div>
                   <div class="services-content text-center text-md-left">
                       <p class="bottom15">Indian Handmade Art- a Journey Back in History
                           <br><br>
                           Tu,Fr,Dec 12-Feb 5, 2021 11:00AM (EST)
                           <br><br>
                           By <span class="blue">EasterSeals Southern California</span>
                       </p>
                   </div>
               </div>
               </div> -->
            <!-- <div class="cbp-item brand design graphics">
               <div class="services-main">
                   <div class="image bottom10">
                       <div class="image"><img alt="SEO" src="/images/10.PNG"></div>
                   </div>
                   <div class="services-content text-center text-md-left">
                       <p class="bottom15">Indian Handmade Art- a Journey Back in History
                           <br><br>
                           Tu,Fr,Dec 12-Feb 5, 2021 11:00AM (EST)
                           <br><br>
                           By <span class="blue">EasterSeals Southern California</span>
                       </p>
                   </div>
               </div>
               </div> -->
         </div>
      </div>
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
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <h4 class="inline padd8">&nbsp;&nbsp;<img src="{{ asset('assets/app/images/arrow.PNG') }}" alt=""> &nbsp;&nbsp; what is
               Hybrid Programming? &nbsp;&nbsp;<span>
               <img src="{{ asset('assets/app/images/H_Logo.png') }}" style="width: 40px;" />
               </span> 
            </h4>
            <hr>
         </div>
      </div>
   </div>
</section>
<!--WOrk Process ends-->
<!--Some Feature -->
<section id="our-feature" class="single-feature padding">
   <div class="container">
      <div class="row d-flex align-items-center">
         <div class="col-lg-4 offset-lg-1 col-md-5 col-sm-5 ">
            <div class="image"><img alt="SEO" src="{{ asset('assets/app/images/map.PNG') }}" id="img1"></div>
            <div class="image"><img alt="SEO" src="{{ asset('assets/app/images/New/shop1.jpg') }}"></div>
         </div>
         <div class="col-lg-7 col-md-7 col-sm-7 text-sm-left text-center ">
            <div class="heading-title col-md-8 mb-3" id="IDzipCodeDiv" style="display: none;">
               <div class="searchdown">
                  <input onclick="search()" class="dropbtnn " id="Input" onkeyup="filterFunction()"
                     placeholder="What is your zip code?">
                  <div id="searchDown" class="dropdown-search">
                     <a onclick="activeDay()" href="#activeDay">Active Day Maryland</a>
                     <a href="#base">Base</a>
                     <a href="#blog">Blog</a>
                  </div>
               </div>
               <br><br>
               <p>What kind of programs are you looking for?</p>
               <button class="button button4">Patient </br> Health</button>
               <button class="button button4">Memory </br> Care</button>
               <button class="button button4">Adult Day</button>
               <br>
               <button class="button button4">Home </br> Help</button>
               <button class="button button4">Family </br> Support</button>
               <button class="button button4">Language </br> Diversity</button>
               <br><br>
               <button class="submit" onclick="btnzipcode()">Submit</button>
            </div>
            <!-- hybrid program div -->
            <div class="heading-title col-md-12 mb-3" id="IDhybridProgramDiv">
               <div class="row">
                  <div class="col-md-1"></div>
                  <div class="searchdown col-md-9 " style="    padding-left: 2px;">
                     <input class="dropbtnn" name="fldSearchVendor" id="fldSearchVendor" placeholder="Enter zipcode">
                  </div>
               </div>
               <br>
               <p>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; Providers in your area:</p>
               &nbsp;&nbsp;
               <span id="section_search_result">

               <!--<p class="">
                  <span> <img src="{{ asset('assets/app/images/H_Logo.png') }}" style="width: 40px;" /></span>
                  <span class="blue">Foundations Group, Maryland</span>&nbsp;&nbsp;
                  <button class="button1 button5">Patient </br> Health</button>
                  <button class="button1 button5">Memory </br> Care</button>
                  <button class="button1 button5">Adult Day</button>
               </p>
               <p>
                  <span> <img src="{{ asset('assets/app/images/H_Logo.png') }}" style="width: 40px;" /></span>
                  <span class="blue"><a onclick="activeDay()" href="#activeDay">Active Day,
                  Maryland</a></span>&nbsp;&nbsp;
                  <button class="button1 button5">Patient </br> Health</button>
                  <button class="button1 button5">Memory </br> Care</button>
                  <button class="button1 button5">Adult Day</button>
                  <button class="button1 button5">Home <br> Help</button>
               </p>
               <p>
                  <span> <img src="{{ asset('assets/app/images/H_Logo.png') }}" style="width: 40px;" /></span>
                  <span class="blue">EasterSeals,Sliver Spring, Maryland</span>&nbsp;&nbsp;
                  <button class="button1 button5">Patient </br> Health</button>
                  <button class="button1 button5">Memory </br> Care</button>
                  <button class="button1 button5">Adult Day</button>
               </p>
               <p>
                  <span class="blue">&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; ChairOne
                  Fitness</span>&nbsp;&nbsp;
                  <button class="button1 button5">Fitness</button>
               </p>-->

               </span>               
            </div>
         </div>
      </div>
      <div class="row d-flex align-items-center">
         <div class="col-lg-12 col-md-12 text-center " id="DivHybrid">
            <br>
            <br>
            <h2 class="inline ">
               <span> <img src="{{ asset('assets/app/images/H_Logo.png') }}" style="width: 40px;padding-bottom: 5px;" /></span>
               What is Hybrid Programming?
            </h2>
            <br><br>
            <br>
            <p>
               Providers enlisted in the JayChannel offering Hybrid Programming allow<br>
               participants to choose between in-center attendence or at-home participation<br>
               of the activities. Participants can also choose a combination of both.<br><br>
               Most of the Providers in the JayChannel accepts Virtual Membership.<br>
               Ask the Provider of your choice for details.
            </p>
         </div>
      </div>
   </div>
</section>
<!--Some Feature -->
<section id="our-feature" class="single-feature padding">
   <div class="container" id="activeDay">
      <!--<br><br>
      <div class="text-center">
         <div>
            <img src="{{ asset('assets/app/images/activeland.PNG') }}" alt="" class="">
            <h2 class="inline ">Active Day, Maryland</h2>
         </div>
         <br>
         <span> <img src="{{ asset('assets/app/images/H_Logo.png') }}" style="width: 40px;" /></span>
         <button class="button1 button5">Patient </br> Health</button>
         <button class="button1 button5">Memory </br> Care</button>
         <button class="button1 button5">Adult Day</button>
         <button class="button1 button5">Home <br> Help</button>
      </div>
      <br><br>
      <div class="row d-flex ">
         <div class="col-lg-4 offset-lg-1 col-md-5 col-sm-5 wow">
            <div class="image"><img alt="SEO" src="{{ asset('assets/app/images/activeday.PNG') }}"></div>
            <br>
            <p>Active Day of Arbutus
               <br><br>
               1667 knecht Ave, Suit Q Arbutus, MD 21227-1573
               <br><br>
               P:(888) 338-6898
               <br>
               F:(410) 242-6181
               <br>
               Email:Info@activeday.com
               <br>
               Hours of Operation:
               <br>
               Mon-Fri: 8am-4:30pm
               <br>
               Center Director:
               <br>
               Veronica Johnson
            </p>
         </div>
         <div class="col-lg-6 col-md-7 col-sm-7 text-sm-left wow ">
            <div class="heading-title col-md-12 mb-3">
               <ul class="ul ullist">
                  <li>
                     Adults with Down Syndrome,Autism and developemntal or intellectual disabilities.
                  </li>
                  <li>
                     Seniors with Alzheimer's Disease or other dementias receive active support in
                     multi-faceted ways.
                  </li>
                  <li>
                     Have direct access to specialized adult day healthcare
                  </li>
                  <li>
                     Enjoy a day full of stimulating activities
                  </li>
                  <li>
                     Highly qualified,caring staff members assist with medical needs
                  </li>
                  <li>
                     Coordinate care with physicians and other healthcare professionals.
                  </li>
                  <li>
                     Engage cognative and physical activities.
                  </li>
               </ul>
               <br><br>
               <span class="blue">
               <span> <img src="{{ asset('assets/app/images/H_Logo.png') }}" style="width: 40px;" /></span>
               Virtual Membership available</span>
               <br>
               <span class="blue">
               <span> <img src="{{ asset('assets/app/images/H_Logo.png') }}" style="width: 40px;" /></span>
               In-Center Membership available</span>
               <br>
               <span class="blue">
               <span> <img src="{{ asset('assets/app/images/H_Logo.png') }}" style="width: 40px;" /></span>
               Hybrid Membership available</span>
            </div>
         </div>
      </div>
      <div class="text-center">
         <button class="submit-lg btn-lg"> Visit Vendor's Website</button>
         &nbsp;&nbsp;
         <button class=" button button6 button4"> Email Vendor</button>
      </div>-->
   </div>
</section>
<br>
<br>
<!-- WOrk Process-->
<section id="our-process" class="padding ">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-sm-12 ">
            <hr>
            <h4 class="inline">&nbsp; &nbsp; <img src="{{ asset('assets/app/images/arrow.PNG') }}" alt="">&nbsp;&nbsp; Shop for Class
               Passes 
            </h4>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp;
            <h4 class="inline padd8">&nbsp;&nbsp;<img src="{{ asset('assets/app/images/arrow.PNG') }}" alt=""> &nbsp;&nbsp; How do Class
               Passes work? 
            </h4>
            <hr>
         </div>
      </div>
   </div>
</section>
<br>
<br>
<!--WOrk Process ends-->
<div class="container">
   <div id="services-measonry">
      <div class="row">
        @foreach ($credits as $credit)
          @if ($credit->is_for_sale == 1)
         <div class="cbp-item brand design graphics">
            <div class="services-main">
               <div class="image bottom10">
                  <div class="image"><a href="#panel" onclick="show_credit_details({{ $credit->id }})"> 
                    @isset($credit->homepage_image)
                    <img class="h200" alt="SEO" src="{{ config('app.url') }}/storage/app/credit_homepage_image/{{ $credit->homepage_image }}" />
                    @endisset
                  </a></div>
                  <div class="overlay">
                     <a href="#" class="overlay_center border_radius"><i class="fa fa-eye"></i></a>
                  </div>
               </div>
               <div class="services-content text-center ">
                  <p class="bottom15">${{ $credit->cost_amount }}
                  </p>
               </div>
            </div>
         </div>
         @else
         <div class="cbp-item brand design graphics">
            <div class="services-main">
               <div class="image bottom10">
                  <div class="image"><a href="#panel" onclick="show_credit_details({{ $credit->id }})"> 
                    @isset($credit->homepage_image)
                    <img class="h200" alt="SEO" src="{{ config('app.url') }}/storage/app/credit_homepage_image/{{ $credit->homepage_image }}" />
                    @endisset
                  </a></div>
                  <div class="overlay">
                     <a href="#" class="overlay_center border_radius"><i class="fa fa-eye"></i></a>
                  </div>
               </div>
               <div class="services-content text-center text-md-left">
                  <p class="bottom15">{{ $credit->content }}
                  </p>
               </div>
            </div>
         </div>
         @endif
        @endforeach

         <!--<div class="cbp-item brand design graphics">
            <div class="services-main">
               <div class="image bottom10">
                  <div class="image" onclick="myFunction()"><a href="#panel"> <img class="h200" alt="SEO"
                     src="{{ asset('assets/app/images/50credit.png') }}"></a></div>
                  <div class="overlay">
                     <a href="#" class="overlay_center border_radius"><i class="fa fa-eye"></i></a>
                  </div>
               </div>
               <div class="services-content text-center ">
                  <p class="bottom15">$200
                  </p>
               </div>
            </div>
         </div>
         <div class="cbp-item brand design graphics">
            <div class="services-main">
               <div class="image bottom10">
                  <div class="image" onclick="myFunction()"><a href="#panel"><img alt="SEO"
                     src="{{ asset('assets/app/images/graphics/200credi.png') }}"></a></div>
                  <div class="overlay">
                     <a href="#" class="overlay_center border_radius"><i class="fa fa-eye"></i></a>
                  </div>
               </div>
               <div class="services-content text-center ">
                  <p class="bottom15">$600
                  </p>
               </div>
            </div>
         </div>
         <div class="cbp-item brand design graphics">
            <div class="services-main">
               <div class="image bottom10">
                  <div class="image" onclick="myFunction()"><a href="#panel"><img alt="SEO"
                     src="{{ asset('assets/app/images/500credi.png') }}"></a></div>
                  <div class="overlay">
                     <a href="#" class="overlay_center border_radius"><i class="fa fa-eye"></i></a>
                  </div>
               </div>
               <div class="services-content text-center ">
                  <p class="bottom15">$1000
                  </p>
               </div>
            </div>
         </div>
         <div class="cbp-item brand design graphics">
            <div class="services-main">
               <div class="image bottom10">
                  <div class="image" onclick="myFunction()"><a href="#panel"><img class="h200" alt="SEO"
                     src="{{ asset('assets/app/images/enter2.jpg') }}"></a></div>
                  <div class="overlay">
                     <a href="#" class="overlay_center border_radius"><i class="fa fa-eye"></i></a>
                  </div>
               </div>
               <div class="services-content text-center text-md-left">
                  <p class="bottom15">
                     Get a quote from us.
                     Plenty of bonus for getting credits in bulk.
                  </p>
               </div>
            </div>
         </div>-->
      </div>
   </div>
</div>
<!--Some Feature ends-->
<section id="our-feature" class="single-feature padding">
   <div id="panel" class="container" style="display: block;">
      <div class="row d-flex" id="section_credit_details" style="display: none;">
         <!--<div class="col-lg-4 offset-lg-1 col-md-5 col-sm-5 wow ">
            <div class="image"><img alt="SEO" src="{{ asset('assets/app/images/500creditsbig.PNG') }}"></div>
         </div>
         <div class="col-lg-6 col-md-7 col-sm-7 text-sm-left text-center wow ">
            <div class="heading-title col-md-10 mb-3">
               <h3>Credits Class Pass</h3>
               <br>
               <ul class="ul ullist">
                  <li>
                     Purchase 500 credits for $1,000
                  </li>
                  <li>
                     &2 / credit
                  </li>
                  <li>
                     Credits can be used on as many Jaypad users
                  </li>
                  <li>
                     One year expiration
                  </li>
                  <li>
                     Automatic refill available
                  </li>
               </ul>
               <br>
               <div class="row">
                  <div class="col-lg-4">
                     &nbsp; &nbsp;&nbsp;
                     <i style="font-size:24px;color: black;" class="fa">&#xf004;</i>
                     <br>
                     Wish List
                     &nbsp;
                  </div>
                  <div class="col-lg-4">
                     &nbsp;
                     <i style='font-size:24px;color: black;' class='fa'>&#xf064;</i><br>
                     Share
                  </div>
               </div>
               <br>
               <div class="quantity buttons_added">
                  <div class="input-group inline-group">
                     <h3 class="inline"><span style="padding-top: 10px;display: inline-flex;">
                        $100.00
                        </span> &nbsp; &nbsp; &nbsp; 
                     </h3>
                     <input type="number" step="1" min="15" max=""
                        name="quantity" value="15" title="Qty" class="input-text qty text" size="6"
                        pattern="" inputmode="">
                     <input type="button" value="+" class="plus">
                  </div>
               </div>
               <br><br>
               <label class="switch">
               <input type="checkbox" checked="checked">
               <span class="slider round"> </span>
               </label> &nbsp; Auto-Renewal
               <br><br>
               <button class=" button button6 ">Add to Cart</button>
               <button class="submit-lg button">Checkout</button>
            </div>
         </div>-->
      </div>
   </div>
</section>
<br>
<br>
<!--Some Feature ends-->
<section>
   <div class="container padding text-center">
      <h2 class="inline ">How do Class Passes work?</h2>
      <br><br>
      <div class="  row padd100">
         <div class="cbp-item brand design graphics">
            <div class="services-main">
               <div class="image bottom10 ">
                  <div class="image "><img alt="SEO" src="{{ asset('assets/app/images/Asset 11.png') }}" class="size250"></div>
                  <div class="overlay">
                     <a href="#" class="overlay_center border_radius"><i class="fa fa-eye"></i></a>
                  </div>
               </div>
               <div class="services-content text-center text-md-left">
                  <p class="bottom15">
                     With Class Passes,you get credits that are good for a year to book at-home virtual
                     classes.
                  </p>
               </div>
            </div>
         </div>
         <div class="cbp-item brand design graphics margi">
            <div class="services-main">
               <div class="image bottom10">
                  <div class="image"><img alt="SEO" src="{{ asset('assets/app/images/Asset 12.png') }}" class="size220"></div>
                  <div class="overlay">
                     <a href="#" class="overlay_center border_radius"><i class="fa fa-eye"></i></a>
                  </div>
               </div>
               <div class="services-content text-center text-md-left">
                  <p class="bottom15">
                     Finad and book a class anywhere in any language at anytime. Credits will be deducted
                     from your account.
                  </p>
               </div>
            </div>
         </div>
         <div class="cbp-item brand design graphics">
            <div class="services-main">
               <div class="image bottom10">
                  <div class="image"><img alt="SEO" src="{{ asset('assets/app/images/Asset 13.png') }}"></div>
                  <div class="overlay">
                     <a href="#" class="overlay_center border_radius"><i class="fa fa-eye"></i></a>
                  </div>
               </div>
               <div class="services-content text-center text-md-left">
                  <p class="bottom15">
                     Classes very in credit value based on popularity, type of class of service and other
                     special offers.
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- WOrk Process-->
<section id="aboutjaypad" class="padding">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-sm-12 ">
            <hr>
            <h4>
            &nbsp;&nbsp;<img src="{{ asset('assets/app/images/arrow.PNG') }}" alt="">&nbsp;&nbsp; About JayPad
            <hr>
         </div>
      </div>
   </div>
</section>
<!--WOrk Process ends-->
<section>
   <div class="container padding text-center">
      <img src="{{ asset('assets/app/images/New/tablet.jpg') }}" alt="" width="50%" height="50%">
      <br>
      <h3>Enjoy JayChannel Classes from JayPad</h3>
      <div class="content-padding text-md-left ">
         <br><br>
         <p class=" f17">JayChannel is a part of HealthJay - a software ecosystem that offers Providers,
            Enterprises,
            caregivers, partners, clients and family the care products including 1. Software Platform
            (JayPad App for Clients, JayMobile App for Caregivers and FlightDeck Portal for Admin),
            2. Device (optional JayPad Tablet) and 3. Content (JayChannel).
            <br><br>
            Never before, care professionals can shop on the JayChannel Marketplace and participate in their
            purchased activities virtually and seamlessly from the HealthJay Platform.
            <br><br>
            JayChannel participants are required to host or join the Virtual Classes from the HealthJay
            Platform. Participants will join from JayPad - the user-friendly tablet App that can be
            customized based on cognitive levels. Vendors will host the classes from our FlightDeck
            Video Portal. This 3-in-1 Platform takes care of accessibility on the client end, activity
            management on the enterprise end, and offering quality content to entertain.
         </p>
      </div>
   </div>
   <div class="text-center">
      <button class="submit-lg btn-lg"> Explore HealthJay</button>
      &nbsp;&nbsp;
      <button class=" button button6 button4"> Watch HealthJay Video</button>
   </div>
</section>
<!-- WOrk Process-->
<section id="our-process" class="padding ">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-sm-12 ">
            <hr>
            <h4>
            &nbsp;&nbsp;<img src="{{ asset('assets/app/images/arrow.PNG') }}" alt="">&nbsp;&nbsp; Contact
            <hr>
         </div>
      </div>
   </div>
</section>
<!--WOrk Process ends-->
<section class="position-relative  section-nav-smooth">
   <div class="container" style="background-image: url('{{ asset('assets/app/images/New/bottom.jpg') }}');
      background-size: cover; background-repeat: no-repeat;
      height: 100%;
      ">
      <!-- <div class="row1 row ">
         <div class="col col-lg-2 ">
             <div class="page-titles whitecolor text-center padding">
                         <div class="card">
                             <div class="card-body">
                                 <h3>Your Story</h3>
                                 <br>
                               <p>If JayChannel has made difference in your life, let us know</p>
                             </div>
                         </div>
                     </div>
             </div>
             <div class="col col-lg-2 ">
                 <div class="page-titles whitecolor text-center padding">
                             <div class="card">
                                 <div class="card-body">
                                     <h3>I'm a Vendor</h3>
                                     <br>
                                 </div>
                             </div>
                     </div>
                 </div>
                 <div class="col col-lg-2 ">
                     <div class="page-titles whitecolor text-center padding">
                                 <div class="card">
                                     <div class="card-body">
                                         <h3>I'm a Vendor</h3>
                                         <br>
                                         <form>
                                             <div class="input-group form-group">
                                                Username &nbsp;&nbsp;
                                                 <input type="text" class="form-control inputtop" >
                                             </div>
                                             <div class="input-group form-group ">
                                                Password &nbsp;&nbsp;
                                                 <input type="password" class="form-control inputtop">
                                             </div>
                                             <div class="form-group">
                                                 <input type="submit" value="Enter" class="btn float-right login_btn">
                                             </div>
                                         </form>
                                     </div>
                             </div>
                         </div>
                     </div>
         </div>
         </div> -->
      <div class="row2 padding container">
         <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-6">
               <div class="row">
                  <div class="card card2 col-sm-5 ">
                     <div class="card-body text-center">
                        <img src="{{ asset('assets/app/images/smile.png') }}" alt="" width="90px">
                        <p class="card-text "> Your Story </p>
                        <p><b>If JayChannel has made a difference in your life, let us know</b></p>
                        <img src="{{ asset('assets/app/images/arrow.PNG') }}" alt="" width="28px">&nbsp; <span
                           class="blue">Share</span>
                     </div>
                  </div>
                  <div class="card card2 col-sm-5">
                     <div class="card-body text-center">
                        <img src="{{ asset('assets/app/images/hello.png') }}" alt="" width="90px">
                        <p class="card-text "> Tech Support </p>
                        <p><b>Our Care Team is here to answer your questions 24/7 </b></p>
                        <img src="{{ asset('assets/app/images/chat-button.png') }}" alt="" width="100%">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-7">
                     <br><br><br>
                     <br><br><br>
                     <br>
                     <p class="text-light mb-0">JayChannel powered by HealthJay Inc.</p>
                     <p class="text-light mb-0">435 Stanford Ave</p>
                     <p class="text-light mb-0">Palo Alto, CA 94306</p>
                     <p class="text-light mb-0">Toll Free: 1888-321-4529</p>
                     <p class="text-light mb-0">Email: info@healthjay.com</p>
                  </div>
               </div>
            </div>
            <div class="col-sm-5">
               <div class="row">
                  <div class="card card3 col-sm-10">
                     <div class="card-body">
                        <div class="text-center"><img src="{{ asset('assets/app/images/bulb.png') }}" alt=""
                           width="40px">&nbsp;<span>&nbsp;
                           Message Us</span>
                        </div>
                        <form action="action_page.php">
                           <label for="fname">First Name</label><br>
                           <input type="text" id="fname" name="firstname"><br>
                           <label for="lname">Last Name</label><br>
                           <input type="text" id="lname" name="lastname"><br>
                           <label for="email">Email</label><br>
                           <input type="email" id="email" name="email"><br>
                           <label for="subject">Message</label><br>
                           <textarea id="subject" name="subject"
                              style="height:100px; width: 250px;"></textarea><br>
                           <button class="btn btn-primary">Submit</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!--copyright-->
<div class="copyright">
   <div class="container">
      <div class="row">
         <div class="col-md-6 text-center ">
            <p class="m-0 py-3"> © 2020 <a href="javascript:void(0)" class="hover-default">JayChannel powered by
               HealthJay Inc</a>. 
            </p>
         </div>
         <div class="col-md-6 text-center ">
            <p class="m-0 py-3"> <a href="javascript:void(0)" class="hover-default">Privacy Policy</a> &nbsp; |
               &nbsp;
               <a href="javascript:void(0)" class="hover-default"> Terms</a>&nbsp; | &nbsp;
               <a href="javascript:void(0)" class="hover-default"> Accessibility</a>&nbsp; | &nbsp;
               <a href="javascript:void(0)" class="hover-default"> Cookie Policy</a>
            </p>
         </div>
      </div>
   </div>
</div>
@endsection


@section('scripts')
<script>
    /* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */

   function search_nearby_vendor(zipcode){
      $.ajax({
         method: "POST",
         url: "{{ route('search_vendor') }}",
         data: { _token: "{{ csrf_token() }}", zipcode: zipcode }
      })
      .done(function( msg ) {
         console.log( "Data Saved: " + msg );
         $( "#section_search_result" ).html(msg);           
      }); 
   }

   function show_vendor_details(vendor_id){
      console.log('Vendor ID => ' + vendor_id);
      $.ajax({
         method: "POST",
         url: "{{ route('show_vendor_details') }}",
         data: { _token: "{{ csrf_token() }}", vendor_id: vendor_id }
      })
      .done(function( msg ) {
         console.log( "Data Saved: " + msg );
         $( "#activeDay" ).html(msg).show();           
      }); 
   }

   function show_credit_details(credit_id){
      console.log('Credit ID => ' + credit_id);
      $.ajax({
         method: "POST",
         url: "{{ route('show_credit_details') }}",
         data: { _token: "{{ csrf_token() }}", credit_id: credit_id }
      })
      .done(function( msg ) {
         console.log( "Data Saved: " + msg );
         $("#section_credit_details").html(msg);           
         $("#section_credit_details").show();
         $("#section_credit_details").show();           
      }); 
   }   

   $( document ).ready(function() {
      //console.log( "ready!" );

      $( "#fldSearchVendor" ).keyup(function() {
         search_nearby_vendor($(this).val());
      });      

      //search_nearby_vendor('');
   });

   function signin() {
      document.getElementById("loginDropdown").classList.toggle("show");
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
   var coll = document.getElementsByClassName("collapsible");
   var i;
  
   for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
         this.classList.toggle("active1");
         var content = this.nextElementSibling;
         if (content.style.maxHeight){
            content.style.maxHeight = null;
         } else {
            content.style.maxHeight = content.scrollHeight + "px";
         } 
      });
   }
</script>
<!-- hide and show div -->
<script>
   function myFunction() {
      document.getElementById("panel").style.display = "block";
   }
</script>
<!-- hide and show div for active day -->
<script>
function activeDay() {
   document.getElementById("activeDay").style.display = "block";
}
</script>
<!-- search -->
<script>
/* When the user clicks on the button,
   toggle between hiding and showing the dropdown content */

function search() {
   document.getElementById("searchDown").classList.toggle("showw");
}
  
function filterFunction() {
   var input, filter, ul, li, a, i;
   input = document.getElementById("Input");
   filter = input.value.toUpperCase();
   div = document.getElementById("searchDown");
   a = div.getElementsByTagName("a");
   for (i = 0; i < a.length; i++) {
      txtValue = a[i].textContent || a[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
         a[i].style.display = "";
      } else {
         a[i].style.display = "none";
      }
   }
}
</script>
<script>
$(function(){
   $('.fadein img:gt(0)').hide();
   setInterval(function(){
   $('.fadein :first-child').fadeOut()
      .next('img').fadeIn()
      .end().appendTo('.fadein');}, 
   3000);
});
</script>
<!-- <script>
   function subscribe() {
      document.getElementById("subscribe").style.display = "block";
   }
</script> -->
<script>
   $(document).ready(function(){
      $("#subscribe").click(function(){
         $("#subs").toggle();
      });
   });
</script>
<script>
function btnsubmit(){
   var Idwayswecare = document.getElementById('Idwayswecare');
   var Idwayswecareform = document.getElementById('Idwayswecareform')
   var Idgreatchoice = document.getElementById('Idgreatchoice');

   $.ajax({
      method: "POST",
      url: "{{ route('save_subscriber') }}",
      data: { _token: "{{ csrf_token() }}", firstname: $("#fldSubscribeFirstname").val(), lastname: $("#fldSubscribeLastname").val(), email: $("#fldSubscribeEmail").val() }
   })
   .done(function( msg ) {
      console.log( "Data Saved: " + msg );
      if(Idwayswecare.style.display == 'block' && Idwayswecareform.style.display == 'block'){
         Idwayswecare.style.display = 'none';
         Idwayswecareform.style.display = 'none'
         Idgreatchoice.style.display ='block'
      }            
   });        
}    
</script>
@endsection