@extends('layouts.dashboard', [ 'titlePage' => __('User Profile')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <form method="post" action="{{ route('user.update', ['user' => $user]) }}" autocomplete="off"
                  class="form-horizontal">
                @csrf
                <input name="_method" type="hidden" value="PUT">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">


                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Basic Information</h4>
                                <p class="card-category">Basic Information</p>
                            </div>


                            <div class="card-body ">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Firstname</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('first_name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                   name="first_name" id="input-name" type="text"
                                                   placeholder="First Name" required="true"
                                                   aria-required="true"
                                                   value="{{ isset($user->first_name) ? $user->first_name : old('first_name') }}"/>
                                            @if ($errors->has('first_name'))
                                                <span id="name-error" class="error text-danger"
                                                      for="input-name">{{ $errors->first('first_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Lastname</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('last_name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                                   name="last_name" id="input-last_name" type="text"
                                                   placeholder="Last Name" required="true"
                                                   aria-required="true"
                                                   value="{{ isset($user->last_name) ? $user->last_name : old('last_name') }}"/>
                                            @if ($errors->has('first_name'))
                                                <span id="last_name-error" class="error text-danger"
                                                      for="input-last_name">{{ $errors->first('last_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                   name="email" id="input-email" type="email"
                                                   placeholder="{{ __('Email') }}" required
                                                   value="{{ isset($user->email) ? $user->email : old('email') }}"/>
                                            @if ($errors->has('email'))
                                                <span id="email-error" class="error text-danger"
                                                      for="input-email">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Gender') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('gender') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}"
                                                    name="gender" id="input-gender" required>
                                                <option value="">Please select</option>
                                                <option {{ (isset($user->gender) && $user->gender == 'male') ? 'selected' : ((old('gender') == 'male') ? 'selected' : '') }} value="male">
                                                    Male
                                                </option>
                                                <option {{ (isset($user->gender) && $user->gender == 'female') ? 'selected' : ((old('gender') == 'female') ? 'selected' : '') }} value="female">
                                                    Female
                                                </option>
                                                <option {{ (isset($user->gender) && $user->gender == 'transgender') ? 'selected' : ((old('gender') == 'transgender') ? 'selected' : '') }} value="transgender">
                                                    TransGender
                                                </option>
                                            </select>
                                            @if ($errors->has('email'))
                                                <span id="gender-error"
                                                      class="error text-danger">{{ $errors->first('gender') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Date of Birth') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('dob') ? ' has-danger' : '' }}">
                                            <input class="datepicker form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}"
                                                   name="dob" id="input-dob" type="text" placeholder="{{ __('Date Of Birth') }}"
                                                   value="{{ isset($user->dob) ? $user->dob : old('dob') }}" required/>

                                            @if ($errors->has('dob'))
                                                <span id="dob-error"
                                                      class="error text-danger">{{ $errors->first('dob') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Marital Status') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('marital_status') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('marital_status') ? ' is-invalid' : '' }}"
                                                    name="marital_status" id="input-marital_status" required>
                                                <option value="">Please select</option>
                                                <option {{ (isset($user->marital_status) && $user->marital_status == 'single') ? 'selected' : ((old('gender') == 'single') ? 'selected' : '') }} value="single">
                                                    Single
                                                </option>(
                                                <option {{ (isset($user->marital_status) && $user->marital_status == 'married') ? 'selected' : ((old('gender') == 'married') ? 'selected' : '') }} value="married">
                                                    Married
                                                </option>
                                                <option {{ (isset($user->marital_status) && $user->marital_status == 'divorced') ? 'selected' : ((old('gender') == 'divorced') ? 'selected' : '') }} value="divorced">
                                                    Divorced
                                                </option>
                                                <option {{ (isset($user->marital_status) && $user->marital_status == 'engaged') ? 'selected' : ((old('gender') == 'engaged') ? 'selected' : '') }} value="engaged">
                                                    Engaged
                                                </option>
                                                <option {{ (isset($user->marital_status) && $user->marital_status == 'remarriage') ? 'selected' : ((old('gender') == 'remarriage') ? 'selected' : '') }} value="remarriage">
                                                    ReMarriage
                                                </option>
                                                 <option {{ (isset($user->marital_status) && $user->marital_status == 'rokkadone') ? 'selected' : ((old('gender') == 'rokkadone') ? 'selected' : '') }} value="rokkadone">
                                                    Rokka Done
                                                </option>
                                            </select>
                                            @if ($errors->has('marital_status'))
                                                <span id="marital_status-error"
                                                      class="error text-danger">{{ $errors->first('marital_status') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Phone') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                   name="phone" id="input-phone" type="text"
                                                   placeholder="{{ __('Phone') }}"
                                                   value="{{ isset($user->phone) ? $user->phone : old('phone') }}"
                                                   required/>

                                            @if ($errors->has('phone'))
                                                <span id="phone-error"
                                                      class="error text-danger">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
            <form method="post" id="country_state_city" action="{{ route('user.update_profile', ['user' => $user]) }}" autocomplete="off"
                  class="form-horizontal">
                @csrf
                <input name="_method" type="hidden" value="PUT">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Update User') }}</h4>
                                <p class="card-category">{{ __('User information') }}</p>
                            </div>
                            <div class="card-body ">
                                @if (session('status'))
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                                <span>{{ session('status') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Height') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('height') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('height') ? ' is-invalid' : '' }}"
                                                   name="height" id="input-height" type="text"
                                                   placeholder="{{ __('Height') }}"
                                                   value="{{ isset($userProfile->height) ? $userProfile->height : old('height') }}"
                                                   required/>
                                            @if ($errors->has('height'))
                                                <span id="height-error" class="error text-danger"
                                                      for="input-email">{{ $errors->first('height') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Religion') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('religion') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('religion') ? ' is-invalid' : '' }}"
                                                    name="religion" id="input-religion" required>
                                                <option value="">Please select</option>
                                                <option {{ (isset($userProfile->religion) && $userProfile->religion == 'hindu') ? 'selected' : ((old('religion') == 'hindu') ? 'selected' : '') }}  value="hindu">
                                                    Hindu
                                                </option>
                                                <option {{ (isset($userProfile->religion) && $userProfile->religion == 'muslim') ? 'selected' : ((old('religion') == 'muslim') ? 'selected' : '') }} value="muslim">
                                                    Muslim
                                                </option>
                                                <option {{ (isset($userProfile->religion) && $userProfile->religion == 'punjabi') ? 'selected' : ((old('religion') == 'punjabi') ? 'selected' : '') }}  value="punjabi">
                                                    Punjabi
                                                </option>
                                                <option {{ (isset($userProfile->religion) && $userProfile->religion == 'sikh') ? 'selected' : ((old('religion') == 'sikh') ? 'selected' : '') }}  value="sikh">
                                                    Sikh
                                                </option>
                                                <option {{ (isset($userProfile->religion) && $userProfile->religion == 'bania') ? 'selected' : ((old('religion') == 'bania') ? 'selected' : '') }}  value="bania">
                                                    Bania
                                                </option>
                                                <option {{ (isset($userProfile->religion) && $userProfile->religion == 'jain') ? 'selected' : ((old('religion') == 'jain') ? 'selected' : '') }}  value="jain">
                                                    Jain
                                                </option>
                                                <option {{ (isset($userProfile->religion) && $userProfile->religion == 'christian') ? 'selected' : ((old('religion') == 'christian') ? 'selected' : '') }}  value="christian">
                                                    Christian
                                                </option>
                                                <option {{ (isset($userProfile->religion) && $userProfile->religion == 'brahmin') ? 'selected' : ((old('religion') == 'brahmin') ? 'selected' : '') }}  value="brahmin">
                                                    Brahmin
                                                </option>
                                                
                                                
                                                
                                            </select>
                                            @if ($errors->has('religion'))
                                                <span id="religion-error"
                                                      class="error text-danger">{{ $errors->first('religion') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Caste') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('cast') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('cast') ? ' is-invalid' : '' }}"
                                                    name="cast" id="input-cast" required>
                                                <option value="">Please select</option>
                                                <option {{ (isset($userProfile->cast) && $userProfile->cast == 'punjabi') ? 'selected' : ((old('cast') == 'punjabi') ? 'selected' : '') }} value="punjabi">
                                                    Punjabi
                                                </option>

                                            </select>
                                            @if ($errors->has('cast'))
                                                <span id="cast-error"
                                                      class="error text-danger">{{ $errors->first('cast') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Sub Caste') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('sub_cast') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('sub_cast') ? ' is-invalid' : '' }}"
                                                    name="sub_cast" id="input-sub_cast" required>
                                                <option value="">Please select</option>
                                                <option {{ (isset($userProfile->sub_cast) && $userProfile->sub_cast == 'punjabi') ? 'selected' : ((old('sub_cast') == 'punjabi') ? 'selected' : '') }} value="punjabi">
                                                    punjabi
                                                </option>

                                            </select>
                                            @if ($errors->has('sub_cast'))
                                                <span id="sub_cast-error"
                                                      class="error text-danger">{{ $errors->first('sub_cast') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Mother Tongue') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('tongue') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('mother_tongue') ? ' is-invalid' : '' }}"
                                                    name="mother_tongue" id="input-mother_tongue" required>
                                                <option {{ (isset($userProfile->mother_tongue) && $userProfile->mother_tongue == 'punjabi') ? 'selected' : ((old('mother_tongue') == 'punjabi') ? 'selected' : '') }} value="">
                                                    Please select
                                                </option>
                                                <option {{ (isset($userProfile->mother_tongue) && $userProfile->mother_tongue == 'hindi') ? 'selected' : ((old('mother_tongue') == 'hindi') ? 'selected' : '') }} value="hindi">
                                                    Hindi
                                                </option>
                                                <option {{ (isset($userProfile->mother_tongue) && $userProfile->mother_tongue == 'english') ? 'selected' : ((old('mother_tongue') == 'english') ? 'selected' : '') }} value="english">
                                                    English
                                                </option>
                                                <option {{ (isset($userProfile->mother_tongue) && $userProfile->mother_tongue == 'punjabi') ? 'selected' : ((old('mother_tongue') == 'punjabi') ? 'selected' : '') }} value="punjabi">
                                                    Punjabi
                                                </option>
                                                <option {{ (isset($userProfile->mother_tongue) && $userProfile->mother_tongue == 'urdu') ? 'selected' : ((old('mother_tongue') == 'urdu') ? 'selected' : '') }} value="urdu">
                                                    Urdu
                                                </option>
                                                <option {{ (isset($userProfile->mother_tongue) && $userProfile->mother_tongue == 'marathi') ? 'selected' : ((old('mother_tongue') == 'marathi') ? 'selected' : '') }} value="marathi">
                                                    Mrathi
                                                </option>
                                                 <option {{ (isset($userProfile->mother_tongue) && $userProfile->mother_tongue == 'others') ? 'selected' : ((old('mother_tongue') == 'marathi') ? 'selected' : '') }} value="others">
                                                    Others
                                                </option>

                                            </select>
                                            @if ($errors->has('mother_tongue'))
                                                <span id="mother_tongue-error"
                                                      class="error text-danger">{{ $errors->first('tongue') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Country') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('country') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}"
                                                    name="country" id="country-dropdown" required>
                                                <option value="">Please select</option>
                                                
                                               @foreach ($countries as $country) 
                                                <option value="{{$country->id}}" {{ (isset($userProfile->country) && $userProfile->country == $country->name) ? 'selected' : ((old('country') == $country->name) ? 'selected' : '') }} >
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
                                                    name="state" id="state-dropdown" required>
                                                <option value="">Please select</option>
                                                <option value="{{$userProfile->state}}" selected>
                                                {{$userProfile->state}}
                                              

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
                                                    name="city" id="city-dropdown" required>
                                                <option value="">Please select</option>
                                               <option value="{{$userProfile->city}}" selected>
                                                {{$userProfile->city}}
                                              


                                            </select>
                                            @if ($errors->has('city'))
                                                <span id="city-error"
                                                      class="error text-danger">{{ $errors->first('city') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Annual Income') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('annual_income') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('annual_income') ? ' is-invalid' : '' }}"
                                                   name="annual_income" id="input-annual_income" type="text"
                                                   placeholder="{{ __('Annual Income') }}"
                                                   value="{{ isset($userProfile->annual_income) ? $userProfile->annual_income : old('annual_income') }}"
                                                   required/>

                                            @if ($errors->has('annual_income'))
                                                <span id="annual_income-error"
                                                      class="error text-danger">{{ $errors->first('annual_income') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            </div>
                        </div>

                    </div>

                </div>
            </form>
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="" class="form-horizontal">
                        @csrf

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Profile Picture') }}</h4>
                                <p class="card-category">{{ __('Profile Pic') }}</p>
                            </div>
                            <div class="card-body ">
                                @if (session('status_password'))
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                                <span>{{ session('status_password') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif


                                <div class="row">
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" name="file[]" class="custom-file-input"
                                                   id="inputGroupFile02">
                                            <label class="custom-file-label" for="inputGroupFile02"
                                                   aria-describedby="inputGroupFileAddon02">Choose file</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" name="file[]" class="custom-file-input"
                                                   id="inputGroupFile02">
                                            <label class="custom-file-label" for="inputGroupFile02"
                                                   aria-describedby="inputGroupFileAddon02">Choose file</label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Upload Picture') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            {{--<div class="row">
                <div class="col-md-12">
                    <form method="post" action="" class="form-horizontal">
                        @csrf

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Essential Fields') }}</h4>
                                <p class="card-category">{{ __('Essential Fields') }}</p>
                            </div>
                            <div class="card-body ">
                                @if (session('status_password'))
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                                <span>{{ session('status_password') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Date of Birth') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('dob') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}"
                                                   name="dob" id="input-dob" type="text"
                                                   placeholder="{{ __('Date Of Birth') }}" value="" required/>

                                            @if ($errors->has('dob'))
                                                <span id="dob-error"
                                                      class="error text-danger">{{ $errors->first('dob') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Marital Status') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('married') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('married') ? ' is-invalid' : '' }}"
                                                    name="married" id="input-married" required>
                                                <option value="">Please select</option>
                                                <option value="single">Single</option>
                                                <option value="married">Married</option>
                                                <option value="divorce">Divorced</option>
                                            </select>
                                            @if ($errors->has('married'))
                                                <span id="married-error"
                                                      class="error text-danger">{{ $errors->first('married') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Profile Manage By') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('profile_by') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('profile_by') ? ' is-invalid' : '' }}"
                                                   name="profile_by" id="input-profile_by" type="text"
                                                   placeholder="{{ __('Profile By') }}" value="" required/>

                                            @if ($errors->has('profile_by'))
                                                <span id="profile_by-error"
                                                      class="error text-danger">{{ $errors->first('profile_by') }}</span>
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
            </div>--}}
            <form method="post" action="{{ route('user.update_profile', ['user' => $user]) }}" autocomplete="off"
                  class="form-horizontal">
                @csrf
                <input name="_method" type="hidden" value="PUT">

                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="" class="form-horizontal">
                            @csrf

                            <div class="card ">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">{{ __('About Me') }}</h4>
                                    <p class="card-category">{{ __('About Me') }}</p>
                                </div>
                                <div class="card-body ">

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Personal Details') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('personal_detail') ? ' has-danger' : '' }}">
                                            <textarea
                                                    class="form-control{{ $errors->has('personal_detail') ? ' is-invalid' : '' }}"
                                                    name="personal_detail" id="input-personal_detail"
                                                    placeholder="{{ __('Personal Details') }}">{{ isset($userProfile->personal_detail) ? $userProfile->personal_detail : old('personal_detail') }}</textarea>

                                                @if ($errors->has('personal_detail'))
                                                    <span id="personal_detail-error"
                                                          class="error text-danger">{{ $errors->first('personal_detail') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Weight') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('weight') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}"
                                                       name="weight" id="input-weight" type="text"
                                                       placeholder="{{ __('Weight') }}"
                                                       value="{{ isset($userProfile->weight) ? $userProfile->weight : old('weight') }}"
                                                       required/>
                                                @if ($errors->has('weight'))
                                                    <span id="weight-error" class="error text-danger"
                                                          for="input-weight">{{ $errors->first('weight') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Body Type') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('body_type') ? ' has-danger' : '' }}">
                                                <select class="form-control{{ $errors->has('body_type') ? ' is-invalid' : '' }}"
                                                        name="body_type" id="input-body_type">
                                                    <option value="">Please select</option>
                                                    <option {{ (isset($userProfile->body_type) && $userProfile->body_type == 'athletic') ? 'selected' : ((old('body_type') == 'athletic') ? 'selected' : '') }} value="athletic">
                                                        Athletic
                                                    </option>
                                                    <option {{ (isset($userProfile->body_type) && $userProfile->body_type == 'average') ? 'selected' : ((old('body_type') == 'average') ? 'selected' : '') }} value="average">
                                                        Average
                                                    </option>
                                                    <option {{ (isset($userProfile->body_type) && $userProfile->body_type == 'heavy') ? 'selected' : ((old('body_type') == 'heavy') ? 'selected' : '') }} value="heavy">
                                                        Heavy
                                                    </option>
                                                    <option {{ (isset($userProfile->body_type) && $userProfile->body_type == 'slim') ? 'selected' : ((old('body_type') == 'slim') ? 'selected' : '') }} value="slim">
                                                        Slim
                                                    </option>

                                                </select>
                                                @if ($errors->has('body_type'))
                                                    <span id="body_type-error"
                                                          class="error text-danger">{{ $errors->first('body_type') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Complexion') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('complexion') ? ' has-danger' : '' }}">
                                                <select class="form-control{{ $errors->has('complexion') ? ' is-invalid' : '' }}"
                                                        name="complexion" id="input-complexion">
                                                    <option value="">Please select</option>
                                                    <option {{ (isset($userProfile->complexion) && $userProfile->complexion == 'dark') ? 'selected' : ((old('complexion') == 'dark') ? 'selected' : '') }} value="dark">
                                                        Dark
                                                    </option>
                                                    <option {{ (isset($userProfile->complexion) && $userProfile->complexion == 'fair') ? 'selected' : ((old('complexion') == 'fair') ? 'selected' : '') }} value="fair">
                                                        Fair
                                                    </option>
                                                    <option {{ (isset($userProfile->complexion) && $userProfile->complexion == 'medium') ? 'selected' : ((old('complexion') == 'medium') ? 'selected' : '') }} value="medium">
                                                        Medium
                                                    </option>
                                                    <option {{ (isset($userProfile->complexion) && $userProfile->complexion == 'very_fair') ? 'selected' : ((old('complexion') == 'very_fair') ? 'selected' : '') }} value="very_fair">
                                                        Very fair
                                                    </option>
                                                    <option {{ (isset($userProfile->complexion) && $userProfile->complexion == 'wheatish') ? 'selected' : ((old('complexion') == 'wheatish') ? 'selected' : '') }} value="wheatish">
                                                        Wheatish
                                                    </option>
                                                </select>
                                                @if ($errors->has('complexion'))
                                                    <span id="complexion-error"
                                                          class="error text-danger">{{ $errors->first('complexion') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Challanged') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('challanged') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('challanged') ? ' is-invalid' : '' }}"
                                                       name="challanged" id="input-challanged" type="text"
                                                       placeholder="{{ __('Challanged') }}"
                                                       value="{{ isset($userProfile->challanged) ? $userProfile->challanged : old('challanged') }}"/>
                                                @if ($errors->has('challanged'))
                                                    <span id="challanged-error" class="error text-danger"
                                                          for="input-challanged">{{ $errors->first('challanged') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="card-footer ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </form>

            <form method="post" action="{{ route('user.update_profile', ['user' => $user]) }}" autocomplete="off"
                  class="form-horizontal">
                @csrf
                <input name="_method" type="hidden" value="PUT">
            <div class="row">
                <div class="col-md-12">


                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Education') }}</h4>
                                <p class="card-category">{{ __('Education') }}</p>
                            </div>
                            <div class="card-body ">

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('About Education') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('education') ? ' has-danger' : '' }}">
                                            <textarea
                                                    class="form-control{{ $errors->has('education') ? ' is-invalid' : '' }}"
                                                    name="education" id="input-education"
                                                    placeholder="{{ __('Education') }}">{{ isset($userProfile->education) ? $userProfile->education : old('education') }}</textarea>

                                            @if ($errors->has('education'))
                                                <span id="education-error"
                                                      class="error text-danger">{{ $errors->first('education') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Higher Education') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('higher_education') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('higher_education') ? ' is-invalid' : '' }}"
                                                    name="higher_education" id="input-higher_education">
                                                <option value="">Please select</option>
                                                <option {{ (isset($userProfile->higher_education) && $userProfile->higher_education == 'phd') ? 'selected' : ((old('higher_education') == 'phd') ? 'selected' : '') }} value="phd">PHD</option>
                                                <option {{ (isset($userProfile->higher_education) && $userProfile->higher_education == 'btech') ? 'selected' : ((old('higher_education') == 'btech') ? 'selected' : '') }} value="btech">B.Tech</option>


                                            </select>
                                            @if ($errors->has('higher_education'))
                                                <span id="higher_education-error"
                                                      class="error text-danger">{{ $errors->first('higher_education') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('College') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('college') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('college') ? ' is-invalid' : '' }}"
                                                   name="college" id="input-college" type="text"
                                                   placeholder="{{ __('College') }}" value="{{ isset($userProfile->college) ? $userProfile->college : old('college') }}"/>
                                            @if ($errors->has('college'))
                                                <span id="college-error" class="error text-danger"
                                                      for="input-college">{{ $errors->first('college') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('School') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('school') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('school') ? ' is-invalid' : '' }}"
                                                   name="school" id="input-school" type="text"
                                                   placeholder="{{ __('School') }}" value="{{ isset($userProfile->school) ? $userProfile->school : old('school') }}"/>
                                            @if ($errors->has('school'))
                                                <span id="school-error" class="error text-danger"
                                                      for="input-school">{{ $errors->first('school') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            </div>
                        </div>

                </div>
            </div>
            </form>
            <form method="post" action="{{ route('user.update_profile', ['user' => $user]) }}" autocomplete="off"
                  class="form-horizontal">
                @csrf
                <input name="_method" type="hidden" value="PUT">
            <div class="row">
                <div class="col-md-12">


                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Career') }}</h4>
                                <p class="card-category">{{ __('Career') }}</p>
                            </div>
                            <div class="card-body ">

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('About Career') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('about_career') ? ' has-danger' : '' }}">
                                            <textarea
                                                    class="form-control{{ $errors->has('about_career') ? ' is-invalid' : '' }}"
                                                    name="about_career" id="input-about_career"
                                                    placeholder="{{ __('Career') }}">{{ isset($userProfile->about_career) ? $userProfile->about_career : old('about_career') }}</textarea>

                                            @if ($errors->has('about_career'))
                                                <span id="about_career-error"
                                                      class="error text-danger">{{ $errors->first('about_career') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Employed In') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('employed_in') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('employed_in') ? ' is-invalid' : '' }}"
                                                   name="employed_in" id="input-employed_in" type="text"
                                                   placeholder="{{ __('Employed In') }}" value="{{ isset($userProfile->employed_in) ? $userProfile->employed_in : old('employed_in') }}"/>
                                            @if ($errors->has('employed_in'))
                                                <span id="employed_in-error" class="error text-danger"
                                                      for="input-employed_in">{{ $errors->first('employed_in') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Occupation') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('occupation') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('occupation') ? ' is-invalid' : '' }}"
                                                   name="occupation" id="input-occupation" type="text"
                                                   placeholder="{{ __('Occupation') }}" value="{{ isset($userProfile->occupation) ? $userProfile->occupation : old('occupation') }}"/>
                                            @if ($errors->has('occupation'))
                                                <span id="occupation-error" class="error text-danger"
                                                      for="input-occupation">{{ $errors->first('occupation') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Organization Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('organization_name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('organization_name') ? ' is-invalid' : '' }}"
                                                   name="organization_name" id="input-organization_name" type="text"
                                                   placeholder="{{ __('Organization Name') }}" value="{{ isset($userProfile->organization_name) ? $userProfile->organization_name : old('organization_name') }}"/>
                                            @if ($errors->has('organization_name'))
                                                <span id="organization_name-error" class="error text-danger"
                                                      for="input-organization_name">{{ $errors->first('organization_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            </div>
                        </div>

                </div>
            </div>
            </form>
            <form method="post" action="{{ route('user.update', ['user' => $user]) }}" autocomplete="off"
                  class="form-horizontal">
                @csrf
                <input name="_method" type="hidden" value="PUT">
            <div class="row">
                <div class="col-md-12">

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Contact Details') }}</h4>
                                <p class="card-category">{{ __('Contact Details') }}</p>
                            </div>
                            <div class="card-body ">


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                   name="email" id="input-email" type="email"
                                                   placeholder="{{ __('Email') }}" value="{{ isset($user->email) ? $user->email : old('email') }}" required/>
                                            @if ($errors->has('email'))
                                                <span id="email-error" class="error text-danger"
                                                      for="input-email">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Alternate Email') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('alternate_email') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('alternate_email') ? ' is-invalid' : '' }}"
                                                   name="alternate_email" id="input-alternate_email"
                                                   type="alternate_email" placeholder="{{ __('Alternate Email') }}"
                                                   value="{{ isset($user->alternate_email) ? $user->alternate_email : old('alternate_email') }}" required/>
                                            @if ($errors->has('alternate_email'))
                                                <span id="alternate_email-error" class="error text-danger"
                                                      for="input-alternate_email">{{ $errors->first('alternate_email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Phone') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                   name="phone" id="input-phone" type="text"
                                                   placeholder="{{ __('Phone') }}" value="{{ isset($user->phone) ? $user->phone : old('phone') }}" required/>

                                            @if ($errors->has('phone'))
                                                <span id="phone-error"
                                                      class="error text-danger">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Alternate Phone') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('alternate_phone') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('alternate_phone') ? ' is-invalid' : '' }}"
                                                   name="alternate_phone" id="input-alternate_phone" type="text"
                                                   placeholder="{{ __('Alternate Phone') }}" value="{{ isset($user->alternate_phone) ? $user->alternate_phone : old('alternate_phone') }}" required/>

                                            @if ($errors->has('alternate_phone'))
                                                <span id="alternate_phone-error"
                                                      class="error text-danger">{{ $errors->first('alternate_phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Family Phone Number') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('family_phone_number') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('family_phone_number') ? ' is-invalid' : '' }}"
                                                   name="family_phone_number" id="input-family_phone_number" type="text"
                                                   placeholder="{{ __('Family Phone Number') }}" value="{{ isset($user->family_phone_number) ? $user->family_phone_number : old('family_phone_number') }}" required/>

                                            @if ($errors->has('family_phone_number'))
                                                <span id="family_phone_number-error"
                                                      class="error text-danger">{{ $errors->first('family_phone_number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Landline') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('landline') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('landline') ? ' is-invalid' : '' }}"
                                                   name="landline" id="input-landline" type="text"
                                                   placeholder="{{ __('Landline') }}" value="{{ isset($user->landline) ? $user->landline : old('landline') }}" required/>

                                            @if ($errors->has('landline'))
                                                <span id="landline-error"
                                                      class="error text-danger">{{ $errors->first('landline') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Whatsup') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('whatsup') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('whatsup') ? ' is-invalid' : '' }}"
                                                   name="whatsup" id="input-whatsup" type="text"
                                                   placeholder="{{ __('Whatsup') }}" value="{{ isset($user->whatsup) ? $user->whatsup : old('whatsup') }}" required/>

                                            @if ($errors->has('whatsup'))
                                                <span id="whatsup-error"
                                                      class="error text-danger">{{ $errors->first('whatsup') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            </div>
                        </div>

                </div>
            </div>
            </form>
            <form method="post" action="{{ route('user.update_profile', ['user' => $user]) }}" autocomplete="off"
                  class="form-horizontal">
                @csrf
                <input name="_method" type="hidden" value="PUT">
            <div class="row">
                <div class="col-md-12">

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Kundli') }}</h4>
                                <p class="card-category">{{ __('Kundli') }}</p>
                            </div>
                            <div class="card-body ">


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Time of Birth') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('birth_time') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('birth_time') ? ' is-invalid' : '' }}"
                                                   name="birth_time" id="input-birth_time" type="time"
                                                   placeholder="{{ __('Time of Birth') }}" value="{{ isset($userProfile->birth_time) ? $userProfile->birth_time : old('birth_time') }}"/>
                                            @if ($errors->has('birth_time'))
                                                <span id="birth_time-error" class="error text-danger"
                                                      for="input-birth_time">{{ $errors->first('birth_time') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Place of Birth') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('birth_place') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('birth_place') ? ' is-invalid' : '' }}"
                                                   name="birth_place" id="input-birth_place" type="text"
                                                   placeholder="{{ __('Place of Birth') }}" value="{{ isset($userProfile->birth_place) ? $userProfile->birth_place : old('birth_place') }}"/>
                                            @if ($errors->has('birth_place'))
                                                <span id="birth_place-error" class="error text-danger"
                                                      for="input-birth_place">{{ $errors->first('birth_place') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Mangalik Status') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('mangalik_status') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('mangalik_status') ? ' is-invalid' : '' }}"
                                                    name="mangalik_status" id="input-mangalik_status" required>
                                                <option value="">Please select</option>
                                                <option {{ (isset($userProfile->mangalik_status) && $userProfile->mangalik_status == 'yes') ? 'selected' : ((old('mangalik_status') == 'yes') ? 'selected' : '') }} value="yes">Yes</option>
                                                <option {{ (isset($userProfile->mangalik_status) && $userProfile->mangalik_status == 'no') ? 'selected' : ((old('mangalik_status') == 'no') ? 'selected' : '') }}  value="no">No</option>
                                            </select>
                                            @if ($errors->has('mangalik_status'))
                                                <span id="mangalik_status-error"
                                                      class="error text-danger">{{ $errors->first('mangalik_status') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            </div>
                        </div>

                </div>
            </div>
            </form>
            <form method="post" action="{{ route('user.update_profile', ['user' => $user]) }}" autocomplete="off"
                  class="form-horizontal">
                @csrf
                <input name="_method" type="hidden" value="PUT">
            <div class="row">
                <div class="col-md-12">


                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('LifeStyle') }}</h4>
                                <p class="card-category">{{ __('LifeStyle') }}</p>
                            </div>
                            <div class="card-body ">


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Veg/NonVeg') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('non_veg') ? ' has-danger' : '' }}">
                                            <input type='hidden' value='0' name='non_veg'>
                                            <input class="{{ $errors->has('non_veg') ? ' is-invalid' : '' }}" name="non_veg"
                                                   id="input-non_veg" type="checkbox" {{ (isset($userProfile->non_veg) && $userProfile->non_veg == 1) ? 'selected' : ((old('non_veg') == 1) ? 'checked' : '') }} value="1"/>
                                            @if ($errors->has('non_veg'))
                                                <span id="non_veg-error" class="error text-danger"
                                                      for="input-non_veg">{{ $errors->first('non_veg') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Drink') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('drink') ? ' has-danger' : '' }}">
                                            <input type='hidden' value='0' name='drink'>
                                            <input class="{{ $errors->has('drink') ? ' is-invalid' : '' }}" name="drink"
                                                   id="input-drink" type="checkbox" {{ (isset($userProfile->drink) && $userProfile->drink == 1) ? 'checked' : ((old('drink') == 1) ? 'checked' : '') }} value="1"/>
                                            @if ($errors->has('drink'))
                                                <span id="drink-error" class="error text-danger"
                                                      for="input-drink">{{ $errors->first('drink') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Somke') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('smoke') ? ' has-danger' : '' }}">
                                            <input type='hidden' value='0' name='smoke'>
                                            <input class="{{ $errors->has('smoke') ? ' is-invalid' : '' }}" name="smoke"
                                                   id="input-smoke" type="checkbox" {{ (isset($userProfile->smoke) && $userProfile->smoke == 1) ? 'checked' : ((old('smoke') == 1) ? 'checked' : '') }} value="1"/>
                                            @if ($errors->has('smoke'))
                                                <span id="smoke-error" class="error text-danger"
                                                      for="input-smoke">{{ $errors->first('smoke') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Own a House') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('own_house') ? ' has-danger' : '' }}">
                                            <input type='hidden' value='0' name='own_house'>
                                            <input class="{{ $errors->has('own_house') ? ' is-invalid' : '' }}" name="own_house"
                                                   id="input-own_house" type="checkbox" {{ (isset($userProfile->own_house) && $userProfile->own_house == 1) ? 'checked' : ((old('own_house') == 1) ? 'checked' : '') }} value="1"/>
                                            @if ($errors->has('own_house'))
                                                <span id="own_house-error" class="error text-danger"
                                                      for="input-own_house">{{ $errors->first('own_house') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Own a Car') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('own_car') ? ' has-danger' : '' }}">
                                            <input type='hidden' value='0' name='own_car'>
                                            <input class="{{ $errors->has('own_car') ? ' is-invalid' : '' }}" name="own_car"
                                                   id="input-own_car" type="checkbox" {{ (isset($userProfile->own_car) && $userProfile->own_car == 1) ? 'checked' : ((old('own_car') == 1) ? 'checked' : '') }} value="1"/>
                                            @if ($errors->has('own_car'))
                                                <span id="own_car-error" class="error text-danger"
                                                      for="input-own_car">{{ $errors->first('own_car') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            </div>
                        </div>

                </div>
            </div>
            </form>
            <form method="post" action="{{ route('user.update_profile', ['user' => $user]) }}" autocomplete="off"
                  class="form-horizontal">
                @csrf
                <input name="_method" type="hidden" value="PUT">
            <div class="row">
                <div class="col-md-12">

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Family') }}</h4>
                                <p class="card-category">{{ __('Family Details') }}</p>
                            </div>
                            <div class="card-body ">


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Father Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('father_name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('father_name') ? ' is-invalid' : '' }}"
                                                   name="father_name" id="input-father_name" type="text"
                                                   placeholder="{{ __('Father Name') }}"
                                                   value="{{ isset($userProfile->father_name) ? $userProfile->father_name : old('father_name') }}"/>
                                            @if ($errors->has('father_name'))
                                                <span id="father_name-error" class="error text-danger"
                                                      for="input-father_name">{{ $errors->first('father_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Father Occupation') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('father_occupation') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('father_occupation') ? ' is-invalid' : '' }}"
                                                   name="father_occupation" id="input-father_occupation"
                                                   type="text" placeholder="{{ __('Father Occupation') }}" value="{{ isset($userProfile->father_occupation) ? $userProfile->father_occupation : old('father_occupation') }}"/>
                                            @if ($errors->has('father_occupation'))
                                                <span id="father_occupation-error" class="error text-danger"
                                                      for="input-father_occupation">{{ $errors->first('father_occupation') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Mother Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('mother_name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('mother_name') ? ' is-invalid' : '' }}"
                                                   name="mother_name" id="input-mother_name" type="text"
                                                   placeholder="{{ __('Mother Name') }}" value="{{ isset($userProfile->mother_name) ? $userProfile->mother_name : old('mother_name') }}"/>
                                            @if ($errors->has('mother_name'))
                                                <span id="mother_name-error" class="error text-danger"
                                                      for="input-mother_name">{{ $errors->first('mother_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Mother Occupation') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('mother_occupation') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('mother_occupation') ? ' is-invalid' : '' }}"
                                                   name="mother_occupation" id="input-mother_occupation"
                                                   type="text" placeholder="{{ __('Mother Occupation') }}" value="{{ isset($userProfile->mother_occupation) ? $userProfile->mother_occupation : old('mother_occupation') }}"/>
                                            @if ($errors->has('mother_occupation'))
                                                <span id="mother_occupation-error" class="error text-danger"
                                                      for="input-mother_occupation">{{ $errors->first('mother_occupation') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Gothra') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('gothra') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('gothra') ? ' is-invalid' : '' }}"
                                                    name="gothra" id="input-gothra" required>
                                                <option value="">Please select</option>
                                                <option {{ (isset($userProfile->gothra) && $userProfile->gothra == 'sanatan') ? 'selected' : ((old('gender') == 'sanatan') ? 'selected' : '') }} value="sanatan">Sanatan</option>
                                                <option {{ (isset($userProfile->gothra) && $userProfile->gothra == 'other') ? 'selected' : ((old('gender') == 'other') ? 'selected' : '') }} value="other">Other</option>

                                            </select>
                                            @if ($errors->has('gothra'))
                                                <span id="gothra-error"
                                                      class="error text-danger">{{ $errors->first('gothra') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Family Income') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('family_income') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('family_income') ? ' is-invalid' : '' }}"
                                                   name="family_income" id="input-family_income" type="text"
                                                   placeholder="{{ __('Family Income') }}" value="{{ isset($userProfile->family_income) ? $userProfile->family_income : old('family_income') }}" required/>

                                            @if ($errors->has('family_income'))
                                                <span id="family_income-error"
                                                      class="error text-danger">{{ $errors->first('family_income') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Living with Parents') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('living_with_parents') ? ' has-danger' : '' }}">
                                            <input type='hidden' value='0' name='living_with_parents'>
                                            <input class="{{ $errors->has('living_with_parents') ? ' is-invalid' : '' }}"
                                                   name="living_with_parents" id="input-living_with_parents" type="checkbox" value="1" {{ (isset($userProfile->living_with_parents) && $userProfile->living_with_parents == 1) ? 'checked' : ((old('living_with_parents') == 1) ? 'checked' : '') }}/>
                                            @if ($errors->has('living_with_parents'))
                                                <span id="living_with_parents-error" class="error text-danger"
                                                      for="input-living_with_parents">{{ $errors->first('living_with_parents') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Willing to go abroad') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('abroad_willing') ? ' has-danger' : '' }}">
                                            <input type='hidden' value='0' name='abroad_willing'>
                                            <input class="{{ $errors->has('abroad_willing') ? ' is-invalid' : '' }}"
                                                   name="abroad_willing" id="input-abroad_willing" type="checkbox" value="1" {{ (isset($userProfile->abroad_willing) && $userProfile->abroad_willing == 1) ? 'checked' : ((old('abroad_willing') == 1) ? 'checked' : '') }}/>
                                            @if ($errors->has('abroad_willing'))
                                                <span id="abroad_willing-error" class="error text-danger"
                                                      for="input-abroad_willing">{{ $errors->first('abroad_willing') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            </div>
                        </div>

                </div>
            </div>
            </form>

        </div>
    </div>
@endsection

@section('script')
    <script>

        $(document).ready(function(){
            $('.datepicker').datepicker({ format:"yyyy-mm-dd" });

          
        });
        
  
    $(document).ready(function() {
$('#country-dropdown').on('change', function() {
var country_id = this.value;
$("#state-dropdown").html('');
$.ajax({
url:"{{url('get-states-by-country')}}",
type: "POST",
data: {
country_id: country_id,
_token: '{{csrf_token()}}' 
},
dataType : 'json',
success: function(result){
$('#state-dropdown').html('<option value="">Select State</option>'); 
$.each(result.states,function(key,value){
$("#state-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
});
$('#city-dropdown').html('<option value="">Select State First</option>'); 
}
});
});    
$('#state-dropdown').on('change', function() {
var state_id = this.value;
$("#city-dropdown").html('');
$.ajax({
url:"{{url('get-cities-by-state')}}",
type: "POST",
data: {
state_id: state_id,
_token: '{{csrf_token()}}' 
},
dataType : 'json',
success: function(result){
$('#city-dropdown').html('<option value="">Select City</option>'); 
$.each(result.cities,function(key,value){
$("#city-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
});
}
});
});
});


    $("#country_state_city").submit(function(e) {

       
        var country =  $("#country-dropdown option:selected").text();
        var state =  $("#state-dropdown option:selected").text();
        var city =  $("#city-dropdown option:selected").text();
        
        $('#country-dropdown option:selected').val(country);
        $('#state-dropdown option:selected').val(state);
        $('#city-dropdown option:selected').val(city);
         
        

    });
</script>

@endsection

