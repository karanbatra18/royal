@extends('layouts.dashboard', [ 'titlePage' => __('Birthday Listing')])

@section('content')

 <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="">
                     
                        <div class="row">
                         
                                <div class="col-md-6">
                                  <div class="form-group">
                                     
                                    <input class="form-control datepicker" name="birthday_date" id="birthday_date" type="text" placeholder="{{ __('Birthday Date') }}" value="{{ $birthdayDate }}" required="true" aria-required="true"/>
                                  </div>
                                </div>

                        </div>
                         
                     
                        
                        </div>
                    </div>
                
                
                     <div class="col-md-6">
                        <div class="">
                     
                        <form method="post" action="" autocomplete="off" class="form-horizontal">
                        @csrf
                        <div class="row">
                           
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <select  class="form-control" name="action_by" id="action_by"  required="true">
                                        <option value="">Please select</option>
                                        <option value="email">Email</option>
                                        <option value="sms">Sms</option>
                                     </select>   
                                  </div>
                                </div>
                                <input type="hidden" name="birthday_users" value="" id="birthday_users">
                                <div class="col-md-6">
                                <button type="submit" id="birthday_users_submit" class="btn btn-primary">{{ __('Go') }}</button>
                                </div>
                        </div>
                         
                        </form>
                        
                        </div>
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
                            <h4 class="card-title ">Birthday Lisitng</h4>
                        </div>
                        <div class="card-body">
                          
                            <div class="table-responsive">
                                <table class="table">
                                      @if($users->count())
                                  
                                    <thead class=" text-primary">
                                     <tr>
                                       <th class="text-right">
                                            <input type="checkbox" class="checked_all">
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Phone
                                        </th>
                                      
                                    </tr>
                                    </thead>
                                    <tbody>
                                  
                                    @foreach($users as $user)
                                        @if($user->email != 'admin@gmail.com')
                                        <tr>
                                                 <td class="td-actions text-right">
                                                    <input type="checkbox" class="checkbox" value="{{$user->id}}" >
                                                </a>
                                            </td>
                                            <td>
                                                {{$user->first_name.' '.$user->last_name}}
                                            </td>

                                            <td>
                                                {{$user->email}}
                                            </td>
                                            <td>
                                                {{$user->phone}}
                                            </td>
                                       
                                        </tr>
                                        @endif
                                        @endforeach
                                        @else
                                            
                                        <p>No Data found.</p>
                                 
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
    <script>

        $(document).ready(function(){
            $('.datepicker').datepicker({ format:"yyyy-mm-dd" });

            $('#birthday_users_submit').on('click', function(){

                var dataVal = $('#birthday_date').val();
                location.href="{{ url('admin/birthday') }}"+'/'+dataVal;
            });
        });
    </script>

@endsection

