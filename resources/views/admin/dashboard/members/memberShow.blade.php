@extends('admin.dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-9 col-md-8 col-lg-7 col-xl-6">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> User {{ $user->name }}</div>
                    <div class="card-body">
                        <h4>Name: {{ $user->name }}</h4>
                        <h4>E-mail: {{ $user->email }}</h4>
                        <h4>Mobile No: {{ $user->tel }}</h4>
                        <h4>Address: {{ $user->address }}</h4>
                        <h4>Registered On: <?php echo date('d-M-Y H:i:s', strtotime($user->created_at)); ?></h4>
                        <a href="{{ route('members.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection