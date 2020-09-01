@extends('layouts.dashboard', [ 'titlePage' => __('Swyamber')])

@section('content')

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

                                                <a rel="tooltip" class="btn btn-success btn-link"
                                                   href="{{ route('swyamber.edit' , ['swyamber_id' => $swyamber->id]) }}"
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