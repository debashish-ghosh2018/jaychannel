@extends('admin.dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('Courses') }}</div>
                    <div class="card-body">                     
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Title</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Credit Require</th>
                            <th>Class Size</th>
                            <th>Course Type</th>
                            <th>SignUp By</th>
                            <th>Owner</th>
                            <th>Registration Date</th>                            
                            <!-- <th></th> -->
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($courses as $course)
                            <tr>
                              <td>{{ $course->title }}</td>
                              <td><?php echo date("d-m-Y", strtotime($course->start_date)); ?></td>
                              <td><?php echo date("d-m-Y", strtotime($course->end_date)); ?></td>
                              <td>{{ $course->credits }}</td>
                              <td>{{ $course->class_size }}</td>
                              <td><?php 
                                $content_type = $course->CourseType()->get();
                                if(!empty($content_type[count($content_type) - 1])){
                                  echo $content_type[count($content_type) - 1]->name;
                                }
                              ?></td>
                              <td><?php 
                                $course_booked= $course->coursesBooked()->get();
                                echo count($course_booked);
                              ?></td>   
                              <td><?php 
                                $content_owner = $course->Owner()->get();
                                if(!empty($content_owner[count($content_owner) - 1])){
                                  echo $content_owner[count($content_owner) - 1]->name;
                                }
                              ?></td> 
                              <td><?php echo date('d-M-Y', strtotime($course->created_at)); ?></td>
                              <!-- <td>
                                <a href="{{ url('/admin/courses/' . $course->id) }}" class="btn btn-block btn-primary">View</a>
                              </td> -->
                              <td>
                                <a href="{{ url('/course_details/' . $course->id) }}" target="blank" class="btn btn-block btn-primary">Details</a>
                              </td>                              
                              <td>
                                <a href="{{ url('/admin/courses/' . $course->id . '/edit') }}" class="btn btn-block btn-primary">Edit</a>
                              </td>
                              <td>
                                <form action="{{ route('courses.destroy', $course->id ) }}" method="POST" onClick="return confirm('Do you want to delete this course ?');">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-block btn-danger">Delete</button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection

