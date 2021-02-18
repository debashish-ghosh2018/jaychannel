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
                      <i class="fa fa-align-justify"></i> Content Type: {{ $content_type->name }}</div>
                    <div class="card-body">
                        <h4>Name:</h4>
                        <p> {{ $content_type->name }}</p>                                                                       
                        <a href="{{ route('content_types.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
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