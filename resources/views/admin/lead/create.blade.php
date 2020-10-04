@extends('layouts.dashboard', [ 'titlePage' => __('Lead')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('lead.store') }}" autocomplete="off" class="form-horizontal">
            @csrf

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Lead') }}</h4>
                <p class="card-category">{{ __('Lead Management') }}</p>
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
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="Name" required="true" aria-required="true" value="{{ old('name') }}"/>
                        @if ($errors->has('name'))
                          <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                
                
                 <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required />
                      @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Gender') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('gender') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" id="input-gender" required >
                          <option value="">Please select</option>
                          <option {{ old('gender') == 'male' ? 'selected' : '' }} value="male">Male</option>
                          <option {{ old('gender') == 'female' ? 'selected' : '' }} value="female">Female</option>
                          <option {{ old('gender') == 'transGender' ? 'selected' : '' }} value="transGender">TransGender</option>
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
                      <input class="datepicker form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" id="birthday_date" type="text" placeholder="{{ __('Date Of Birth') }}" value="{{ old('dob') }}" required autocomplete="off" />
                    
                      @if ($errors->has('dob'))
                        <span id="dob-error" class="error text-danger" >{{ $errors->first('dob') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                 <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Phone') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                       <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" id="input-phone" type="text" placeholder="{{ __('Phone') }}" value="{{ old('phone') }}" required />
                   
                      @if ($errors->has('phone'))
                        <span id="phone-error" class="error text-danger" >{{ $errors->first('phone') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">Source</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('source') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('source') ? ' is-invalid' : '' }}" name="source" id="input-source" type="text" placeholder="Source" required="true" aria-required="true" value="{{ old('source') }}"/>
                      @if ($errors->has('source'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('source') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                
                       <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('lead_status') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('lead_status') ? ' is-invalid' : '' }}" name="lead_status" id="input-status" required >
                          <option value="">Please select</option>
                          <option {{ old('initial') == 'initial' ? 'selected' : '' }} value="initial">Initial</option>
                          <option {{ old('followup') == 'followup' ? 'selected' : '' }} value="followup">Follow Up</option>
                          <option {{ old('oncall') == 'oncall' ? 'selected' : '' }} value="oncall">On Call</option>
                    </select>
                      @if ($errors->has('lead_status'))
                        <span id="status-error" class="error text-danger" >{{ $errors->first('lead_status') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Assign Member') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('assign_user') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('assign_user') ? ' is-invalid' : '' }}" name="assign_user"   id="input-assign_user" >
                         <option value="">Please select</option>
                          @foreach($users as $user)
                                        @if($user->email != 'admin@gmail.com')
                                        
                                        <option value="{{$user->id}}">{{$user->first_name.' '.$user->last_name}}</option>
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
                  <label class="col-sm-2 col-form-label">{{ __('Comment') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('comment') ? ' has-danger' : '' }}">
                       <textarea class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" name="comment" id="input-comment">{{ old('phone') }}</textarea> 
                   
                      @if ($errors->has('comment'))
                        <span id="comment-error" class="error text-danger" >{{ $errors->first('comment') }}</span>
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
        $(document).ready(function(){
            $('.datepicker').datepicker({ format:"yyyy-mm-dd" });

          
        });
    </script>

@endsection



