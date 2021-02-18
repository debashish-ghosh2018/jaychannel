@extends('admin.dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('Credits') }}</div>
                    <div class="card-body">
                        <!--<div class="row"> 
                          <a href="{{ route('subscribers.create') }}" class="btn btn-primary m-2">{{ __('Add Credit') }}</a>
                        </div>-->
                        <br>
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Date Of Subscribing</th>                            
                            <th></th>
                            <th></th>                            
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($subscribers as $subscriber)
                            <tr>
                              <td><strong>{{ $subscriber->firstname }}</strong></td>
                              <td>{{ $subscriber->lastname }}</td>
                              <td><strong>{{ $subscriber->email }}</strong></td>
                              <td><?php echo date("d-m-Y H:i:s", strtotime($subscriber->created_at)); ?></td>                             
                              <td>
                                <a href="{{ url('/admin/subscribers/' . $subscriber->id) }}" class="btn btn-block btn-primary">View</a>
                              </td>
                              <!--<td>
                                <a href="{{ url('/admin/subscribers/' . $subscriber->id . '/edit') }}" class="btn btn-block btn-primary">Edit</a>
                              </td>-->
                              <td>
                                <form action="{{ route('subscribers.destroy', $subscriber->id ) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-block btn-danger">Delete</button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{ $subscribers->links() }}
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection

