@extends('layouts.dashboard', [ 'titlePage' => __('Email Template')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('email.update', ['email_id' => $email->id]) }}" autocomplete="off" class="form-horizontal">
            @csrf
            <input name="_method" type="hidden" value="PUT">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Email Template') }}</h4>
                <p class="card-category">{{ __('Email Template Management') }}</p>
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
                        <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="input-title" type="text" placeholder="Title" required="true" aria-required="true" value="{{ (isset($email) ?$email->title : old('title')) }}"/>
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
                          <textarea rows="40" cols="20" name="description" class="tinymce-editor{{ $errors->has('description') ? ' is-invalid' : '' }}"  id="input-description"  required="true" aria-required="true">{{ (isset($email) ?$email->description : old('description')) }}</textarea>
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
