@extends('layouts.dashboard', [ 'titlePage' => __('Caste')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('caste.update', ['caste_id' => $cast->id]) }}" autocomplete="off" class="form-horizontal">
            @csrf
            <input name="_method" type="hidden" value="PUT">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Update Caste') }}</h4>
                <p class="card-category">{{ __('Caste Management') }}</p>
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
                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="Name" required="true" aria-required="true" value="{{ isset($cast) ?$cast->name : old('name') }}"/>
                        @if ($errors->has('name'))
                          <span id="name-error" class="error text-danger" for="input-title">{{ $errors->first('title') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                
                
                  <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Parent Caste') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('parent_id') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('parent_id') ? ' is-invalid' : '' }}" name="parent_id"  id="input-parent_id" >
                          <option value="0">Please Select</option>
                          @foreach ($pcast as $p) 
                                <option value="{{$p->id}}" {{ ((isset($cast->parent_id) && $cast->parent_id == $p->id)) ? 'selected' : ((old('country') == $p->id) ? 'selected' : '') }}>
                                                {{$p->name}}
                                </option>
                            @endforeach

                      </select>
                      @if ($errors->has('parent_id'))
                        <span id="parent_id-error" class="error text-danger" >{{ $errors->first('parent_id') }}</span>
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


