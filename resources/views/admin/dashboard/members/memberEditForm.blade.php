@extends('admin.dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-10 col-md-9 col-lg-8 col-xl-7">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> {{ __('Edit') }} {{ $user->name }}</div>
                    <div class="card-body">
                        <br>
                        <form method="POST" action="{{ url('/admin/members') }}/{{ $user->id }}">
                            @csrf
                            @method('PUT')

                            <div class="row">
                              <div class="col-lg-2 col-sm-2 col-xs-2">
                                <label>Name </label>
                              </div>
                              <div class="col-lg-10 col-sm-10 col-xs-10">
                                <input class="form-control custom-file float-right" type="text" placeholder="{{ __('Name') }}" name="name" value="{{ $user->name }}" required autofocus />
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-lg-2 col-sm-2 col-xs-2">
                                <label class="inline">Address </label>
                              </div>
                              <div class="col-lg-10 col-sm-10 col-xs-10">
                                <input type="text" class="form-control custom-file float-right" name="address" placeholder="{{ __('Address') }}" value="{{ $user->address }}" required />
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-lg-2 col-sm-2 col-xs-2">
                                <label class="inline">Tel </label>
                              </div>
                              <div class="col-lg-10 col-sm-10 col-xs-10">
                                <input type="tel" class="form-control custom-file float-right" name="tel" placeholder="{{ __('Tel') }}" value="{{ $user->tel }}" required />
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-lg-2 col-sm-2 col-xs-2">
                                <label class="inline">Email </label>
                              </div>
                              <div class="col-lg-10 col-sm-10 col-xs-10">
                                <input type="email" class="form-control custom-file float-right" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ $user->email }}" required />
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-lg-2 col-sm-2 col-xs-2">
                                <label class="inline">Password </label>
                              </div>
                              <div class="col-lg-10 col-sm-10 col-xs-10">
                                <input class="form-control custom-file float-right" type="password" placeholder="{{ __('Password') }}" name="password" />
                              </div>
                            </div>
                            <br>

                            <button class="btn btn-block btn-success" type="submit">{{ __('Save') }}</button>
                            <a href="{{ route('members.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a> 
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