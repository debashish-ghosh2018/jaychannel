<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    @yield('refres')
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="">
        <title>{{ config('app.name', 'Jaychannel') }}</title>
         
        <!-- <link href="favicon.html" rel="icon"> -->
        <link rel="stylesheet" href="{{ asset('assets/app/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/app/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/app/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/app/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/app/css/jquery.fancybox.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/app/css/tooltipster.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/app/css/cubeportfolio.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/app/css/navigation.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/app/css/settings.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/app/css/style.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="{{ asset('assets/app/css/normalize.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/app/dist/good-share.min.css') }}">

<style>
.collapsible {
  background-color: #fff;
  color: #000;
  cursor: pointer;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
}

.active1, .collapsible:hover {
  background-color: #fff;
}

.collapsible:after {
  content: "\2295";
  color: #878789;
  font-weight: normal;
  float: right;
  margin: -10px  !important;
  font-size: 45px;
}

.active1:after {
  content: "\2212";
}

.content {
  padding: 0px 18px !important;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}

#panel {
  display: none;
}

#activeDay{
    display: none;
}

#subs{
    display: none;
}

.dropbtnn {
  color: black;
  padding: 16px;
  font-size: 16px;
  cursor: pointer;
}

#Input {
  box-sizing: border-box;
  background-image: url('searchicon.png');
  background-position: 14px 12px;
  background-repeat: no-repeat;
  font-size: 16px;
  padding: 14px 20px 12px 45px;
  border: none;
  border-bottom: 1px solid #ddd;
}

#Input:focus {outline: 3px solid #ddd;}

.searchdown {
  position: relative;
  display: inline-block;
}

.dropdown-search {
  display: none;
  position: absolute;
  background-color: #f6f6f6;
  min-width: 230px;
  overflow: auto;
  border: 1px solid #ddd;
  z-index: 1;
}

.dropdown-search a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.searchdown a:hover {background-color: #ddd;}
.showw {display: block;}
.fadein { position:relative;  height:332px; }
.fadein img { position:absolute; left:0; top:0; }
</style>

        {{--Head--}}
        @yield('head')

        {{--Styles--}}
        @yield('styles')
    </head>
    <body class="@yield('body_class')">


<!--PreLoader-->
<div class="loader">
   <div class="loader-inner">
      <div class="cssload-loader"></div>
   </div>
</div>
<!--PreLoader Ends-->
<!-- header -->
<header class="site-header" id="header">
   <nav   class="navbar navbar-expand-lg transparent-bg bg-transparent darkcolor static-nav mt-sm-4 mt-2">
      <div class="container bg-white position-relative">
         <a  class="navbar-brand pl-2" href="{{ route('home') }}">
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
                  <a class="nav-link  " href="{{ route('home') }}#aboutjaypad"> JayPad  </a>
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
                     <a onclick="signin()" class="nav-link dropbtn">
                      Hey {{ Auth::user()->name }}!<br/><span style="font-size: 14px;">@if (Session::get('user_type') == 'Member') You've {{ Session::get('user_available_credits') }} Credits @elseif (Session::get('user_type') == 'Enterprise') You've {{ Session::get('user_available_credits') }} Credits @endif</span></a>
                     <div id="loginDropdown" class="dropdown-content">
                        <a href="{{ route(Auth::user()->getUserAccountUrl()) }}">Manage Dashboard</a>
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
                  <a class="nav-link  " href="{{ route('home') }}#aboutjaypad"> JayPad  </a>
               </li>
            </ul>
         </nav>
      </div>
   </div>
   <div id="close_side_menu" class="tooltip"></div>
   <!-- End side menu -->
</header>
<!-- header -->
<br/><br/><br/><br/><br/>
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

        {{--Page--}}
        @yield('content')


<!--copyright-->
<div class="copyright">
   <div class="container">
      <div class="row">
         <div class="col-md-6 text-center " >
            <p class="m-0 py-3"> © 2020  <a href="javascript:void(0)" class="hover-default">JayChannel powered by HealthJay Inc</a>. </p>
         </div>
         <div class="col-md-6 text-center " >
            <p class="m-0 py-3"> <a href="{{ route('show_page') }}/privacy_policy" class="hover-default">Privacy Policy</a> &nbsp; | &nbsp;
               <a href="{{ route('show_page') }}/terms_coditions" class="hover-default"> Terms</a>&nbsp; | &nbsp;
               <a href="{{ route('show_page') }}/accessibility" class="hover-default"> Accessibility</a>&nbsp; | &nbsp;
               <a href="{{ route('show_page') }}/cookie_policy" class="hover-default"> Cookie Policy</a>
            </p>
         </div>
      </div>
   </div>
</div>


        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('assets/app/js/jquery-3.4.1.min.js') }}"></script>

        <!--Bootstrap Core-->
        <script src="{{ asset('assets/app/js/propper.min.js') }}"></script>
        <script src="{{ asset('assets/app/js/bootstrap.min.js') }}"></script>

        <!--to view items on reach-->
        <script src="{{ asset('assets/app/js/jquery.appear.js') }}"></script>

        <!--Owl Slider-->
        <script src="{{ asset('assets/app/js/owl.carousel.min.js') }}"></script>

        <!--number counters-->
        <script src="{{ asset('assets/app/js/jquery-countTo.js') }}"></script>

        <!--Parallax Background-->
        <script src="{{ asset('assets/app/js/parallaxie.js') }}"></script>

        <!--Cubefolio Gallery-->
        <script src="{{ asset('assets/app/js/jquery.cubeportfolio.min.js') }}"></script>

        <!--Fancybox js-->
        <script src="{{ asset('assets/app/js/jquery.fancybox.min.js') }}"></script>

        <!--tooltip js-->
        <script src="{{ asset('assets/app/js/tooltipster.min.js') }}"></script>

        <!--wow js-->
        <script src="{{ asset('assets/app/js/wow.js') }}"></script>

        <!--Revolution SLider-->
        <script src="{{ asset('assets/app/js/jquery.themepunch.tools.min.js') }}"></script>
        <script src="{{ asset('assets/app/js/jquery.themepunch.revolution.min.js') }}"></script>

        <!-- SLIDER REVOLUTION 5.0 EXTENSIONS -->
        <script src="{{ asset('assets/app/js/revolution.extension.actions.min.js') }}"></script>
        <script src="{{ asset('assets/app/js/revolution.extension.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/app/js/revolution.extension.kenburn.min.js') }}"></script>
        <script src="{{ asset('assets/app/js/revolution.extension.layeranimation.min.js') }}"></script>
        <script src="{{ asset('assets/app/js/revolution.extension.migration.min.js') }}"></script>
        <script src="{{ asset('assets/app/js/revolution.extension.navigation.min.js') }}"></script>
        <script src="{{ asset('assets/app/js/revolution.extension.parallax.min.js') }}"></script>
        <script src="{{ asset('assets/app/js/revolution.extension.slideanims.min.js') }}"></script>
        <script src="{{ asset('assets/app/js/revolution.extension.video.min.js') }}"></script>

        <!--custom functions and script-->
        <script src="{{ asset('assets/app/js/functions.js') }}"></script>
        <!--<script src="{{ asset('assets/app/js/slide.js') }}"></script>-->

        <script src="{{ asset('assets/app/dist/good-share.min.js') }}"></script>

        {{--Scripts--}}
        @yield('scripts')
    </body>
</html>
