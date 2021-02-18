@extends('layouts.app_inner_page')

@section('content')
<br><br><br><br>
<br>
<br>
<br>
<!-- WOrk Process-->
<section id="our-process" class="padding ">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-sm-12 ">
            <hr>
            <h4 class="inline"> &nbsp; <img src="{{ asset('assets/app/images/arrow.PNG') }}" alt="">&nbsp;&nbsp; Shop for Virtual Classes&nbsp;&nbsp;  </h4>
            <h4 class="inline lightcolor padd8" style="width: 70%;">
               &nbsp;<img src="{{ asset('assets/app/images/explore.png') }}" alt="" >
               <form method="POST" name="frmSearch" id="frmSearch" action="{{ route('search_course_by_title') }}" style="padding: 0;margin: 0;display: initial;">
               @csrf
               &nbsp;&nbsp; <input type="text" name="fldSearch" placeholder="what kind of classes are you looking for?" style="width: 90%; border: none;" />
               </form>
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
      <div id="services-filter" class="cbp-l-filters dark bottom30 wow fadeIn d-table mx-auto " data-wow-delay="350ms">
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
         <div data-filter="*" class="cbp-filter-item">
            <span><a href="{{ route('our_services_view_all') }}"><button class="submit">View all</button></a></span>
         </div>
      </div>
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
         {{ $courses->links() }}     
            <!--<div class="cbp-item brand design graphics arts">
               <div class="services-main">
                  <div class="image bottom10">
                     <div class="image">
                        <a href="{{ route('view_course_details') }}">
                        <img alt="SEO" src="{{ asset('assets/app/images/New/cat1.jpg') }}">
                        </a>
                     </div>
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
                     <div class="image">
                        <a href="{{ route('view_course_details') }}">
                        <img alt="SEO" src="{{ asset('assets/app/images/New/cat2.jpg') }}">
                        </a>
                     </div>
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
                     <div class="image">
                        <a href="{{ route('view_course_details') }}">
                        <img alt="SEO" src="{{ asset('assets/app/images/New/cat3.jpg') }}">
                        </a>
                     </div>
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
                     <div class="image">
                        <a href="{{ route('view_course_details') }}">
                        <img alt="SEO" src="{{ asset('assets/app/images/New/cat4.jpg') }}">
                        </a>
                     </div>
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
                     <div class="image">
                        <a href="{{ route('view_course_details') }}">
                        <img alt="SEO" src="{{ asset('assets/app/images/7.PNG') }}">
                        </a>
                     </div>
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
                     <div class="image">
                        <a href="{{ route('view_course_details') }}">
                        <img alt="SEO" src="{{ asset('assets/app/images/8.PNG') }}">
                        </a>
                     </div>
                  </div>
                  <div class="services-content text-center text-md-left">
                     <p class="bottom15">Indian Handmade Art- a Journey Back in History
                        <br><br>
                        Tu,Fr,Dec 12-Feb 5, 2021 11:00AM (EST)
                        <br><br>
                        By <span class="blue">EasterSeals Southern California</span>
                  </div>
               </div>
            </div>
            <div class="cbp-item brand design graphics">
               <div class="services-main">
                  <div class="image bottom10">
                     <div class="image">
                        <a href="{{ route('view_course_details') }}">
                        <img alt="SEO" src="{{ asset('assets/app/images/9.PNG') }}">
                        </a>
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
            <div class="cbp-item brand design graphics">
               <div class="services-main">
                  <div class="image bottom10">
                     <div class="image">
                        <a href="{{ route('view_course_details') }}">
                        <img alt="SEO" src="{{ asset('assets/app/images/10.PNG') }}">
                        </a>
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
            </div>-->
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
            <h4 class="inline">&nbsp; &nbsp; <img src="{{ asset('assets/app/images/arrow.PNG') }}" alt="">&nbsp;&nbsp;  Shop for In-Center Programs </h4>
            <h4 class="inline padd8">&nbsp;&nbsp;<img src="{{ asset('assets/app/images/arrow.PNG') }}" alt="" > &nbsp;&nbsp; what is Hybrid Programming? </h4>
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
         <div class="col-lg-4 offset-lg-1 col-md-5 col-sm-5 " >
            <div class="image"><img alt="SEO" src="{{ asset('assets/app/images/map.PNG') }}"></div>
            <div class="image"><img alt="SEO" src="{{ asset('assets/app/images/New/shop1.jpg') }}"></div>
         </div>
         <div class="col-lg-7 col-md-7 col-sm-7 text-sm-left text-center " >
            <input type="text" class="form-control" id=""  placeholder="What is your zip code?" style="display: none;">
            <div class="heading-title col-md-12 mb-3" style="display: none;">
               <br>
               <p>Providers in your area:</p>
               <span class="blue">Foundations Groups, Maryland
               <button class="button1 button5">Patient </br> Health</button>
               <button class="button1 button5">Memory </br> Care</button>
               <button class="button1 button5">Adult Day</button>
               </span>
               <span class="blue">Active Day, Maryland
               <button class="button1 button5">Patient </br> Health</button>
               <button class="button1 button5">Memory </br> Care</button>
               <button class="button1 button5">Adult Day</button>
               <button class="button1 button5">Home <br> Help</button>
               </span>
               <span class="blue">EasterSeals, Silver Spring, Maryland
               <button class="button1 button5">Patient </br> Health</button>
               <button class="button1 button5">Memory </br> Care</button>
               <button class="button1 button5">Adult Day</button>
               </span>
               <span class="blue">ChairOne Fitness
               <button class="button1 button5">Fitness</button>
               </span>
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
<br>
<br>
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
<br><br><br>
<br>
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

   $( document ).ready(function() {
      //console.log( "ready!" );

      $( "#fldSearchVendor" ).keyup(function() {
         search_nearby_vendor($(this).val());
      });      

      //search_nearby_vendor('');
   });

    $('#frmSearch').keypress((e) => { 
      if (e.which === 13) { 
          $('#frmSearch').submit(); 
      } 
    }); 

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