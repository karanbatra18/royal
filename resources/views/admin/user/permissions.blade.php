@extends('layouts.dashboard', [ 'titlePage' => __('Permissions')])

@section('content')

    @push('head')
        <!-- DataTables CSS -->
        <link href="{{ asset('admin-theme/startmin-master') }}/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="{{ asset('admin-theme/startmin-master') }}/css/dataTables/dataTables.responsive.css" rel="stylesheet">
    @endpush



    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Permissions</h4>
                            <p class="card-category"> Manage user Permissions</p>
                        </div>
                        <div class="card-body">

                    @if(!empty($user))
                        <form name="user_permissions" method="post" action="{{ route('admin.permissions.update', ['user' => $user->id]) }}">
                            @csrf
                            @endif

                            <div class="form-group">
                                <label>Select User</label>
                                <select name="users" class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                    @if($users->count())
                                        <option value="{{ route('admin.permissions.update') }}">Select User</option>
                                        @foreach($users as $userOne)

                                            <option {{ route('admin.permissions.update',['user' => $userOne->id]) == url()->current() ? 'selected' : '' }} value="{{ route('admin.permissions.update',['user' => $userOne->id]) }}">{{ $userOne->full_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <br/>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>Modules</th>
                                        <th>Add</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                        <th>User Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($siteModules->count())
                                        @foreach($siteModules as $siteModule)
                                            <tr>
                                                <td>{{ $siteModule->name }}</td>
                                                @php
                                                    $permission = $user ? getModulePermission($user->id, $siteModule->id) : null;
                                                @endphp
                                                <td><input type="hidden" name="permission[{{ $siteModule->id }}][can_write]" value="0"><input {{ ($permission && $permission->can_write == 1) ? 'checked' : '' }} type="checkbox" name="permission[{{ $siteModule->id }}][can_write]" value="1"></td>
                                                <td><input type="hidden" name="permission[{{ $siteModule->id }}][can_edit]" value="0"><input {{ ($permission && $permission->can_edit == 1) ? 'checked' : '' }} type="checkbox" name="permission[{{ $siteModule->id }}][can_edit]" value="1"></td>
                                                <td><input type="hidden" name="permission[{{ $siteModule->id }}][can_delete]" value="0"><input {{ ($permission && $permission->can_delete == 1) ? 'checked' : '' }} type="checkbox" name="permission[{{ $siteModule->id }}][can_delete]" value="1"></td>
                                                @if($siteModule->id == 1)
                                                <td><input type="hidden" name="permission[{{ $siteModule->id }}][can_activate]" value="0"><input {{ ($permission && $permission->can_activate == 1) ? 'checked' : '' }} type="checkbox" name="permission[{{ $siteModule->id }}][can_activate]" value="1"></td>
                                                @else
                                                    <td><input type="hidden" name="permission[{{ $siteModule->id }}][can_activate]" value="0"><input {{ ($permission && $permission->can_activate == 1) ? 'checked' : '' }} type="checkbox" disabled name="permission[{{ $siteModule->id }}][can_activate]" value="1"></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    @endif

                                    </tbody>
                                </table>
                            </div>
                            @if(!empty($user))
                                <button type="submit" class="btn btn-warning">Submit</button>
                        </form>
                    @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
        <!-- DataTables JavaScript -->
        <script src="{{ asset('admin-theme/startmin-master') }}/js/dataTables/jquery.dataTables.min.js"></script>
        <script src="{{ asset('admin-theme/startmin-master') }}/js/dataTables/dataTables.bootstrap.min.js"></script>
        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                /*  $('#dataTables-example').DataTable({
                      responsive: true
                  });*/
            });
        </script>
@endsection

