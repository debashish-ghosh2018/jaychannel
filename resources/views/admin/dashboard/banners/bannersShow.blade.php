@extends('admin.dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-md-3">
              </div>
              <div class="col-sm-12 col-md-6 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> Banner: {{ $banner->title }}</div>
                    <div class="card-body">
                        <h4>Title:</h4>
                        <p> {{ $banner->title }}</p>
                        <h4>Banner Image:</h4> 
                        <p>
                          @isset($banner->banner_image)
                          <img src="{{ config('app.url') }}/storage/app/banner_image/{{ $banner->banner_image }}" width="90%" />
                          @endisset
                        </p>                        
                        <h4>Status:</h4>
                        <p>
                            @if ($banner->status === 1)
                              Enabled
                            @else
                              Disable
                            @endif
                        </p>                                                                        
                        <a href="{{ route('banners.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                    </div>
                </div>
              </div>
              <div class="col-md-3">
              </div> 
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection