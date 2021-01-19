@extends('layouts.dashboard', [ 'titlePage' => __('Membership')])

@section('content')
    @php
        $permission = getModulePermission(auth()->id(), 5);
    @endphp
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Membership</h4>
                            <p class="card-category"> Manage Membership</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @if(auth()->user()->role_id == 1 || !empty($permission) && $permission->can_write == 1)
                                    <div class="col-12 text-right">
                                        <a href="{{ route('membership.create') }}" class="btn btn-sm btn-primary">Add Membership</a>
                                    </div>
                                @endif
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <tr>
                                        <th>
                                            Title
                                        </th>
                                        <th>
                                            Caste
                                        </th>
                                       <th>
                                            Cost
                                        </th>
                                     
                                        <th class="text-right">
                                            Actions
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($memberships->count())
                                    @foreach($memberships as $membership)
                                        <tr>
                                            <td>
                                                {{$membership->title}}
                                            </td>

                                            <td>
                                                {{$membership->caste}}
                                            </td>
                                            <td>
                                                {{$membership->cost}}
                                            </td>
                                            <td class="td-actions text-right">
                                                @if(auth()->user()->role_id == 1 || !empty($permission) && $permission->can_edit == 1)
                                                <a rel="tooltip" class="btn btn-success btn-link"
                                                   href="{{ route('membership.edit' , ['membership_id' => $membership->id]) }}"
                                                   data-original-title="" title="">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                    @endif
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