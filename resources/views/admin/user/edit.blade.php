@extends('layouts.dashboard', [ 'titlePage' => __('User Profile')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('user.store') }}" autocomplete="off" class="form-horizontal">
            @csrf

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
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
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
                          <option value="M">Male</option>
                          <option value="F">Female</option>
                          <option value="tg">TransGender</option>
                    </select>
                      @if ($errors->has('gender'))
                        <span id="gender-error" class="error text-danger" >{{ $errors->first('gender') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                
                  <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Height') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('height') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('height') ? ' is-invalid' : '' }}" name="height" id="input-height" type="text" placeholder="{{ __('Height') }}" value="" required />
                      @if ($errors->has('height'))
                        <span id="height-error" class="error text-danger" for="input-email">{{ $errors->first('height') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                   <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Religion') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('religion') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('religion') ? ' is-invalid' : '' }}" name="religion" id="input-religion" required >
                          <option value="">Please select</option>
                          <option value="hindu">Hindu</option>
                          <option value="muslim">Muslim</option>
                          <option value="sikh">Sikh</option>
                    </select>
                      @if ($errors->has('religion'))
                        <span id="religion-error" class="error text-danger" >{{ $errors->first('religion') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Cast') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('cast') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('cast') ? ' is-invalid' : '' }}" name="cast" id="input-cast" required >
                          <option value="">Please select</option>
                          <option value="punjabi">Punjabi</option>
                         
                    </select>
                      @if ($errors->has('cast'))
                        <span id="cast-error" class="error text-danger" >{{ $errors->first('cast') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Sub Cast') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('sub_cast') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('sub_cast') ? ' is-invalid' : '' }}" name="sub_cast" id="input-sub_cast" required >
                          <option value="">Please select</option>
                          <option value="punjabi">punjabi</option>
                        
                    </select>
                      @if ($errors->has('sub_cast'))
                        <span id="sub_cast-error" class="error text-danger" >{{ $errors->first('sub_cast') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                      <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Mother Tongue') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('tongue') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('tongue') ? ' is-invalid' : '' }}" name="tongue" id="input-tongue" required >
                          <option value="">Please select</option>
                          <option value="hindi">Hindi</option>
                          <option value="english">English</option>
                          <option value="punjabi">Punjabi</option>
                          <option value="urdu">Urdu</option>
                          <option value="marathi">Mrathi</option>
                          
                    </select>
                      @if ($errors->has('tongue'))
                        <span id="tongue-error" class="error text-danger" >{{ $errors->first('tongue') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                
                
                 <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Country') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('country') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" id="input-tongue" required >
                          <option value="">Please select</option>
                          <option value="India">India</option>
                                 
                    </select>
                      @if ($errors->has('country'))
                        <span id="country-error" class="error text-danger" >{{ $errors->first('country') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                
                 <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('State') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('state') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" id="input-state" required >
                        <option value="">Please select</option>
                          <option value="India">India</option>
                            
                    </select>
                      @if ($errors->has('state'))
                        <span id="state-error" class="error text-danger" >{{ $errors->first('state') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                
                 <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('City') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('city') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" id="input-city" required >
                           <option value="">Please select</option>
                          <option value="India">India</option>
                        
                          
                    </select>
                      @if ($errors->has('city'))
                        <span id="city-error" class="error text-danger" >{{ $errors->first('city') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                
                 <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Annual Income') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('annaual_income') ? ' has-danger' : '' }}">
                       <input class="form-control{{ $errors->has('annaual_income') ? ' is-invalid' : '' }}" name="annaual_income" id="input-annaual_income" type="text" placeholder="{{ __('Annual Income') }}" value="" required />
                  
                      @if ($errors->has('annaual_income'))
                        <span id="annaual_income-error" class="error text-danger" >{{ $errors->first('annaual_income') }}</span>
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
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
                    <input type="file" name="file[]" class="custom-file-input" id="inputGroupFile02">
                    <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                  </div>
                
                </div>
                </div>      
              
                    <div class="row">
                    <div class="input-group mb-3">
                  <div class="custom-file">
                    <input type="file" name="file[]" class="custom-file-input" id="inputGroupFile02">
                    <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
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
        
        
            <div class="row">
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
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
                      <input class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" id="input-dob" type="text" placeholder="{{ __('Date Of Birth') }}" value="" required />
                    
                      @if ($errors->has('dob'))
                        <span id="dob-error" class="error text-danger" >{{ $errors->first('dob') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                 <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Marital Status') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('married') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('married') ? ' is-invalid' : '' }}" name="married" id="input-married" required >
                          <option value="">Please select</option>
                          <option value="single">Single</option>
                          <option value="married">Married</option>
                          <option value="divorce">Divorced</option>
                    </select>
                      @if ($errors->has('married'))
                        <span id="married-error" class="error text-danger" >{{ $errors->first('married') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                
                       <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Profile Manage By') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('profile_by') ? ' has-danger' : '' }}">
                       <input class="form-control{{ $errors->has('profile_by') ? ' is-invalid' : '' }}" name="profile_by" id="input-profile_by" type="text" placeholder="{{ __('Profile By') }}" value="" required />
                  
                      @if ($errors->has('profile_by'))
                        <span id="profile_by-error" class="error text-danger" >{{ $errors->first('profile_by') }}</span>
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
                      <textarea class="form-control{{ $errors->has('personal_detail') ? ' is-invalid' : '' }}" name="personal_detail" id="input-personal_detail"  placeholder="{{ __('Personal Details') }}"></textarea>
                    
                      @if ($errors->has('personal_detail'))
                        <span id="personal_detail-error" class="error text-danger" >{{ $errors->first('personal_detail') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              
                  
                          
                  <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Weight') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('weight') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" name="weight" id="input-weight" type="text" placeholder="{{ __('Weight') }}" value="" required />
                      @if ($errors->has('weight'))
                        <span id="weight-error" class="error text-danger" for="input-weight">{{ $errors->first('weight') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                  
                  
                      <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Body Type') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('body_type') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('body_type') ? ' is-invalid' : '' }}" name="body_type" id="input-body_type" >
                          <option value="">Please select</option>
                         
                    </select>
                      @if ($errors->has('body_type'))
                        <span id="body_type-error" class="error text-danger" >{{ $errors->first('body_type') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                  
                  
                      <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Complexion') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('complexion') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('complexion') ? ' is-invalid' : '' }}" name="complexion" id="input-complexion"  >
                          <option value="">Please select</option>
           
                    </select>
                      @if ($errors->has('complexion'))
                        <span id="complexion-error" class="error text-danger" >{{ $errors->first('complexion') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                  
                  
                
                
                  
                        <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Challanged') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('challanged') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('challanged') ? ' is-invalid' : '' }}" name="challanged" id="input-challanged" type="text" placeholder="{{ __('Challanged') }}" value=""  />
                      @if ($errors->has('challanged'))
                        <span id="challanged-error" class="error text-danger" for="input-challanged">{{ $errors->first('challanged') }}</span>
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
   
          
           <div class="row">
        <div class="col-md-12">
          <form method="post" action="" class="form-horizontal">
            @csrf
         
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
                      <textarea class="form-control{{ $errors->has('education') ? ' is-invalid' : '' }}" name="education" id="input-education"  placeholder="{{ __('Education') }}"></textarea>
                    
                      @if ($errors->has('education'))
                        <span id="education-error" class="error text-danger" >{{ $errors->first('education') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              
                  
                  
                          
                  
                  
                  
                      <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Higher Education') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('higher_education') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('higher_education') ? ' is-invalid' : '' }}" name="higher_education" id="input-higher_education" >
                          <option value="">Please select</option>
                          <option value="phd">PHD</option>
                             <option value="btech">B.Tech</option>
                       
                         
                    </select>
                      @if ($errors->has('higher_education'))
                        <span id="higher_education-error" class="error text-danger" >{{ $errors->first('higher_education') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                  
                  
                  
                  
                          
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('College') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('college') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('college') ? ' is-invalid' : '' }}" name="college" id="input-college" type="text" placeholder="{{ __('College') }}" value="" />
                      @if ($errors->has('college'))
                        <span id="college-error" class="error text-danger" for="input-college">{{ $errors->first('college') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                  
                    <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('School') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('school') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('school') ? ' is-invalid' : '' }}" name="school" id="input-school" type="text" placeholder="{{ __('School') }}" value="" />
                      @if ($errors->has('school'))
                        <span id="school-error" class="error text-danger" for="input-school">{{ $errors->first('school') }}</span>
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
   
        
               <div class="row">
        <div class="col-md-12">
          <form method="post" action="" class="form-horizontal">
            @csrf
         
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Career') }}</h4>
                <p class="card-category">{{ __('Career') }}</p>
              </div>
              <div class="card-body ">
               
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('About Career') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('career') ? ' has-danger' : '' }}">
                      <textarea class="form-control{{ $errors->has('career') ? ' is-invalid' : '' }}" name="career" id="input-career"  placeholder="{{ __('Career') }}"></textarea>
                    
                      @if ($errors->has('career'))
                        <span id="career-error" class="error text-danger" >{{ $errors->first('career') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                  
                           
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Employed In') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('employed') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('employed') ? ' is-invalid' : '' }}" name="employed" id="input-employed" type="text" placeholder="{{ __('Employed In') }}" value="" />
                      @if ($errors->has('employed'))
                        <span id="employed-error" class="error text-danger" for="input-employed">{{ $errors->first('employed') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                  
              
                      
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Occupation') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('occupation') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('occupation') ? ' is-invalid' : '' }}" name="occupation" id="input-occupation" type="text" placeholder="{{ __('Occupation') }}" value="" />
                      @if ($errors->has('occupation'))
                        <span id="occupation-error" class="error text-danger" for="input-occupation">{{ $errors->first('occupation') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                  
                           
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Organization Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('organization') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('organization') ? ' is-invalid' : '' }}" name="organization" id="input-organization" type="text" placeholder="{{ __('Organization Name') }}" value="" />
                      @if ($errors->has('organization'))
                        <span id="organization-error" class="error text-danger" for="input-organization">{{ $errors->first('organization') }}</span>
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
   
     
                 <div class="row">
        <div class="col-md-12">
          <form method="post" action="" class="form-horizontal">
            @csrf
         
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
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="" required />
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
                      <input class="form-control{{ $errors->has('alternate_email') ? ' is-invalid' : '' }}" name="alternate_email" id="input-alternate_email" type="alternate_email" placeholder="{{ __('Alternate Email') }}" value="" required />
                      @if ($errors->has('alternate_email'))
                        <span id="alternate_email-error" class="error text-danger" for="input-alternate_email">{{ $errors->first('alternate_email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                  
                         <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Phone') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                       <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" id="input-phone" type="text" placeholder="{{ __('Phone') }}" value="" required />
                   
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
                       <input class="form-control{{ $errors->has('alternate_phone') ? ' is-invalid' : '' }}" name="alternate_phone" id="input-alternate_phone" type="text" placeholder="{{ __('Alternate Phone') }}" value="" required />
                   
                      @if ($errors->has('alternate_phone'))
                        <span id="alternate_phone-error" class="error text-danger" >{{ $errors->first('alternate_phone') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
             
                           <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Family Phone Number') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('family_phone') ? ' has-danger' : '' }}">
                       <input class="form-control{{ $errors->has('family_phone') ? ' is-invalid' : '' }}" name="family_phone" id="input-family_phone" type="text" placeholder="{{ __('Family Phone Number') }}" value="" required />
                   
                      @if ($errors->has('family_phone'))
                        <span id="family_phone-error" class="error text-danger" >{{ $errors->first('family_phone') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
             
              
                  
            <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Landline') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('landline') ? ' has-danger' : '' }}">
                       <input class="form-control{{ $errors->has('landline') ? ' is-invalid' : '' }}" name="landline" id="input-landline" type="text" placeholder="{{ __('Landline') }}" value="" required />
                   
                      @if ($errors->has('landline'))
                        <span id="landline-error" class="error text-danger" >{{ $errors->first('landline') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                  
                  
                               <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Whatsup') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('whatsup') ? ' has-danger' : '' }}">
                       <input class="form-control{{ $errors->has('whatsup') ? ' is-invalid' : '' }}" name="whatsup" id="input-whatsup" type="text" placeholder="{{ __('Whatsup') }}" value="" required />
                   
                      @if ($errors->has('whatsup'))
                        <span id="whatsup-error" class="error text-danger" >{{ $errors->first('whatsup') }}</span>
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
   
   
        
        
             <div class="row">
        <div class="col-md-12">
          <form method="post" action="" class="form-horizontal">
            @csrf
         
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Kundli') }}</h4>
                <p class="card-category">{{ __('Kundli') }}</p>
              </div>
              <div class="card-body ">
               
             
                           
                 <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Time of Birth') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('time_of_birth') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('time_of_birth') ? ' is-invalid' : '' }}" name="time_of_birth" id="input-time_of_birth" type="time" placeholder="{{ __('Time of Birth') }}" value="" />
                      @if ($errors->has('time_of_birth'))
                        <span id="time_of_birth-error" class="error text-danger" for="input-time_of_birth">{{ $errors->first('time_of_birth') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                  
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Place of Birth') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('place_of_birth') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('place_of_birth') ? ' is-invalid' : '' }}" name="place_of_birth" id="input-place_of_birth" type="text" placeholder="{{ __('Place of Birth') }}" value="" />
                      @if ($errors->has('place_of_birth'))
                        <span id="place_of_birth-error" class="error text-danger" for="input-place_of_birth">{{ $errors->first('place_of_birth') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                  
              
                     <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Mangalik Status') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('manglik') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('manglik') ? ' is-invalid' : '' }}" name="manglik" id="input-manglik" required >
                          <option value="">Please select</option>
                          <option value="yes">Yes</option>
                          <option value="no">No</option>
                    </select>
                      @if ($errors->has('manglik'))
                        <span id="manglik-error" class="error text-danger" >{{ $errors->first('manglik') }}</span>
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
   
        
             <div class="row">
        <div class="col-md-12">
          <form method="post" action="" class="form-horizontal">
            @csrf
         
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('LifeStyle') }}</h4>
                <p class="card-category">{{ __('LifeStyle') }}</p>
              </div>
              <div class="card-body ">
               
             
                           
                 <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Veg/NonVeg') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('veg') ? ' has-danger' : '' }}">
                      <input class="{{ $errors->has('veg') ? ' is-invalid' : '' }}" name="veg" id="input-veg" type="checkbox" />
                      @if ($errors->has('veg'))
                        <span id="veg-error" class="error text-danger" for="input-veg">{{ $errors->first('veg') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                  
                  
                               
                 <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Drink') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('drink') ? ' has-danger' : '' }}">
                      <input class="{{ $errors->has('drink') ? ' is-invalid' : '' }}" name="drink" id="input-drink" type="checkbox" />
                      @if ($errors->has('drink'))
                        <span id="drink-error" class="error text-danger" for="input-drink">{{ $errors->first('drink') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                  
              
                                 
               <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Somke') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('smoke') ? ' has-danger' : '' }}">
                      <input class="{{ $errors->has('smoke') ? ' is-invalid' : '' }}" name="smoke" id="input-smoke" type="checkbox" />
                      @if ($errors->has('smoke'))
                        <span id="smoke-error" class="error text-danger" for="input-smoke">{{ $errors->first('smoke') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                  
                    <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Own a House') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('house') ? ' has-danger' : '' }}">
                      <input class="{{ $errors->has('house') ? ' is-invalid' : '' }}" name="house" id="input-house" type="checkbox" />
                      @if ($errors->has('house'))
                        <span id="house-error" class="error text-danger" for="input-house">{{ $errors->first('house') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                  
                    <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Own a Car') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('car') ? ' has-danger' : '' }}">
                      <input class="{{ $errors->has('car') ? ' is-invalid' : '' }}" name="car" id="input-car" type="checkbox" />
                      @if ($errors->has('car'))
                        <span id="car-error" class="error text-danger" for="input-car">{{ $errors->first('car') }}</span>
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
        
        
          
             <div class="row">
        <div class="col-md-12">
          <form method="post" action="" class="form-horizontal">
            @csrf
         
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
                      <input class="form-control{{ $errors->has('father_name') ? ' is-invalid' : '' }}" name="father_name" id="input-father_name" type="text" placeholder="{{ __('Father Name') }}" value="" />
                      @if ($errors->has('father_name'))
                        <span id="father_name-error" class="error text-danger" for="input-father_name">{{ $errors->first('father_name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                  
                  
                            <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Father Occupation') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('father_occupation') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('father_occupation') ? ' is-invalid' : '' }}" occupation="father_occupation" id="input-father_occupation" type="text" placeholder="{{ __('Father Occupation') }}" value="" />
                      @if ($errors->has('father_occupation'))
                        <span id="father_occupation-error" class="error text-danger" for="input-father_occupation">{{ $errors->first('father_occupation') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                  
                  
                      <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Mother Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('mother_name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('mother_name') ? ' is-invalid' : '' }}" name="mother_name" id="input-mother_name" type="text" placeholder="{{ __('Mother Name') }}" value="" />
                      @if ($errors->has('mother_name'))
                        <span id="mother_name-error" class="error text-danger" for="input-mother_name">{{ $errors->first('mother_name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                  
                  
                            <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Mother Occupation') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('mother_occupation') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('mother_occupation') ? ' is-invalid' : '' }}" occupation="mother_occupation" id="input-mother_occupation" type="text" placeholder="{{ __('Mother Occupation') }}" value="" />
                      @if ($errors->has('mother_occupation'))
                        <span id="mother_occupation-error" class="error text-danger" for="input-mother_occupation">{{ $errors->first('mother_occupation') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
             
                  
              
                     <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Gothra') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('gothra') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('gothra') ? ' is-invalid' : '' }}" name="gothra" id="input-gothra" required >
                          <option value="">Please select</option>
                          <option value="Sanatan">Sanatan</option>
                       
                    </select>
                      @if ($errors->has('gothra'))
                        <span id="gothra-error" class="error text-danger" >{{ $errors->first('gothra') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                   
                 <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Family Income') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('family_income') ? ' has-danger' : '' }}">
                       <input class="form-control{{ $errors->has('family_income') ? ' is-invalid' : '' }}" name="family_income" id="input-family_income" type="text" placeholder="{{ __('Family Income') }}" value="" required />
                  
                      @if ($errors->has('family_income'))
                        <span id="family_income-error" class="error text-danger" >{{ $errors->first('family_income') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                  
                    <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Living with Parents') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('livingwithparent') ? ' has-danger' : '' }}">
                      <input class="{{ $errors->has('livingwithparent') ? ' is-invalid' : '' }}" name="livingwithparent" id="input-livingwithparent" type="checkbox" />
                      @if ($errors->has('livingwithparent'))
                        <span id="livingwithparent-error" class="error text-danger" for="input-livingwithparent">{{ $errors->first('livingwithparent') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                  
                    <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Willing to go abroad') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('abroad') ? ' has-danger' : '' }}">
                      <input class="{{ $errors->has('abroad') ? ' is-invalid' : '' }}" name="abroad" id="input-abroad" type="checkbox" />
                      @if ($errors->has('abroad'))
                        <span id="abroad-error" class="error text-danger" for="input-abroad">{{ $errors->first('abroad') }}</span>
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

