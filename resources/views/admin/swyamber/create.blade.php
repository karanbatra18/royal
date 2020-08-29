@extends('layouts.dashboard', [ 'titlePage' => __('Swyamber')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('user.store') }}" autocomplete="off" class="form-horizontal">
            @csrf

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Swyamber') }}</h4>
                <p class="card-category">{{ __('Swyamber Management') }}</p>
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
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="input-title" type="text" placeholder="Title" required="true" aria-required="true" value="{{ old('title') }}"/>
                        @if ($errors->has('title'))
                          <span id="title-error" class="error text-danger" for="input-title">{{ $errors->first('title') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">Place</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('place') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('place') ? ' is-invalid' : '' }}" name="place" id="input-place" type="text" placeholder="Place" required="true" aria-required="true" value="{{ old('place') }}"/>
                      @if ($errors->has('place'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('place') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                      <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Date') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('swyamberdate') ? ' has-danger' : '' }}">
                      <input class="datepicker form-control{{ $errors->has('swyamberdate') ? ' is-invalid' : '' }}" name="swyamberdate" id="input-swyamberdate" type="text" placeholder="{{ __('swyamberdate') }}" value="{{ old('swyamberdate') }}" required autocomplete="off" />
                    
                      @if ($errors->has('swyamberdate'))
                        <span id="swyamberdate-error" class="error text-danger" >{{ $errors->first('swyamberdate') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Male Member') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('male_member') ? ' has-danger' : '' }}">
                      <select class="multiselect form-control{{ $errors->has('male_member') ? ' is-invalid' : '' }}" name="male_member[]"  multiple="multiple" id="input-male_member" required >
                           @foreach($users as $user)
                                        @if($user->email != 'admin@gmail.com' && $user->gender=='male')
                                        
                                        <option value="{{$user->id}}">{{$user->first_name.' '.$user->last_name}}</option>{{ old('gender') == 'male' ? 'selected' : '' }} value="male">Male</option>
                      @endif
                      @endforeach
                      </select>
                      @if ($errors->has('male_member'))
                        <span id="male_member-error" class="error text-danger" >{{ $errors->first('male_member') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                
                    <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Female Member') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('female_member') ? ' has-danger' : '' }}">
                      <select class="multiselect form-control{{ $errors->has('female_member') ? ' is-invalid' : '' }}" name="female_member[]" multiple="multiple" id="input-female_member" required >
                           @foreach($users as $user)
                                        @if($user->email != 'admin@gmail.com' && $user->gender=='female')
                                        
                                        <option value="{{$user->id}}">{{$user->first_name.' '.$user->last_name}}</option>{{ old('gender') == 'female' ? 'selected' : '' }} value="female">Male</option>
                      @endif
                      @endforeach
                      </select>
                      @if ($errors->has('female_member'))
                        <span id="female_member-error" class="error text-danger" >{{ $errors->first('female_member') }}</span>
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

        $(document).ready(function() {
             $('.datepicker').datepicker({ format:"yyyy-mm-dd" });

          
    $('.multiselect').select2();
});
    </script>

@endsection



