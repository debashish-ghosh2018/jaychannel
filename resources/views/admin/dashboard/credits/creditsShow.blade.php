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
                      <i class="fa fa-align-justify"></i> Credit: {{ $credit->title }}</div>
                    <div class="card-body">
                        <h4>Title:</h4>
                        <p> {{ $credit->title }}</p>
                        <h4>Content:</h4> 
                        <p>{{ $credit->content }}</p>
                        <h4>Homepage Image:</h4> 
                        <p>
                          @isset($credit->homepage_image)
                          <img src="{{ config('app.url') }}/storage/app/credit_homepage_image/{{ $credit->homepage_image }}" width="150" />
                          @endisset
                        </p>                        
                        <h4>Type:</h4> 
                        <p>{{ $credit->type }}</p>
                        <h4>Amount To Be Charge:</h4>
                        <p>{{ $credit->cost_amount }}</p>
                        <h4>Amount To Be Charge:</h4>
                        <p>{{ $credit->cost_amount }}</p>                        
                        <h4>Points:</h4>
                        <p>{{ $credit->points }}</p>
                        <h4>Is For Sale:</h4>
                        <p>
                            @if ($credit->is_for_sale === 1)
                              Yes
                            @else
                              No
                            @endif
                        </p>
                        <h4>Is Auto Renewable:</h4>
                        <p>
                            @if ($credit->is_auto_renewal === 1)
                              Yes
                            @else
                              No
                            @endif
                        </p>
                        <h4>Status:</h4>
                        <p>
                            @if ($credit->status === 1)
                              Enabled
                            @else
                              Disable
                            @endif
                        </p>                                                                        
                        <a href="{{ route('credits.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
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