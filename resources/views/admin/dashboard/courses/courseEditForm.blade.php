@extends('admin.dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-10 col-md-9 col-lg-8 col-xl-7">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> {{ __('Edit') }} {{ $course->title }}</div>
                    <div class="card-body">
                        <br>
                        <form method="POST" action="{{ url('/admin/courses') }}/{{ $course->id }}">
                            @csrf
                            @method('PUT')

                            <div class="row">
                              <div class="col-lg-2 col-sm-2 col-xs-2">
                                <label>Title </label>
                              </div>
                              <div class="col-lg-10 col-sm-10 col-xs-10">
                                <input type="text" class="form-control custom-file float-right" name="fld_title" value="{{ $course->title }}" placeholder="" required />
                              </div>
                            </div>
                            <br>
                            <div class="row ">
                               <div class="col-lg-2 col-6 text-left">
                                  <label>Start Date</label>
                               </div>
                               <div class="col-lg-3 col-12">
                                  <input type="date" class="form-control custom-file float-right" name="fld_start_date" value="{{ $course->start_date }}" placeholder="" required />
                               </div>
                               <div class="col-lg-2 col-6 text-center" style="align-self: center;">
                                  <label>End Date</label>
                               </div>
                               <div class="col-lg-3 col-12">
                                  <input type="date" class="form-control custom-file float-right" name="fld_end_date" value="{{ $course->end_date }}" placeholder="" required />
                               </div>
                            </div>
                            <br>
                            <div class="row ">
                               <div class="col-lg-2 col-6 text-left">
                                  <label>Start Time</label>
                               </div>
                               <div class="col-lg-3 col-12">
                                  <input type="time" class="form-control custom-file float-right" name="fld_start_time" value="{{ $course->start_time }}" placeholder="" required />
                               </div>
                               <div class="col-lg-2 col-6 text-center" style="align-self: center;">
                                  <label>End Time</label>
                               </div>
                               <div class="col-lg-3 col-12">
                                  <input type="time" class="form-control custom-file float-right" name="fld_end_time" value="{{ $course->end_time }}" placeholder="" required />
                               </div>
                               <div class="col-lg-2 col-12">
                               </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-lg-2 col-sm-2 col-xs-2">
                                <label class="inline">Course Days</label>
                              </div>
                              <div class="col-lg-3 col-sm-3 col-xs-3 col-3">
                                <label class="containercheckmark">
                                <input type="checkbox" class="form-control" name="fld_day_monday" value="1" @if ($course->day_monday == 1) checked @endif />
                                <span class="checkmark"></span>
                                <span>Monday</span>
                                </label>
                              </div>
                              <div class="col-lg-3 col-sm-3 col-xs-3 col-3">
                                <label class="containercheckmark">
                                <input type="checkbox" class="form-control" name="fld_day_tuesday" value="1" @if ($course->day_tuesday == 1) checked @endif />
                                <span class="checkmark"></span>
                                <span>Tuesday</span>
                                </label>
                              </div>
                              <div class="col-lg-3 col-sm-3 col-xs-3 col-3">
                                <label class="containercheckmark">
                                <input type="checkbox" class="form-control" name="fld_day_wednesday" value="1" @if ($course->day_wednesday == 1) checked @endif />
                                <span class="checkmark"></span>
                                <span>Wednesday</span>
                                </label>
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-lg-2 col-sm-2 col-xs-2">

                              </div>
                              <div class="col-lg-3 col-sm-3 col-xs-3 col-3">
                                <label class="containercheckmark">
                                <input type="checkbox" class="form-control" name="fld_day_thursday" value="1" @if ($course->day_thursday == 1) checked @endif />
                                <span class="checkmark"></span>
                                <span>Thursday</span>
                                </label>
                              </div>
                              <div class="col-lg-3 col-sm-3 col-xs-3 col-3">
                                <label class="containercheckmark">
                                <input type="checkbox" class="form-control" name="fld_day_friday" value="1" @if ($course->day_friday == 1) checked @endif />
                                <span class="checkmark"></span>
                                <span>Friday</span>
                                </label>
                              </div>
                              <div class="col-lg-3 col-sm-3 col-xs-3 col-3">
                                <label class="containercheckmark">
                                <input type="checkbox" class="form-control" name="day_saturday" value="1" @if ($course->day_saturday == 1) checked @endif />
                                <span class="checkmark"></span>
                                <span>Saturday</span>
                                </label>
                              </div>
                            </div>
                            <br>                            
                            <div class="row">
                              <div class="col-lg-2 col-sm-2 col-xs-2">

                              </div>
                              <div class="col-lg-3 col-sm-3 col-xs-3 col-3">
                                <label class="containercheckmark">
                                <input type="checkbox" class="form-control" name="fld_day_sunday" value="1" @if ($course->day_sunday == 1) checked @endif />
                                <span class="checkmark"></span>
                                <span>Sunday</span>
                                </label>
                              </div>
                              <div class="col-lg-3 col-sm-3 col-xs-3 col-3">
                              </div>
                              <div class="col-lg-3 col-sm-3 col-xs-3 col-3">
                              </div>
                            </div>
                            <br> 
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-xs-3">
                                <label>Re-occur </label>
                              </div>
                              <div class="col-lg-9 col-sm-9 col-xs-9">
                                <input type="checkbox" checked="checked" name="fld_re_occur" value="1" @if ($course->re_occur == 1) checked @endif />
                              </div>
                            </div>
                            <br>                            
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-xs-3">
                                <label>Credits </label>
                              </div>
                              <div class="col-lg-9 col-sm-9 col-xs-9">
                                <select class="form-control select inline" name="fld_credits">
                                  @for ($i = 1; $i <= 100; $i++)
                                   <option value="{{ $i }}" @if ($course->credits == $i) selected @endif>{{ $i }}</option>
                                  @endfor
                                </select>                                
                              </div>
                            </div>    
                            <br>                            
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-xs-3">
                                <label>Class Size </label>
                              </div>
                              <div class="col-lg-9 col-sm-9 col-xs-9">
                                <select class="form-control select inline" name="fld_class_size">
                                  @for ($i = 1; $i <= 101; $i = $i+10)
                                   <option value="{{ $i }}" @if ($course->class_size == $i) selected @endif>{{ $i }}</option>
                                  @endfor
                                </select>
                              </div>
                            </div>    
                            <br>                            
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-xs-3">
                                <label>Join by default </label>
                              </div>
                              <div class="col-lg-9 col-sm-9 col-xs-9">
                                <select class="form-control select inline" name="fld_join_by">
                                   <option value="Audio" @if ($course->join_by == 'Audio') selected @endif>Audio</option>
                                   <option value="Video" @if ($course->credits == 'Video') selected @endif>Video</option>
                                </select>
                              </div>
                            </div>    
                            <br>                            
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-xs-3">
                                <label>Content Type </label>
                              </div>
                              <div class="col-lg-9 col-sm-9 col-xs-9">
                                <select class="form-control select inline" name="fld_content_type">
                                   @foreach ($content_types as $content_type)
                                   <option value="{{ $content_type->id }}" @if ($course->content_type_id == $content_type->id) selected @endif>{{ $content_type->name }}</option>
                                   @endforeach
                                </select>
                              </div>
                            </div>    
                            <br>                            
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-xs-3">
                                <label>About the class </label>
                              </div>
                              <div class="col-lg-9 col-sm-9 col-xs-9">
                                <p class="formfield">
                                   <textarea id="textarea" class="custom-file form-control mb-2" style="min-height: 140px;" rows="4" name="fld_about_class" required="">{{ $course->about_class }}</textarea>
                                   <span style="float: right;">60 words</span>
                                </p>
                              </div>
                            </div>    
                            <br>                            
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-xs-3">
                                <label>Equipment requirement </label>
                              </div>
                              <div class="col-lg-9 col-sm-9 col-xs-9">
                                <p class="formfield">
                                   <textarea id="textarea" class="custom-file form-control mb-2" rows="3" style="min-height: 80px;" name="fld_equipment_require" required="">{{ $course->equipment_require }}</textarea>
                                   <span style="float: right;">20 words</span>
                                </p>
                              </div>
                            </div>    
                            <br>                            
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-xs-3">
                                <label>Upload hero image </label>
                              </div>
                              <div class="col-lg-9 col-sm-9 col-xs-9">
                                 <input type="file" class="custom-file-input" name="fld_hero_image" id="fld_hero_image" accept="image/x-png,image/gif,image/jpeg" />     
                                 @isset($course->hero_image)
                                 <img src="{{ config('app.url') }}/storage/app/{{ $course_hero_img_path }}/{{ $course->hero_image }}" width="50" /></div></br></br></br>
                                 @endisset 
                              </div>
                            </div>    
                            <br>                            
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-xs-3">
                                <label>Upload browse images </label>
                              </div>
                              <div class="col-lg-9 col-sm-9 col-xs-9">
                                 <input type="file" class="custom-file-input" name="fld_browser_image_1" id="fld_browser_image_1" accept="image/x-png,image/gif,image/jpeg" />
                                 @isset($course->browser_image_1)
                                 <img src="{{ config('app.url') }}/storage/app/{{ $course_browser_1_img_path }}/{{ $course->browser_image_1 }}" width="50" /></br></br></br>
                                 @endisset
                              </div>
                            </div>    
                            <br>                            
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-xs-3">
                              </div>
                              <div class="col-lg-9 col-sm-9 col-xs-9">
                                 <input type="file" class="custom-file-input" name="fld_browser_image_2" id="fld_browser_image_2" accept="image/jpeg" />
                                 @isset($course->browser_image_1)
                                 <img src="{{ config('app.url') }}/storage/app/{{ $course_browser_2_img_path }}/{{ $course->browser_image_2 }}" width="50" /></br></br></br>
                                 @endisset
                              </div>
                            </div>    
                            <br>                            
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-xs-3">
                                <label>Upload video clip </label>
                              </div>
                              <div class="col-lg-9 col-sm-9 col-xs-9">
                                 <input type="file" class="custom-file-input" name="fld_video_clip" id="fld_video_clip" accept="video/*" />
                                 @isset($course->video_clip)
                                 <a href="{{ config('app.url') }}/storage/app/{{ $course_video_path }}/{{ $course->video_clip }}" target="blank"><b>{{ $course->video_clip }}</b></a></br></br></br>
                                 @endisset 
                              </div>
                            </div>    
                            <br> 

                            <button class="btn btn-block btn-success" type="submit">{{ __('Save') }}</button>
                            <a href="{{ route('courses.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a> 
                        </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection

@section('javascript')

@endsection