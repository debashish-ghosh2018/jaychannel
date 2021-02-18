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
                      <i class="fa fa-align-justify"></i> Subscriber: {{ $subscriber->firstname }} {{ $subscriber->lastname }}</div>
                    <div class="card-body">
                        <!-- <form method="POST" action="{{ route('logout') }}"> 
                          @csrf
                          <button class="btn btn-primary">{{ __('Logout') }}</button>
                        </form>
                        <br> -->
                        <h4>Firstname:</h4>
                        <p> {{ $subscriber->firstname }}</p>
                        <h4>Lastname:</h4> 
                        <p>{{ $subscriber->lastname }}</p>
                        <h4>Email:</h4> 
                        <p>{{ $subscriber->email }}</p> 
                        <h4>Date Of Subscribing:</h4> 
                        <p><?php echo date("d-m-Y H:i:s", strtotime($subscriber->created_at)); ?></p>        
                        <a href="{{ route('subscribers.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
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