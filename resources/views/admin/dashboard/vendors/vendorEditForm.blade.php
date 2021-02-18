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
                        <form method="POST" action="{{ url('/admin/vendors') }}/{{ $user->id }}">
                            @csrf
                            @method('PUT')

                            {{ __('User Login Details') }}
                            <hr/>
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
                            <br/><br/><br/>
                            
                            {{ __('Vendor Details') }}
                            <hr/>
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-xs-3">
                                <label>Vendor Name </label>
                              </div>
                              <div class="col-lg-9 col-sm-9 col-xs-9">
                                <input class="form-control custom-file float-right" type="text" placeholder="{{ __('Vendor Name') }}" name="fld_enterprise_name" value="{{ $user_info[0]->enterprise_name }}" required autofocus />
                              </div>
                            </div>
                            <br>                            
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-xs-3">
                                <label>Type of Business </label>
                              </div>
                              <div class="col-lg-9 col-sm-9 col-xs-9">
                                <select class="form-control select inline" name="fld_business_type">
                                   <option value="Adult Day Center" @if ($user_info[0]->business_type == 'Adult Day Center') selected @endif>Adult Day Center</option>
                                   <option value="Senior Community" @if ($user_info[0]->business_type == 'Senior Community') selected @endif>Senior Community</option>
                                   <option value="Care Enterprise" @if ($user_info[0]->business_type == 'Care Enterprise') selected @endif>Care Enterprise</option>
                                </select>                                
                              </div>
                            </div>    
                            <br>                            
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-xs-3">
                                <label>Business Address </label>
                              </div>
                              <div class="col-lg-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control custom-file float-right" name="fld_business_address" placeholder="" value="{{ $user_info[0]->business_address }}" required="" autofocus />
                              </div>
                            </div>    
                            <br>                            
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-xs-3">
                                <label>Business Location </label>
                              </div>
                              <div class="col-lg-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control custom-file float-right" name="fld_business_location" placeholder="" value="{{ $user_info[0]->location }}" required="" />
                              </div>
                            </div>    
                            <br>                            
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-xs-3">
                                <label>Business Zipcode </label>
                              </div>
                              <div class="col-lg-9 col-sm-9 col-xs-9">
                                <input type="number" class="form-control custom-file float-right" name="fld_business_address_zipcode" placeholder="" value="{{ $user_info[0]->business_address_zipcode }}" required="" />
                              </div>
                            </div>    
                            <br>                            
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-xs-3">
                                <label>Client Size </label>
                              </div>
                              <div class="col-lg-9 col-sm-9 col-xs-9">
                                <select class="form-control select inline" name="fld_client_size">
                                   <option value="250" @if ($user_info[0]->client_size == '250') selected @endif>250</option>
                                   <option value="260" @if ($user_info[0]->client_size == '260') selected @endif>260</option>
                                   <option value="270" @if ($user_info[0]->client_size == '270') selected @endif>270</option>
                                   <option value="280" @if ($user_info[0]->client_size == '280') selected @endif>280</option>
                                </select>
                              </div>
                            </div>    
                            <br>                            
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-xs-3">
                                <label>Staff Size </label>
                              </div>
                              <div class="col-lg-9 col-sm-9 col-xs-9">
                                <select class="form-control select inline" name="fld_staff_size">
                                   <option value="25" @if ($user_info[0]->staff_size == '25') selected @endif>25</option>
                                   <option value="26" @if ($user_info[0]->staff_size == '26') selected @endif>26</option>
                                   <option value="27" @if ($user_info[0]->staff_size == '27') selected @endif>27</option>
                                   <option value="28" @if ($user_info[0]->staff_size == '28') selected @endif>28</option>
                                </select>
                              </div>
                            </div>    
                            <br>                            
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-xs-3">
                                <label>Business Time Zone </label>
                              </div>
                              <div class="col-lg-9 col-sm-9 col-xs-9">
                                <select class="form-control select inline" name="fld_business_timezone">
                                   <option value="EST" @if ($user_info[0]->business_timezone == 'EST') selected @endif>EST</option>
                                   <option value="CST" @if ($user_info[0]->business_timezone == 'CST') selected @endif>CST</option>
                                   <option value="PST" @if ($user_info[0]->business_timezone == 'PST') selected @endif>PST</option>
                                </select>
                              </div>
                            </div>    
                            <br>                            
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-xs-3">
                                <label>Business Email for Inquiry </label>
                              </div>
                              <div class="col-lg-9 col-sm-9 col-xs-9">
                                <input type="email" class="form-control custom-file float-right" name="fld_business_email_for_inquiry" value="{{ $user_info[0]->business_email_for_inquiry }}" required="" />
                              </div>
                            </div>    
                            <br>                            
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-xs-3">
                                <label>Business Website </label>
                              </div>
                              <div class="col-lg-9 col-sm-9 col-xs-9">
                                <input type="url" class="form-control custom-file float-right" name="fld_website" value="{{ $user_info[0]->website }}" required="" />
                              </div>
                            </div>    
                            <br>                            
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-xs-3">
                                <label>About your business </label>
                              </div>
                              <div class="col-lg-9 col-sm-9 col-xs-9">
                                <textarea name="fld_about_your_enterprise" class="custom-file form-control" style="min-height: 140px;"
                              rows="4">{{ $user_info[0]->about_your_enterprise }}</textarea>
                              </div>
                            </div>    
                            <br>                            
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-xs-3">
                                <label>Area of Service<br/>(in bullet points) </label>
                              </div>
                              <div class="col-lg-9 col-sm-9 col-xs-9">
                                <textarea name="fld_area_of_service" class="custom-file form-control" rows="3" style="min-height: 100px;">{{ $user_info[0]->area_of_service }}</textarea>
                              </div>
                            </div>    
                            <br>                            
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-xs-3">
                                <label>Services offered </label>
                              </div>
                              <div class="col-lg-3 col-sm-3 col-xs-3 col-3">
                                  <label class="containercheckmark">
                                  <input type="checkbox" class="form-control" name="fld_service_offered_patient_monitoring" value="1" @if ($user_info[0]->service_offered_patient_monitoring == 1) checked @endif />
                                  <span class="checkmark"></span>
                                  <span>Patient Monitoring</span>
                                  </label>
                              </div>
                              <div class="col-lg-3 col-sm-3 col-xs-3 col-3">
                                  <label class="containercheckmark">
                                  <input type="checkbox" class="form-control" name="fld_service_offered_home_health" value="1" @if ($user_info[0]->service_offered_home_health == 1) checked @endif />
                                  <span class="checkmark"></span>
                                  <span>Home Health</span>
                                  </label>
                              </div>
                              <div class="col-lg-3 col-sm-3 col-xs-3 col-3">
                                  <label class="containercheckmark">
                                  <input type="checkbox" class="form-control" name="fld_service_offered_activities" value="1" @if ($user_info[0]->service_offered_activities == 1) checked @endif />
                                  <span class="checkmark"></span>
                                  <span>Activities</span>
                                  </label>
                              </div>                              
                            </div>    
                            <br>  
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-xs-3"></div>
                              <div class="col-lg-3 col-sm-3 col-xs-3 col-3">
                                  <label class="containercheckmark">
                                  <input type="checkbox" class="form-control" name="fld_service_offered_counselling" value="1" @if ($user_info[0]->service_offered_counselling == 1) checked @endif />
                                  <span class="checkmark"></span>
                                  <span>Counselling</span>
                                  </label>
                              </div>
                              <div class="col-lg-3 col-sm-3 col-xs-3 col-3">
                                  <label class="containercheckmark">
                                  <input type="checkbox" class="form-control" name="fld_service_offered_support_group" value="1" @if ($user_info[0]->service_offered_support_group == 1) checked @endif />
                                  <span class="checkmark"></span>
                                  <span>Support Group</span>
                                  </label>
                              </div>
                              <div class="col-lg-3 col-sm-3 col-xs-3 col-3">
                                  <label class="containercheckmark">
                                  <input type="checkbox" class="form-control" name="fld_service_offered_case_management" value="1" @if ($user_info[0]->service_offered_case_management  == 1) checked @endif />
                                  <span class="checkmark"></span>
                                  <span>Case Management</span>
                                  </label>
                              </div>                              
                            </div>    
                            <br>
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-xs-3"></div>
                              <div class="col-lg-3 col-sm-3 col-xs-3 col-3">
                                  <label class="containercheckmark">
                                  <input type="checkbox" class="form-control" name="fld_service_offered_counselling" value="1" @if ($user_info[0]->service_offered_food_nutrition == 1) checked @endif />
                                  <span class="checkmark"></span>
                                  <span>Food & Nutrition</span>
                                  </label>
                              </div>
                              <div class="col-lg-3 col-sm-3 col-xs-3 col-3">
                                  <label class="containercheckmark">
                                  <input type="checkbox" class="form-control" name="fld_service_offered_support_group" value="1" @if ($user_info[0]->service_offered_memory_care == 1) checked @endif />
                                  <span class="checkmark"></span>
                                  <span>Memory Care</span>
                                  </label>
                              </div>
                              <div class="col-lg-3 col-sm-3 col-xs-3 col-3">
                                  <label class="containercheckmark">
                                  <input type="checkbox" class="form-control" name="fld_service_offered_case_management" value="1" @if ($user_info[0]->service_offered_vocational_help  == 1) checked @endif />
                                  <span class="checkmark"></span>
                                  <span>Vocational Help</span>
                                  </label>
                              </div>                              
                            </div>    
                            <br> 
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-xs-3">
                                <label>Membership </label>
                              </div>
                              <div class="col-lg-3 col-sm-3 col-xs-3">
                                  <label class="containercheckmark">
                                  <input type="checkbox" class="form-control" name="fld_membership_in_center" value="1" @if ($user_info[0]->membership_in_center == 1) checked @endif />
                                  <span class="checkmark"></span>
                                  <span>In-center</span>
                                  </label>
                              </div>
                              <div class="col-lg-3 col-sm-3 col-xs-3">
                                  <label class="containercheckmark">
                                  <input type="checkbox" class="form-control" name="fld_membership_virtual" value="1" @if ($user_info[0]->membership_virtual == 1) checked @endif />
                                  <span class="checkmark"></span>
                                  <span>Virtual</span>
                                  </label>
                              </div>
                              <div class="col-lg-3 col-sm-3 col-xs-3">
                                  <label class="containercheckmark">
                                  <input type="checkbox" class="form-control" name="fld_membership_hybrid" value="1" @if ($user_info[0]->membership_hybrid == 1) checked @endif />
                                  <span class="checkmark"></span>
                                  <span>Hybrid</span>
                                  </label>
                              </div>
                            </div>    
                            <br>                            
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-xs-3">
                                <label>Business logo </label>
                              </div>
                              <div class="col-lg-9 col-sm-9 col-xs-9">
                                <input type="file" class="file" name="fld_logo" id="fld_logo" accept="image/*" /><br/>
                                @isset($user_info[0]->logo)
                                <img src="{{ config('app.url') }}/storage/app/{{ $user_logo_path }}/{{ $user_info[0]->logo }}" width="40%" />
                                @endisset
                              </div>
                            </div>    
                            <br>                            
                            <div class="row">
                              <div class="col-lg-6 col-sm-6 col-xs-6">
                                <label><b>Contact Person</b> </label>
                              </div>
                              <div class="col-lg-6 col-sm-6 col-xs-6">
                              </div>
                            </div>    
                            <br>                            
                            <div class="row">
                              <div class="col-lg-2 col-sm-2 col-xs-2">
                                <label>First Name </label>
                              </div>
                              <div class="col-lg-10 col-sm-10 col-xs-10">
                                <input type="text" class="form-control custom-file float-right" name="fld_contact_person_firstname" value="{{ $user_info[0]->contact_person_firstname }}" required />
                              </div>
                            </div>    
                            <br>                            
                            <div class="row">
                              <div class="col-lg-2 col-sm-2 col-xs-2">
                                <label>Last Name </label>
                              </div>
                              <div class="col-lg-10 col-sm-10 col-xs-10">
                                <input type="text" class="form-control custom-file float-right" name="fld_contact_person_lastname" value="{{ $user_info[0]->contact_person_lastname }}" required />
                              </div>
                            </div>    
                            <br>                            
                            <div class="row">
                              <div class="col-lg-2 col-sm-2 col-xs-2">
                                <label>Position </label>
                              </div>
                              <div class="col-lg-10 col-sm-10 col-xs-10">
                                <input type="text" class="form-control custom-file float-right" name="fld_contact_person_position" value="{{ $user_info[0]->contact_person_position }}" required />
                              </div>
                            </div>    
                            <br>                            
                            <div class="row">
                              <div class="col-lg-2 col-sm-2 col-xs-2">
                                <label>Direct Line </label>
                              </div>
                              <div class="col-lg-10 col-sm-10 col-xs-10">
                                <input type="tel" class="form-control custom-file float-right" name="fld_contact_person_direct_line" value="{{ $user_info[0]->contact_person_direct_line }}" required />
                              </div>
                            </div>    
                            <br>                            
                            <div class="row">
                              <div class="col-lg-2 col-sm-2 col-xs-2">
                                <label>Email </label>
                              </div>
                              <div class="col-lg-10 col-sm-10 col-xs-10">
                                <input type="email" class="form-control custom-file float-right" name="fld_contact_person_email" value="{{ $user_info[0]->contact_person_email }}" required />
                              </div>
                            </div>    
                            <br>  

                            <button class="btn btn-block btn-success" type="submit">{{ __('Save') }}</button>
                            <a href="{{ route('vendors.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a> 
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