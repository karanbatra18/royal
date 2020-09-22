@extends('layouts.dashboard', [ 'titlePage' => __('Caste')])

@section('content')


  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('caste.store') }}" autocomplete="off" class="form-horizontal">
            @csrf

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Caste') }}</h4>
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
                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="Name" required="true" aria-required="true" value="{{ old('name') }}"/>
                        @if ($errors->has('name'))
                          <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
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
                          @if($pCasts->count())
                          @foreach ($pCasts as $p)
                                <option value="{{$p->id}}">
                                                {{$p->name}}
                                </option>
                            @endforeach
@endif
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


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Caste</h4>
                            <p class="card-category"> Manage Caste</p>
                        </div>
                        <div class="card-body">
                           
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <tr>
                                        <th>
                                            Name
                                        </th>
                                       
                                        <th class="text-right">
                                            Actions
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($pCasts->count())
                                    @foreach($pCasts as $cast)
                                        <tr>
                                            <td>
                                                {{$cast->name}}
                                            </td>

                                            
                                            <td class="td-actions text-right">

                                                <a rel="tooltip" class="btn btn-success btn-link"
                                                   href="{{ route('caste.edit' , ['caste_id' => $cast->id]) }}"
                                                   data-original-title="" title="">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </td>
                                        </tr>
                                        @if($cast->subCastes)
                                            @foreach($cast->subCastes as $subCast)
                                                <tr>
                                                    <td>
                                                        ---- {{$subCast->name}}
                                                    </td>


                                                    <td class="td-actions text-right">

                                                        <a rel="tooltip" class="btn btn-success btn-link"
                                                           href="{{ route('caste.edit' , ['caste_id' => $subCast->id]) }}"
                                                           data-original-title="" title="">
                                                            <i class="material-icons">edit</i>
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @endif

                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection