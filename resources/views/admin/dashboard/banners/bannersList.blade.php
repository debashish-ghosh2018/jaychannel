@extends('admin.dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('Banners') }}</div>
                    <div class="card-body">
                        <div class="row"> 
                          <a href="{{ route('banners.create') }}" class="btn btn-primary m-2">{{ __('Add Banner') }}</a>
                        </div>
                        <br>
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Title</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                            <th></th>                            
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($banners as $banner)
                            <tr>
                              <td><strong>{{ $banner->title }}</strong></td>                             
                              <td>
                                @if ($banner->status == 1)
                                  Enabled
                                @else
                                  Disable
                                @endif
                              </td>
                              <td>
                                <a href="{{ url('/admin/banners/' . $banner->id) }}" class="btn btn-block btn-primary">View</a>
                              </td>
                              <td>
                                <a href="{{ url('/admin/banners/' . $banner->id . '/edit') }}" class="btn btn-block btn-primary">Edit</a>
                              </td>
                              <td>
                                <form action="{{ route('banners.destroy', $banner->id ) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-block btn-danger">Delete</button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{ $banners->links() }}
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection

