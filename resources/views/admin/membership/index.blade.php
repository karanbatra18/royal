@extends('layouts.dashboard', [ 'titlePage' => __('Membership')])

@section('content')

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

                                                <a rel="tooltip" class="btn btn-success btn-link"
                                                   href="{{ route('membership.edit' , ['membership_id' => $membership->id]) }}"
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