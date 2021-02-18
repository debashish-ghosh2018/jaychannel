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
                        <h5><b>Name:</b> {{ $user->name }}</h5>
                        <h5><b>E-mail:</b> {{ $user->email }}</h5>
                        <h5><b>Mobile No:</b> {{ $user->tel }}</h5>
                        <h5><b>Address:</b> {{ $user->address }}</h5>
                        <br/><br/>
                        <h2>Vendor Details</h2><hr/>
                        <br/>
                        <h5><b>Vendor Name:</b> {{ $user_info[0]->enterprise_name }}</h5>
                        <h5><b>Type of Business:</b> {{ $user_info[0]->business_type }}</h5>
                        <h5><b>Business Address:</b> {{ $user_info[0]->business_address }}</h5>
                        <h5><b>Business Location:</b> {{ $user_info[0]->location }}</h5>
                        <h5><b>Business Zipcode:</b> {{ $user_info[0]->business_address_zipcode }}</h5>
                        <h5><b>Client Size:</b> {{ $user_info[0]->client_size }}</h5>
                        <h5><b>Staff Size:</b> {{ $user_info[0]->staff_size }}</h5>
                        <h5><b>Business Time Zone:</b> {{ $user_info[0]->business_timezone }}</h5>
                        <h5><b>Business Email for Inquiry:</b> {{ $user_info[0]->business_email_for_inquiry }}</h5>
                        <h5><b>Business Website:</b> {{ $user_info[0]->website }}</h5>
                        <h5><b>About your business:</b> {{ $user_info[0]->about_your_enterprise }}</h5>
                        <h5><b>Area of Service:</b> {{ $user_info[0]->area_of_service }}</h5>
                        <br/>
                        <h4><b>Services offered:</b></h4>
                        <h5><b>&nbsp;&nbsp;Patient Monitoring:</b> @if ($user_info[0]->service_offered_patient_monitoring == 1) Yes @endif</h5>
                        <h5><b>&nbsp;&nbsp;Home Health:</b> @if ($user_info[0]->service_offered_home_health == 1) Yes @endif</h5>
                        <h5><b>&nbsp;&nbsp;Activities:</b> @if ($user_info[0]->service_offered_activities == 1) Yes @endif</h5>
                        <h5><b>&nbsp;&nbsp;Counselling:</b> @if ($user_info[0]->service_offered_counselling == 1) Yes @endif</h5>
                        <h5><b>&nbsp;&nbsp;Support Group:</b> @if ($user_info[0]->service_offered_support_group == 1) Yes @endif</h5>
                        <h5><b>&nbsp;&nbsp;Case Management:</b> @if ($user_info[0]->service_offered_case_management  == 1) Yes @endif</h5>
                        <h5><b>&nbsp;&nbsp;Food & Nutrition:</b> @if ($user_info[0]->service_offered_food_nutrition == 1) Yes @endif</h5>
                        <h5><b>&nbsp;&nbsp;Memory Care:</b> @if ($user_info[0]->service_offered_memory_care == 1) Yes @endif</h5>
                        <h5><b>&nbsp;&nbsp;Vocational Help:</b> @if ($user_info[0]->service_offered_vocational_help  == 1) Yes @endif</h5>

                        <br/>
                        <h4><b>Membership:</b></h4>                        
                        <h5><b>&nbsp;&nbsp;In-center:</b> @if ($user_info[0]->membership_in_center == 1) Yes @endif</h5>
                        <h5><b>&nbsp;&nbsp;Virtual:</b> @if ($user_info[0]->membership_virtual == 1) Yes @endif</h5>
                        <h5><b>&nbsp;&nbsp;Hybrid:</b> @if ($user_info[0]->membership_hybrid == 1) Yes @endif</h5>


                        <h5><b>Business logo:</b> @isset($user_info[0]->logo) <img src="{{ config('app.url') }}/storage/app/{{ $user_logo_path }}/{{ $user_info[0]->logo }}" width="40%" /> @endisset</h5>

                        <br/>
                        <h4><b>Contact Person:</h4>                        
                        <h5><b>&nbsp;&nbsp;First Name:</b> {{ $user_info[0]->contact_person_firstname }}</h5>
                        <h5><b>&nbsp;&nbsp;Last Name:</b> {{ $user_info[0]->contact_person_lastname }}</h5>
                        <h5><b>&nbsp;&nbsp;Position:</b> {{ $user_info[0]->contact_person_position }}</h5>
                        <h5><b>&nbsp;&nbsp;Direct Line:</b> {{ $user_info[0]->contact_person_direct_line }}</h5>
                        <h5><b>&nbsp;&nbsp;Email:</b> {{ $user_info[0]->contact_person_email }}</h5>

                        <h5><b>Registered On:</b> <?php echo date('d-M-Y H:i:s', strtotime($user->created_at)); ?></h5>
                        <br/>
                        <a href="{{ route('vendors.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection