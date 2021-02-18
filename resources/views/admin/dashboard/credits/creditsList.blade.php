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
                        <div class="row"> 
                          <a href="{{ route('credits.create') }}" class="btn btn-primary m-2">{{ __('Add Credit') }}</a>
                        </div>
                        <br>
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Type</th>
                            <th>Amount Charge</th>
                            <th>Points</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                            <th></th>                            
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($credits as $credit)
                            <tr>
                              <td><strong>{{ $credit->title }}</strong></td>
                              <td>{{ $credit->content }}</td>
                              <td><strong>{{ $credit->type }}</strong></td>
                              <td>{{ $credit->cost_amount }}</td>
                              <td>{{ $credit->points }}</td>                              
                              <td>
                                @if ($credit->status == 1)
                                  Enabled
                                @else
                                  Disable
                                @endif
                              </td>
                              <td>
                                <a href="{{ url('/admin/credits/' . $credit->id) }}" class="btn btn-block btn-primary">View</a>
                              </td>
                              <td>
                                <a href="{{ url('/admin/credits/' . $credit->id . '/edit') }}" class="btn btn-block btn-primary">Edit</a>
                              </td>
                              <td>
                                <form action="{{ route('credits.destroy', $credit->id ) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-block btn-danger">Delete</button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{ $credits->links() }}
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection

