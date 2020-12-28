@extends('layouts.dashboard', [ 'titlePage' => __('Member Profile')])

@section('content')

    <div class="content">
        <div class="container-fluid">
            <form method="post" action="{{ route('user.update', ['user' => $user]) }}" autocomplete="off"
                  class="form-horizontal">
                @csrf
                <input name="_method" type="hidden" value="PUT">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card " id=basic-information>


                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Basic Information</h4>
                                <p class="card-category">Basic Information</p>
                            </div>


                            <div class="card-body ">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Firstname*</label>
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
                                    <label class="col-sm-2 col-form-label">Lastname*</label>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Email*') }}</label>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Phone*') }}</label>
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
          


        </div>
    </div>
@endsection
