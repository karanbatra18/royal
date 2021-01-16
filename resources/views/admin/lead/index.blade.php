@extends('layouts.dashboard', [ 'titlePage' => __('Lead Management')])

@section('content')
    <script src="{{ asset('assets/js/jquery-3.5.1.slim.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Leads</h4>
                            <p class="card-category"> Manage Leads</p>
                        </div>
                        <div class="card-body">
                             <form method="post" action="{{ route('lead.search') }}" autocomplete="off" class="form-horizontal">
                                
                              <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('from_date') ? ' has-danger' : '' }}">
                      <input class="datepicker form-control{{ $errors->has('from_date') ? ' is-invalid' : '' }}" name="from_date" id="from_date" type="text" placeholder="{{ __('From') }}" value="{{ old('from_date') }}" required autocomplete="off" />
                    
                      @if ($errors->has('from_date'))
                        <span id="from_date-error" class="error text-danger" >{{ $errors->first('from_date') }}</span>
                      @endif
                    </div>
                  </div>
                                  
                                    <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('to_date') ? ' has-danger' : '' }}">
                      <input class="datepicker form-control{{ $errors->has('to_date') ? ' is-invalid' : '' }}" name="to_date" id="to_date" type="text" placeholder="{{ __('To') }}" value="{{ old('to_date') }}" required autocomplete="off" />
                    
                      @if ($errors->has('to_date'))
                        <span id="to_date-error" class="error text-danger" >{{ $errors->first('to_date') }}</span>
                      @endif
                    </div>
                  </div>
                                   <button type="button"  id="go" class="btn btn-primary">{{ __('Go') }}</button>
                </div>
                                 
                                 
                             </form> 
                            <div class="table-responsive">
                                <table class="table table-bordered data-table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Source</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.enhanced-switch-apple.css') }}"/>

    <script src="{{ asset('assets/js/jquery.enhanced-switch.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            var from_date=$('#from_date').val();
            var to_date=$('#to_date').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.data-table').DataTable({
                dom: 'Bfrtip',
                processing: true,
                serverSide: true,
                ajax: {
    url:'{{ route("lead.index") }}',
    data:{from_date:from_date, to_date:to_date}
   },
              //  ajax: "{{ route('lead.index') }}",
                "initComplete":function( settings, json){
                    console.log(json);
                    // call your function here
                  /*  $(".switch").enhancedSwitch();
                    // Set the second switch to be active after it has been initialised
                    $(".switch.active").enhancedSwitch('setTrue');*/
                },
            
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'source', name: 'source'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                buttons: ['csv']
            });

          
      

        });
    
          $('#go').click(function () {
            var from_date=$('#from_date').val();
            var to_date=$('#to_date').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
 $('.data-table').DataTable().destroy();
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
    url:'{{ route("lead.index") }}',
    data:{from_date:from_date, to_date:to_date}
   },
              //  ajax: "{{ route('lead.index') }}",
                "initComplete":function( settings, json){
                    console.log(json);
                    // call your function here
                  /*  $(".switch").enhancedSwitch();
                    // Set the second switch to be active after it has been initialised
                    $(".switch.active").enhancedSwitch('setTrue');*/
                },
            
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'source', name: 'source'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

          
      

        });
  
    </script>
    
    <script>

        $(document).ready(function(){
            $('#from_date').datepicker({ format:"yyyy-mm-dd" });

            $('#to_date').datepicker({ format:"yyyy-mm-dd" });
        });
    </script>


@endsection