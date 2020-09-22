@extends('layouts.dashboard', [ 'titlePage' => __('Email Template')])

@section('content')


  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('email.store') }}" autocomplete="off" class="form-horizontal">
            @csrf

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Email Tempalte') }}</h4>
                <p class="card-category">{{ __('Email Template') }}</p>
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
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                          <textarea class="tinymce-editor form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-description"  required="true" aria-required="true">{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                          <span id="description-error" class="error text-danger" for="input-description">{{ $errors->first('description') }}</span>
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
                            <h4 class="card-title ">Email Template</h4>
                            <p class="card-category"> Manage Email Template</p>
                        </div>
                        <div class="card-body">
                           
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <tr>
                                        <th>
                                            Title
                                        </th>
                                       
                                        <th class="text-right">
                                            Actions
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($email->count())
                                    @foreach($email as $emails)
                                        <tr>
                                            <td>
                                                {{$emails->title}}
                                            </td>

                                            
                                            <td class="td-actions text-right">

                                                <a rel="tooltip" class="btn btn-success btn-link"
                                                   href="{{ route('email.edit' , ['email_id' => $emails->id]) }}"
                                                   data-original-title="" title="">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </td>
                                        </tr>

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
@section('script')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>  
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea.tinymce-editor',
            height: 200,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code  wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ',
            content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
    </script>

@endsection
