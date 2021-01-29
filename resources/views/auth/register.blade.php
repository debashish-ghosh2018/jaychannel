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
              <a class="nav-link" href="#">Ways we care</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">How it works</a>
            </li>
            <li class="nav-item dropdown static">
              <a class="nav-link  " href="#"> JayPad </a>
            </li>
            <li class="nav-item ">
              <a onclick="signin()" class="nav-link dropbtn">Sign in</a>
              <div id="loginDropdown" class="dropdown-content">
                <a href="{{ route('member_login') }}">I'm a Member</a>
                <a href="{{ route('enterprise_login') }}">I'm an Enterprise</a>
                <a href="{{ route('signinvendor_login') }}">I'm a Vendor</a>
              </div>
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
              <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact Us</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="#">Products</a></li>
          </ul>
        </nav>
      </div>
    </div>
    <div id="close_side_menu" class="tooltip"></div>
    <!-- End side menu -->
  </header>
  <!-- header -->

  <!-- section -->
  <br><br><br><br><br>
  <section id="main-banner-page" class="position-relative page-header contact-header section-nav-smooth parallax" style="background-image: url('{{ asset('assets/app/images/userbg.png') }}'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; background-position: center -68.85px;height: 500px; display: none;">
    <div class="container">
      <div class="row1">
      </div>
    </div>
  </section>

  <!--Some Feature -->
  <section id="our-feature" class="single-feature padding">
    <div class="container ">
      <div class="row d-flex ">
        <div class="col-lg-8 col-md-7 col-sm-7 text-sm-left text-center wow" data-wow-delay="300ms">
          <div class="heading-title col-md-12 mb-3">
            <h4> &nbsp; &nbsp; <img src="{{ asset('assets/app/images/arrow.PNG') }}" alt="" width="25px" height="25px">&nbsp; &nbsp; {{ __('Register') }}</h4>
            <br>
            <br>
            <div class="notification-box">
               @if(Session::has('success_message'))
               <div class="alert alert-success" role="alert">
                  {{ Session::get('success_message') }}
               </div>
               @endif

               @if(Session::has('error_message'))
               <div class="alert alert-danger" role="alert">
                  {{ Session::get('error_message') }}
               </div>
               @endif


            </div>
            <form method="POST" action="{{ route('register_user') }}">
              @csrf
              <div class="row">
                <div class="col-lg-2 col-sm-2 col-xs-2">
                  <label>Name </label>
                </div>
                <div class="col-lg-10 col-sm-10 col-xs-10">
                  <input class="form-control custom-file float-right" type="text" placeholder="{{ __('Name') }}" name="name" value="{{ old('name') }}" required autofocus />
                  <label class="error">{{ $errors->first('name') }}</label>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-lg-2 col-sm-2 col-xs-2">
                  <label class="inline">Address </label>
                </div>
                <div class="col-lg-10 col-sm-10 col-xs-10">
                  <input type="text" class="form-control custom-file float-right" name="address" placeholder="{{ __('Address') }}" required />
                  <label class="error">{{ $errors->first('address') }}</label>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-lg-2 col-sm-2 col-xs-2">
                  <label class="inline">Tel </label>
                </div>
                <div class="col-lg-10 col-sm-10 col-xs-10">
                  <input type="tel" class="form-control custom-file float-right" name="tel" placeholder="{{ __('Tel') }}" required />
                  <label class="error">{{ $errors->first('tel') }}</label>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-lg-2 col-sm-2 col-xs-2">
                  <label class="inline">Email </label>
                </div>
                <div class="col-lg-10 col-sm-10 col-xs-10">
                  <input type="email" class="form-control custom-file float-right" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required />
                  <label class="error">{{ $errors->first('email') }}</label>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-lg-2 col-sm-2 col-xs-2">
                  <label class="inline">User Type </label>
                </div>
                <div class="col-lg-10 col-sm-10 col-xs-10">
                  <select class="form-control custom-file float-right" name="user_type">
                      <option value="Member">Member</option>
                      <option value="Vendor">Vendor</option>
                      <option value="Enterprise">Enterprise</option>                      
                  </select>
                  <label class="error">{{ $errors->first('user_type') }}</label>
                </div>
              </div> 
              <br>
              <div class="row">
                <div class="col-lg-2 col-sm-2 col-xs-2">
                  <label class="inline">Password </label>
                </div>
                <div class="col-lg-10 col-sm-10 col-xs-10">
                  <input class="form-control custom-file float-right" type="password" placeholder="{{ __('Password') }}" name="password" required />
                  <label class="error">{{ $errors->first('password') }}</label>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-lg-2 col-sm-2 col-xs-2">
                  <label class="inline">Confirm Password </label>
                </div>
                <div class="col-lg-10 col-sm-10 col-xs-10">
                  <input class="form-control custom-file float-right" type="password" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required />
                </div>
                <label class="error">{{ $errors->first('password_confirmation') }}</label>
              </div>                                         
              <br>
              <br>
              <br>
              <button class="submit" type="submit">{{ __('Register') }}</button>              
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--  -->
  </section>
  <br>
  <br>
  <br>
  <br>
  <!--copyright-->
  <div class="copyright">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-center wow fadeIn animated" data-wow-delay="300ms">
          <p class="m-0 py-3"> © 2020 <a href="javascript:void(0)" class="hover-default">JayChannel powered by HealthJay Inc</a>. </p>
        </div>
        <div class="col-md-6 text-center wow fadeIn animated" data-wow-delay="300ms">
          <p class="m-0 py-3"> <a href="javascript:void(0)" class="hover-default">Privacy Policy</a> &nbsp; | &nbsp;
            <a href="javascript:void(0)" class="hover-default"> Terms</a>&nbsp; | &nbsp;
            <a href="javascript:void(0)" class="hover-default"> Accessibility</a>&nbsp; | &nbsp;
            <a href="javascript:void(0)" class="hover-default"> Cookie Policy</a>
          </p>
        </div>
      </div>
    </div>
  </div>




    <!-- <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card mx-4">
            <div class="card-body p-4">
                <form method="POST" action="{{ route('register_user') }}">
                    @csrf
                    <h1>{{ __('Register') }}</h1>
                    <p class="text-muted">Create your account</p>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-user"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" type="text" placeholder="{{ __('Name') }}" name="name" value="{{ old('name') }}" required autofocus>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-envelope-open"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" type="text" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" type="password" placeholder="{{ __('Password') }}" name="password" required>
                    </div>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" type="password" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required>
                    </div>
                    <button class="btn btn-block btn-success" type="submit">{{ __('Register') }}</button>
                </form>
            </div>
            <div class="card-footer p-4">
              <div class="row">
                <div class="col-6">
                  <button class="btn btn-block btn-facebook" type="button">
                    <span>facebook</span>
                  </button>
                </div>
                <div class="col-6">
                  <button class="btn btn-block btn-twitter" type="button">
                    <span>twitter</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>-->

@endsection

@section('javascript')

@endsection