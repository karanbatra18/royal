@extends('layouts.dashboard', [ 'titlePage' => __('Swyamber')])

@section('content')
    @php
        $permission = getModulePermission(auth()->id(), 4);
    @endphp
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Swyamber</h4>
                            <p class="card-category"> Manage Swyamber</p>
                        </div>
                        <div class="card-body">
                            @if(auth()->user()->role_id == 1 || !empty($permission) && $permission->can_write == 1)
                                <div class="col-12 text-right">
                                    <a href="{{ route('swyamber.create') }}" class="btn btn-sm btn-primary">Add Swyamber</a>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <tr>
                                        <th>
                                            Title
                                        </th>
                                        <th>
                                            Place
                                        </th>
                                       <th>
                                            Date
                                        </th>
                                     
                                        <th class="text-right">
                                            Actions
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($swyambers->count())
                                    @foreach($swyambers as $swyamber)
                                        <tr>
                                            <td>
                                                {{$swyamber->title}}
                                            </td>

                                            <td>
                                                {{$swyamber->place}}
                                            </td>
                                            <td>
                                                {{$swyamber->swyamber_date}}
                                            </td>
                                            <td class="td-actions text-right">
                                                @if(auth()->user()->role_id == 1 || !empty($permission) && $permission->can_edit == 1)
                                                <a rel="tooltip" class="btn btn-success btn-link"
                                                   href="{{ route('swyamber.edit' , ['swyamber_id' => $swyamber->id]) }}"
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