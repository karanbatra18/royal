@extends('layouts.dashboard', [ 'titlePage' => __('User Profile')])

@section('content')
    @php
        $permission = getModulePermission(auth()->id(), 1);
    @endphp

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
                            <h4 class="card-title ">Users</h4>
                            <p class="card-category"> Manage users</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @if(auth()->user()->role_id == 1 || !empty($permission) && $permission->can_write == 1)
                                <div class="col-12 text-right">
                                    <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">Add user</a>
                                </div>
                                    @endif
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered data-table">
                                    <thead>
                                    <tr>
                                        <th>Index</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Vip Profile</th>
                                        <th>Status</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                {{--<table class="table">
                                    <thead class=" text-primary">
                                    <tr>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Phone
                                        </th>
                                        <th class="text-right">
                                            Actions
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($users->count())
                                    @foreach($users as $user)
                                        @if($user->email != 'admin@gmail.com')
                                        <tr>
                                            <td>
                                                {{$user->first_name.' '.$user->last_name}}
                                            </td>

                                            <td>
                                                {{$user->email}}
                                            </td>
                                            <td>
                                                {{$user->phone}}
                                            </td>
                                            <td class="td-actions text-right">

                                                <a rel="tooltip" class="btn btn-success btn-link"
                                                   href="{{ route('user.edit' , ['user_id' => $user->id]) }}"
                                                   data-original-title="" title="">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>--}}
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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('user.index') }}",
                "initComplete": function (settings, json) {
                    console.log(json);
                    // call your function here
                    /*  $(".switch").enhancedSwitch();
                      // Set the second switch to be active after it has been initialised
                      $(".switch.active").enhancedSwitch('setTrue');*/
                },
                "drawCallback": function (settings) {
                    $(".switch").enhancedSwitch();
                    $(".switch_vip").enhancedSwitch();
                    // Set the second switch to be active after it has been initialised
                    $(".switch.active").enhancedSwitch('setTrue');
                    $(".switch_vip.active").enhancedSwitch('setTrue');
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'first_name', name: 'first_name'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'vip_status', name: 'vip_status'},
                    {data: 'userStatus', name: 'userStatus'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $('body').on('click', '.deleteProduct', function () {
                var user_id = $(this).data("id");
                swal({
                        title: "Are you sure to delete this user ?",
                        text: "Delete Confirmation?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Delete",
                        closeOnConfirm: false
                    },
                    function () {

                        $.ajax({
                            type: "DELETE",
                            url: "{{ url('admin/users') }}" + '/' + user_id,
                            success: function (data) {
                                table.draw();
                                swal("Deleted!", "User successfully Deleted!", "success");
                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });
                    });
            });


            // $(".switch").enhancedSwitch();

            $('body').on('click', '.switch', function () {
                var selectedSwitch = $(this);
                swal({
                        title: "Are you sure?",
                        text: "Are you sure you want to proceed!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Yes, I am sure!',
                        cancelButtonText: "No, cancel it!",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function (isConfirm) {

                        if (isConfirm) {

                            var user_id = $(selectedSwitch).data("id");
                            selectedSwitch.enhancedSwitch('toggle');
                            var status = selectedSwitch.enhancedSwitch('state') ? 1 : 0;
                            $.ajax({
                                type: "post",
                                url: "{{ url('admin/users/status') }}" + '/' + user_id,
                                data: {'status': status},
                                success: function (data) {
                                    // table.draw();
                                    swal("Updated!", "Status successfully updated!", "success");
                                },
                                error: function (data) {
                                    console.log('Error:', data);
                                }
                            });
                        } else {
                            swal("Cancelled", "Your action is terminated :)", "error");
                            e.preventDefault();
                        }

                    });
            });

            $('body').on('click', '.switch_vip', function (e) {
                var selectedSwitch = $(this);
                swal({
                        title: "Are you sure?",
                        text: "Are you sure you want to proceed!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Yes, I am sure!',
                        cancelButtonText: "No, cancel it!",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function (isConfirm) {

                        if (isConfirm) {

                            var user_id = $(selectedSwitch).data("id");
                            selectedSwitch.enhancedSwitch('toggle');
                            var status = selectedSwitch.enhancedSwitch('state') ? 1 : 0;
                            $.ajax({
                                type: "post",
                                url: "{{ url('admin/users/vip') }}" + '/' + user_id,
                                data: {'status': status},
                                success: function (data) {
                                    // table.draw();
                                    swal("Updated!", "Vip Status updated!", "success");
                                },
                                error: function (data) {
                                    console.log('Error:', data);
                                }
                            });

                        } else {
                            swal("Cancelled", "Your action is terminated :)", "error");
                            e.preventDefault();
                        }

                    });
            });
        });
    </script>
@endsection