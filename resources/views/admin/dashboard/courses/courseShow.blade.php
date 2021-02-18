@extends('admin.dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-9 col-md-8 col-lg-7 col-xl-6">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> Course {{ $course->title }}</div>
                    <div class="card-body">
                        <h5><b>Start Date Time:</b> <?php echo date("d-m-Y", strtotime($course->start_date)) ?> <?php echo date("H:i:s", strtotime($course->start_time)) ?></h5>
                        <h5><b>End Date Time:</b> <?php echo date("d-m-Y", strtotime($course->end_date)) ?> <?php echo date("H:i:s", strtotime($course->end_time)) ?></h5>
                        <br/>
                        <h4><b>Class Days:</b></h4>
                        <h5><b>&nbsp;&nbsp;Monday:</b> @if ($course->day_monday == 1) Yes @endif</h5>
                        <h5><b>&nbsp;&nbsp;Tuesday:</b> @if ($course->day_tuesday == 1) Yes @endif</h5>
                        <h5><b>&nbsp;&nbsp;Wednesday:</b> @if ($course->day_wednesday == 1) Yes @endif</h5>
                        <h5><b>&nbsp;&nbsp;Thursday:</b> @if ($course->day_thursday == 1) Yes @endif</h5>
                        <h5><b>&nbsp;&nbsp;Friday:</b> @if ($course->day_friday == 1) Yes @endif</h5>
                        <h5><b>&nbsp;&nbsp;Saturday:</b> @if ($course->day_saturday == 1) Yes @endif</h5>
                        <h5><b>&nbsp;&nbsp;Sunday:</b> @if ($course->day_sunday == 1) Yes @endif</h5>
                        <br/>
                        <h5><b>Re-occur:</b> @if ($course->re_occur  == 1) Yes @endif</h5> 
                        <h5><b>Credit Require:</b> {{ $course->credits }}</h5>  
                        <h5><b>Class Size:</b> {{ $course->class_size }}</h5> 
                        <h5><b>Join By:</b> {{ $course->join_by }}</h5>

                        <h5><b>Course Type:</b> <?php 
                                $content_type = $course->CourseType()->get();
                                if(!empty($content_type[count($content_type) - 1])){
                                  echo $content_type[count($content_type) - 1]->name;
                                }
                        ?></h5>
                        <h5><b>About Class:</b> {{ $course->about_class }}</h5>
                        <h5><b>Equipment Require:</b> {{ $course->equipment_require }}</h5>
                        <h5><b>Hero Image:</b> @isset($course->hero_image) <img src="{{ config('app.url') }}/storage/app/{{ $course_hero_img_path }}/{{ $course->hero_image }}" width="40%" /> @endisset</h5>
                        <h5><b>Browser Image 1:</b> @isset($course->browser_image_1) <img src="{{ config('app.url') }}/storage/app/{{ $course_browser_1_img_path }}/{{ $course->browser_image_1 }}" width="40%" /> @endisset</h5>
                        <h5><b>Browser Image 2:</b> @isset($course->browser_image_2) <img src="{{ config('app.url') }}/storage/app/{{ $course_browser_2_img_path }}/{{ $course->browser_image_2 }}" width="40%" /> @endisset</h5>
                        <h5><b>Video Clip:</b> @isset($course->video_clip) <a href="{{ config('app.url') }}/storage/app/{{ $course_video_path }}/{{ $course->video_clip }}" target="blank">{{ $course->video_clip }}</a> @endisset</h5>

                        <h5><b>Course SignUp:</b> <?php 
                                $course_booked= $course->coursesBooked()->get();
                                echo count($course_booked);
                        ?></h5>

                        <h5><b>Course Owner:</b> <?php 
                                $content_owner = $course->Owner()->get();
                                if(!empty($content_owner[count($content_owner) - 1])){
                                  echo $content_owner[count($content_owner) - 1]->name;
                                }
                        ?></h5> 
                        <h5><b>Registered On:</b> <?php echo date('d-M-Y', strtotime($course->created_at)); ?></h5>                       

                        <br/>
                        <a href="{{ route('courses.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection