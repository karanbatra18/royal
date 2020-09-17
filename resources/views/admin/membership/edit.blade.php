@extends('layouts.dashboard', [ 'titlePage' => __('Membership')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('membership.update', ['membership_id' => $membership->id]) }}" autocomplete="off" class="form-horizontal">
            @csrf
            <input name="_method" type="hidden" value="PUT">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Update Membership') }}</h4>
                <p class="card-category">{{ __('Membership Management') }}</p>
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
                        <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="input-title" type="text" placeholder="Title" required="true" aria-required="true" value="{{ isset($membership) ?$membership->title : old('title') }}"/>
                        @if ($errors->has('title'))
                          <span id="title-error" class="error text-danger" for="input-title">{{ $errors->first('title') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                
                
                  <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Caste') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('caste') ? ' has-danger' : '' }}">
                      <select class="multiselect form-control{{ $errors->has('caste') ? ' is-invalid' : '' }}" name="caste[]"  multiple="multiple" id="input-caste" required >
                          @php
                          $caste=explode(',',$membership->caste) ;
                          @endphp
                          <option value="">Please Select</option>
                          <option value="Punjabi" {{ in_array('Punjabi', $caste) ? 'selected' : '' }} >Punjabi</option>
                          <option value="Baniya" {{ in_array('Baniya', $caste) ? 'selected' : '' }}>Baniya</option>
                      </select>
                      @if ($errors->has('caste'))
                        <span id="caste-error" class="error text-danger" >{{ $errors->first('caste') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                
                   <div class="row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                        <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-description">{{ isset($membership) ?$membership->description : old('description') }}</textarea>
                        @if ($errors->has('description'))
                          <span id="description-error" class="error text-danger" for="input-description">{{ $errors->first('description') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Cost</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('cost') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('cost') ? ' is-invalid' : '' }}" name="cost" id="input-cost" type="number" placeholder="Total Cost" required="true" aria-required="true" value="{{ isset($membership) ?$membership->cost : old('cost') }}"/>
                        @if ($errors->has('cost'))
                          <span id="cost-error" class="error text-danger" for="input-cost">{{ $errors->first('cost') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                
                
                
                   <div class="row">
                    <label class="col-sm-2 col-form-label">Total Profile Limit</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('total_profile_limit') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('total_profile_limit') ? ' is-invalid' : '' }}" name="total_profile_limit" id="input-total_profile_limit" type="number" placeholder="Total Profile Limit" required="true" aria-required="true" value="{{ isset($membership) ?$membership->total_profile_limit : old('total_profile_limit') }}"/>
                        @if ($errors->has('total_profile_limit'))
                          <span id="total_profile_limit-error" class="error text-danger" for="input-total_profile_limit">{{ $errors->first('total_profile_limit') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                
                   <div class="row">
                    <label class="col-sm-2 col-form-label">Daily Profile Limit</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('daily_profile_limit') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('daily_profile_limit') ? ' is-invalid' : '' }}" name="daily_profile_limit" id="input-daily_profile_limit" type="number" placeholder="Daily Profile Limit" required="true" aria-required="true" value="{{ isset($membership) ?$membership->daily_profile_limit : old('daily_profile_limit') }}"/>
                        @if ($errors->has('daily_profile_limit'))
                          <span id="daily_profile_limit-error" class="error text-danger" for="input-daily_profile_limit">{{ $errors->first('daily_profile_limit') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                
                   <div class="row">
                    <label class="col-sm-2 col-form-label">Total Contact Limit</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('total_contact_limit') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('total_contact_limit') ? ' is-invalid' : '' }}" name="total_contact_limit" id="input-total_contact_limit" type="number" placeholder="Total Contact Limit" required="true" aria-required="true" value="{{ isset($membership) ?$membership->total_contact_limit : old('total_contact_limit') }}"/>
                        @if ($errors->has('total_contact_limit'))
                          <span id="total_contact_limit-error" class="error text-danger" for="input-total_contact_limit">{{ $errors->first('total_contact_limit') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                
                   <div class="row">
                    <label class="col-sm-2 col-form-label">Daily Contact Limit</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('daily_contact_limit') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('daily_contact_limit') ? ' is-invalid' : '' }}" name="daily_contact_limit" id="input-daily_contact_limit" type="number" placeholder="Daily Contact Limit" required="true" aria-required="true" value="{{ isset($membership) ?$membership->daily_contact_limit : old('daily_contact_limit') }}"/>
                        @if ($errors->has('daily_contact_limit'))
                          <span id="daily_contact_limit-error" class="error text-danger" for="input-daily_contact_limit">{{ $errors->first('daily_contact_limit') }}</span>
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
 
    $('.multiselect').select2();

    </script>

@endsection



