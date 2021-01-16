@extends('layouts.dashboard', [ 'titlePage' => __('Lead Management')])

@section('content')

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('lead.update', ['lead_id' => $lead->id]) }}" autocomplete="off" class="form-horizontal">
            @csrf
            <input name="_method" type="hidden" value="PUT">
            <div class="card ">
              <div class="card-header card-header-primary">
              	<div class=card-details>
                <h4 class="card-title">{{ __('Update Lead') }}</h4>
                <p class="card-category">{{ __('Lead Management') }}</p>
            </div>
                <div class="transfer-btn">
                <a class="btn btn-primary" href="{{ route('lead.transfer', ['lead_id' => $lead->id]) }}">Transfer</a></div>
              </div>
              
               
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                
                    <div class="row">
                    <label class="col-sm-2 col-form-label">Name*</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="Name" required="true" aria-required="true" value="{{ isset($lead) ? $lead->name : old('name') }}"/>
                        @if ($errors->has('name'))
                          <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                    </div>
                </div>
                
              
                 <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email*') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ isset($lead) ? $lead->email : old('email') }}" required />
                      @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Alternate Email') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('alternate_email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('alternate_email') ? ' is-invalid' : '' }}" name="alternate_email" id="input-alternate_email" type="email" placeholder="{{ __('Alternate Email') }}" value="{{ isset($lead) ? $lead->alternate_email : old('alternate_email') }}" />
                      @if ($errors->has('alternate_email'))
                        <span id="alternate_email-error" class="error text-danger" for="input-alternate_email">{{ $errors->first('alternate_email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                  <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Phone*') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                       <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" id="input-phone" type="text" placeholder="{{ __('Phone') }}" value="{{ isset($lead) ? $lead->phone : old('phone') }}" required />
                   
                      @if ($errors->has('phone'))
                        <span id="phone-error" class="error text-danger" >{{ $errors->first('phone') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                
                 <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Alternate Phone') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('alternate_phone') ? ' has-danger' : '' }}">
                       <input class="form-control{{ $errors->has('alternate_phone') ? ' is-invalid' : '' }}" name="alternate_phone" id="input-alternate_phone" type="text" placeholder="{{ __('Alternate Phone') }}" value="{{ isset($lead) ? $lead->alternate_phone : old('alternate_phone') }}" />
                   
                      @if ($errors->has('alternate_phone'))
                        <span id="alternate_phone-error" class="error text-danger" >{{ $errors->first('alternate_phone') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                
                
                
                   <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Contact Owner') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('assign_user') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('assign_user') ? ' is-invalid' : '' }}" name="assign_user"   id="input-assign_user" >
                         <option value="">Please select</option>
                          @foreach($users as $user)
                                        @if($user->email != 'admin@gmail.com')
                                        
                                        <option  {{ (isset($lead->assign_user) && $lead->assign_user == $user->id) ? 'selected' :  ((old('assign_user') == $user->id) ? 'selected' : '')  }}value="{{$user->id}}">{{$user->first_name.' '.$user->last_name}}</option>
                      @endif
                      @endforeach
                      </select>
                      @if ($errors->has('assign_user'))
                        <span id="assign_user-error" class="error text-danger" >{{ $errors->first('assign_user') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
               
               
                       <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('lead_status') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('lead_status') ? ' is-invalid' : '' }}" name="lead_status" id="input-status"  >
                          <option value="">Please select</option>

                             <option {{ (isset($lead->lead_status) && $lead->lead_status == 'Untouched') ? 'selected' :  ((old('lead_status') == 'Untouched') ? 'selected' : '')  }} value="Untouched">Untouched</option>
                            <option {{ (isset($lead->lead_status) && $lead->lead_status == 'ATC1') ? 'selected' :  ((old('lead_status') == 'ATC1') ? 'selected' : '')  }} value="ATC1">ATC 1</option>
                            <option {{ (isset($lead->lead_status) && $lead->lead_status == 'ATC2') ? 'selected' :  ((old('lead_status') == 'ATC2') ? 'selected' : '')  }} value="ATC2">ATC 2</option>
                           <option {{ (isset($lead->lead_status) && $lead->lead_status == 'ATC3') ? 'selected' :  ((old('lead_status') == 'ATC3') ? 'selected' : '')  }} value="ATC3">ATC 3</option>
                           <option {{ (isset($lead->lead_status) && $lead->lead_status == 'contactbutnotprequalify') ? 'selected' :  ((old('lead_status') == 'contactbutnotprequalify') ? 'selected' : '')  }} value="contactbutnotprequalify">Contacted But Not PreQualified</option>
                           <option {{ (isset($lead->lead_status) && $lead->lead_status == 'PreQualified') ? 'selected' :  ((old('lead_status') == 'PreQualified') ? 'selected' : '')  }} value="PreQualified">PreQualified</option>
                           <option {{ (isset($lead->lead_status) && $lead->lead_status == 'Potential') ? 'selected' :  ((old('lead_status') == 'Potential') ? 'selected' : '')  }} value="Potential">Potential</option>
                           <option {{ (isset($lead->lead_status) && $lead->lead_status == 'Closer') ? 'selected' :  ((old('lead_status') == 'Closer') ? 'selected' : '')  }} value="Closer">Closer</option>
                           <option {{ (isset($lead->lead_status) && $lead->lead_status == 'NegativeDuplicate') ? 'selected' :  ((old('lead_status') == 'NegativeDuplicate') ? 'selected' : '')  }} value="NegativeDuplicate">Negative Duplicate</option>
                           <option {{ (isset($lead->lead_status) && $lead->lead_status == 'CouldNotContactWrongNumber') ? 'selected' :  ((old('lead_status') == 'CouldNotContactWrongNumber') ? 'selected' : '')  }} value="CouldNotContactWrongNumber">Could Not Contact - Wrong Number</option>
                           <option {{ (isset($lead->lead_status) && $lead->lead_status == 'CouldNotContactNoResponse') ? 'selected' :  ((old('lead_status') == 'CouldNotContactNoResponse') ? 'selected' : '')  }} value="CouldNotContactNoResponse">Could Not Contact - No Response</option>
                             <option {{ (isset($lead->lead_status) && $lead->lead_status == 'NegativeRelavintProfile') ? 'selected' :  ((old('lead_status') == 'NegativeRelavintProfile') ? 'selected' : '')  }} value="NegativeRelavintProfile">Negative Relavint Profile</option>
                           <option {{ (isset($lead->lead_status) && $lead->lead_status == 'NegativeNonRelavintProfile') ? 'selected' :  ((old('lead_status') == 'NegativeNonRelavintProfile') ? 'selected' : '')  }} value="NegativeNonRelavintProfile">Negative Non Relavint Profile</option>
                              <option {{ (isset($lead->lead_status) && $lead->lead_status == 'NegativeFutureRequirement') ? 'selected' :  ((old('lead_status') == 'NegativeFutureRequirement') ? 'selected' : '')  }} value="NegativeFutureRequirement">Negative Future Requirement</option>

                        </select>
                      @if ($errors->has('lead_status'))
                        <span id="status-error" class="error text-danger" >{{ $errors->first('lead_status') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                 <div class="row">
                  <label class="col-sm-2 col-form-label">Source</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('source') ? ' has-danger' : '' }}">
                       <select class="form-control{{ $errors->has('source') ? ' is-invalid' : '' }}" name="source" id="input-source"  >
                          <option value="">Please select</option>

                                   <option {{ (isset($lead->source) && $lead->source == 'Adwords') ? 'selected' :  ((old('source') == 'Adwords') ? 'selected' : '')  }} value="Adwords">Adwords</option>
    <option {{ (isset($lead->source) && $lead->source == 'Chat') ? 'selected' :  ((old('source') == 'Chat') ? 'selected' : '')  }} value="Chat">Chat</option>
    <option {{ (isset($lead->source) && $lead->source == 'Email') ? 'selected' :  ((old('source') == 'Email') ? 'selected' : '')  }} value="Email">Email</option>
    <option {{ (isset($lead->source) && $lead->source == 'Event') ? 'selected' :  ((old('source') == 'Event') ? 'selected' : '')  }} value="Event">Event</option>
    <option {{ (isset($lead->source) && $lead->source == 'FBAds') ? 'selected' :  ((old('source') == 'FBAds') ? 'selected' : '')  }} value="FBAds">FBAds</option>
    <option {{ (isset($lead->source) && $lead->source == 'InboundCall') ? 'selected' :  ((old('source') == 'InboundCall') ? 'selected' : '')  }} value="InboundCall">Inbound Call</option>
    <option {{ (isset($lead->source) && $lead->source == 'EmailMarketing') ? 'selected' :  ((old('source') == 'EmailMarketing') ? 'selected' : '')  }} value="EmailMarketing">Email Marketing</option>
    <option {{ (isset($lead->source) && $lead->source == 'LinkedinAds') ? 'selected' :  ((old('source') == 'LinkedinAds') ? 'selected' : '')  }} value="LinkedinAds">Linkedin Ads</option>
    <option {{ (isset($lead->source) && $lead->source == 'InstagramAds') ? 'selected' :  ((old('source') == 'InstagramAds') ? 'selected' : '')  }} value="InstagramAds">Instagram Ads</option>
    <option {{ (isset($lead->source) && $lead->source == 'OutboundCall') ? 'selected' :  ((old('source') == 'OutboundCall') ? 'selected' : '')  }} value="OutboundCall">Outbound Call</option>
    <option {{ (isset($lead->source) && $lead->source == 'SEO') ? 'selected' :  ((old('source') == 'SEO') ? 'selected' : '')  }} value="SEO">SEO</option>
    <option {{ (isset($lead->source) && $lead->source == 'Webinar') ? 'selected' :  ((old('source') == 'Webinar') ? 'selected' : '')  }} value="Webinar">Webinar</option>
    <option {{ (isset($lead->source) && $lead->source == 'LeadNurturing') ? 'selected' :  ((old('source') == 'LeadNurturing') ? 'selected' : '')  }} value="LeadNurturing">Lead Nurturing</option>
    <option {{ (isset($lead->source) && $lead->source == 'OrganicSocial') ? 'selected' :  ((old('source') == 'OrganicSocial') ? 'selected' : '')  }} value="OrganicSocial">Organic Social</option>
    <option {{ (isset($lead->source) && $lead->source == 'Partners') ? 'selected' :  ((old('source') == 'Partners') ? 'selected' : '')  }} value="Partners">Partners</option>
    <option {{ (isset($lead->source) && $lead->source == 'DataBulkUpload') ? 'selected' :  ((old('source') == 'DataBulkUpload') ? 'selected' : '')  }} value="DataBulkUpload">Data Bulk Upload</option>
      <option {{ (isset($lead->source) && $lead->source == 'Other') ? 'selected' :  ((old('source') == 'Other') ? 'selected' : '')  }} value="Other">Other</option>
                      
                        </select>
                       @if ($errors->has('source'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('source') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                
                
             <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Gender') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('gender') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" id="input-gender" >
                          <option value="">Please select</option>
                         <option {{ (isset($lead->gender) && $lead->gender == 'male') ? 'selected' :  ((old('gender') == 'male') ? 'selected' : '')  }} value="male">Male</option>
                        <option {{ (isset($lead->gender) && $lead->gender == 'female') ? 'selected' :  ((old('gender') == 'female') ? 'selected' : '')  }} value="female">Female</option>
                        <option {{ (isset($lead->gender) && $lead->gender == 'transGender') ? 'selected' :  ((old('gender') == 'transGender') ? 'selected' : '')  }} value="transGender">TransGender</option>
                               </select>
                      @if ($errors->has('email'))
                        <span id="gender-error" class="error text-danger" >{{ $errors->first('gender') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Date of Birth') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('dob') ? ' has-danger' : '' }}">
                      <input class="datepicker form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" id="birthday_date" type="text" placeholder="{{ __('Date Of Birth') }}" value="{{ isset($lead) ? $lead->dob : old('dob') }}"  autocomplete="off" />
                    
                      @if ($errors->has('dob'))
                        <span id="dob-error" class="error text-danger" >{{ $errors->first('dob') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                
                
                 
                 <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Comment') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('comment') ? ' has-danger' : '' }}">
                       <textarea class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" name="comment" id="input-comment">{{ isset($lead) ? $lead->comment : old('comment') }}</textarea> 
                   
                      @if ($errors->has('comment'))
                        <span id="comment-error" class="error text-danger" >{{ $errors->first('comment') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                
                
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Country') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('country') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}"
                                                    name="country" id="country-dropdown">
                                                <option value="">Please select</option>

                                                @foreach ($countries as $country)
                                                    <option value="{{$country->id}}" {{ (isset($lead->country) && $lead->country == $country->name) ? 'selected' : ((old('country') == $country->name) ? 'selected' : '') }} >
                                                        {{$country->name}}
                                                    </option>
                                                @endforeach

                                            </select>
                                            @if ($errors->has('country'))
                                                <span id="country-error"
                                                      class="error text-danger">{{ $errors->first('country') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('State') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('state') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}"
                                                    name="state" id="state-dropdown">
                                                <option value="">Please select</option>
                                             <option value="{{$lead->state}}" selected>
                                                {{$lead->state}}

                                            </select>
                                            @if ($errors->has('state'))
                                                <span id="state-error"
                                                      class="error text-danger">{{ $errors->first('state') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('City') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('city') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
                                                    name="city" id="city-dropdown">
                                                <option value="">Please select</option>
                                            <option value="{{$lead->city}}" selected>
                                                {{$lead->city}}


                                            </select>
                                            @if ($errors->has('city'))
                                                <span id="city-error"
                                                      class="error text-danger">{{ $errors->first('city') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                
                  <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Hot Lead') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('hot') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('hot') ? ' is-invalid' : '' }}" name="hot" id="input-hot" >
                          <option value="">Please select</option>
                         <option {{ (isset($lead->hot) && $lead->hot == 'yes') ? 'selected' :  ((old('hot') == 'yes') ? 'selected' : '')  }} value="yes">Yes</option>
                        <option {{ (isset($lead->hot) && $lead->hot == 'no') ? 'selected' :  ((old('hot') == 'no') ? 'selected' : '')  }} value="no">No</option>
                           </select>
                      @if ($errors->has('hot'))
                        <span id="hot-error" class="error text-danger" >{{ $errors->first('hot') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                
                  <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Facebook Url') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('facebook_url') ? ' has-danger' : '' }}">
                       <input class="form-control{{ $errors->has('facebook_url') ? ' is-invalid' : '' }}" name="facebook_url" id="input-facebook_url" type="url" placeholder="{{ __('Facebook Url') }}" value="{{ isset($lead) ? $lead->facebook_url : old('facebook_url') }}" />
                   
                      @if ($errors->has('facebook_url'))
                        <span id="facebook_url-error" class="error text-danger" >{{ $errors->first('facebook_url') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
               
                  <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Linkedin Url') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('linkedin_url') ? ' has-danger' : '' }}">
                       <input class="form-control{{ $errors->has('linkedin_url') ? ' is-invalid' : '' }}" name="linkedin_url" id="input-linkedin_url" type="url" placeholder="{{ __('Linkedin Url') }}" value="{{ isset($lead) ? $lead->linkedin_url : old('linkedin_url') }}" />
                   
                      @if ($errors->has('linkedin_url'))
                        <span id="linkedin_url-error" class="error text-danger" >{{ $errors->first('linkedin_url') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
          
              </div>
              <div class="card-footer ml-auto mr-auto">
                  
                  
                 

                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
   </div>
  </div>
@endsection

@section('script')
    <script>

        $(document).ready(function () {
            $('.datepicker').datepicker({format: "yyyy-mm-dd"});


        });


        $(document).ready(function () {
            $('#country-dropdown').on('change', function () {
                var country_id = this.value;
                $("#state-dropdown").html('');
                $.ajax({
                    url: "{{url('get-states-by-country')}}",
                    type: "POST",
                    data: {
                        country_id: country_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state-dropdown').html('<option value="">Select State</option>');
                        $.each(result.states, function (key, value) {
                            $("#state-dropdown").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                        $('#city-dropdown').html('<option value="">Select State First</option>');
                    }
                });
            });
            $('#state-dropdown').on('change', function () {
                var state_id = this.value;
                $("#city-dropdown").html('');
                $.ajax({
                    url: "{{url('get-cities-by-state')}}",
                    type: "POST",
                    data: {
                        state_id: state_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#city-dropdown').html('<option value="">Select City</option>');
                        $.each(result.cities, function (key, value) {
                            $("#city-dropdown").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
         
        });


        $("#country_state_city").submit(function (e) {


            var country = $("#country-dropdown option:selected").text();
            var state = $("#state-dropdown option:selected").text();
            var city = $("#city-dropdown option:selected").text();

            $('#country-dropdown option:selected').val(country);
            $('#state-dropdown option:selected').val(state);
            $('#city-dropdown option:selected').val(city);


        });
    </script>

@endsection



