@extends('layouts.dashboard', [ 'titlePage' => __('User Profile')])

@section('content')

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
                            <div class="row mt-4">
                                <div class="col-md-3">
                                   {{-- <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle border" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            USer Info
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>--}}
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control selected_email" placeholder="Email-id"
                                           name="selected_email">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control selected_folio" placeholder="folio number"
                                           name="selected_folio">

                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary search_pro">Go</button>
                                </div>
                            </div>
                            <div class="border p-3 mt-5 bg-light insert_user_profile">
                                <p>Please Select Folio number or Email to find matches.</p>
                                {{--<div class="media">
                                    <svg class="bd-placeholder-img mr-3" width="64" height="64"
                                         xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"
                                         focusable="false" role="img" aria-label="Placeholder: 64x64"><title>
                                            Placeholder</title>
                                        <rect width="100%" height="100%" fill="#868e96"></rect>
                                        <text x="50%" y="50%" fill="#dee2e6" dy=".3em">64x64</text>
                                    </svg>
                                    <div class="media-body">
                                        <h3 class="mb-1 mt-0">Shivani Ahuja</h3>
                                        <div>
                                            <ul class="list-unstyled row mb-0">
                                                <li class="col-md-3 ">shivani@yahoo.com</li>
                                                <li class="col-md-3">23-08-1991</li>
                                                <li class="col-md-3 ">Pujabi-Khatri</li>
                                                <li class="col-md-3">Unmarried</li>
                                                <li class="col-md-3">32 Years</li>
                                                <li class="col-md-3 ">Manglik</li>
                                                <li class="col-md-3 ">B.Com, DU</li>
                                                <li class="col-md-3 ">New Delhi</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>--}}
                            </div>

                            <div class="row mt-5">
                                <div class="col-md-4">
                                    <div class="border p-3 bg-light">
                                        <form action="">
                                            <div class="form-group">
                                                <label for="staticEmail" class="position-static">Date of Birth</label>
                                                <input type="date" class="form-control border border-bottom-0"
                                                       id="staticEmail" value="">
                                            </div>
                                            <div class="form-group ">
                                                <label for="staticEmail" class="position-static">Born time</label>
                                                <input type="text" class="form-control border border-bottom-0"
                                                       id="staticEmail" value="">
                                            </div>
                                            <div class="form-group ">
                                                <label for="staticEmail" class="position-static">Birth Place</label>
                                                <input type="text" class="form-control border border-bottom-0"
                                                       id="staticEmail" value="">
                                            </div>
                                            <div class="form-group ">
                                                <label for="staticEmail" class="position-static">Gender</label>
                                                <select class="form-control border border-bottom-0">
                                                    <option value="" selected>--Select gender--</option>
                                                    <option value="">Male</option>
                                                    <option value="">Female</option>
                                                </select>
                                            </div>
                                            <div class="form-group ">
                                                <label for="staticEmail" class="position-static">Marital Status</label>
                                                <select class="form-control border border-bottom-0">
                                                    <option value="" selected>--Select Marital Status--</option>
                                                    <option value="">Married</option>
                                                    <option value="">Never Married</option>
                                                </select>
                                            </div>
                                            <div class="form-group ">
                                                <label for="staticEmail" class="position-static">Caste</label>
                                                <input type="text" class="form-control border border-bottom-0"
                                                       id="staticEmail" value="">
                                            </div>
                                            <div class="form-group ">
                                                <label for="staticEmail" class="position-static">Occupation</label>
                                                <input type="text" class="form-control border border-bottom-0"
                                                       id="staticEmail" value="">
                                            </div>
                                            <div class="form-group ">
                                                <label for="staticEmail" class="position-static">Monthly Income</label>
                                                <input type="text" class="form-control border border-bottom-0"
                                                       id="staticEmail" value="">
                                            </div>
                                            <div class="form-group ">
                                                <label for="staticEmail" class="position-static">Height</label>
                                                <input type="text" class="form-control border border-bottom-0"
                                                       id="staticEmail" value="">
                                            </div>
                                            <div class="form-group ">
                                                <label for="staticEmail" class="position-static">Weight</label>
                                                <input type="text" class="form-control border" id="staticEmail"
                                                       value="">
                                            </div>
                                            <div class="form-group text-right">
                                                <input type="submit" value="Filter" class="btn btn-primary">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-8 other_profiles">
                                    {{--<div class="media mb-4 border-bottom">
                                        <svg class="bd-placeholder-img mr-3" width="64" height="64"
                                             xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"
                                             focusable="false" role="img" aria-label="Placeholder: 64x64"><title>
                                                Placeholder</title>
                                            <rect width="100%" height="100%" fill="#868e96"></rect>
                                            <text x="50%" y="50%" fill="#dee2e6" dy=".3em">64x64</text>
                                        </svg>
                                        <div class="media-body">
                                            <h6 class="mb-1 mt-0">Shivani Ahuja</h6>
                                            <div>
                                                <table class="table-sm table mb-0">
                                                    <tr>
                                                        <td>shivani@yahoo.com</td>
                                                        <td>23-08-1991</td>
                                                        <td>Pujabi-Khatri</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Unmarried</td>
                                                        <td>Manglik</td>
                                                        <td>B.Com, DU</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media mb-4 border-bottom">
                                        <svg class="bd-placeholder-img mr-3" width="64" height="64"
                                             xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"
                                             focusable="false" role="img" aria-label="Placeholder: 64x64"><title>
                                                Placeholder</title>
                                            <rect width="100%" height="100%" fill="#868e96"></rect>
                                            <text x="50%" y="50%" fill="#dee2e6" dy=".3em">64x64</text>
                                        </svg>
                                        <div class="media-body">
                                            <h6 class="mb-1 mt-0">Shivani Ahuja</h6>
                                            <div>
                                                <table class="table-sm table mb-0">
                                                    <tr>
                                                        <td>shivani@yahoo.com</td>
                                                        <td>23-08-1991</td>
                                                        <td>Pujabi-Khatri</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Unmarried</td>
                                                        <td>Manglik</td>
                                                        <td>B.Com, DU</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media mb-4 border-bottom">
                                        <svg class="bd-placeholder-img mr-3" width="64" height="64"
                                             xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"
                                             focusable="false" role="img" aria-label="Placeholder: 64x64"><title>
                                                Placeholder</title>
                                            <rect width="100%" height="100%" fill="#868e96"></rect>
                                            <text x="50%" y="50%" fill="#dee2e6" dy=".3em">64x64</text>
                                        </svg>
                                        <div class="media-body">
                                            <h6 class="mb-1 mt-0">Shivani Ahuja</h6>
                                            <div>
                                                <table class="table-sm table mb-0">
                                                    <tr>
                                                        <td>shivani@yahoo.com</td>
                                                        <td>23-08-1991</td>
                                                        <td>Pujabi-Khatri</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Unmarried</td>
                                                        <td>Manglik</td>
                                                        <td>B.Com, DU</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media mb-4 border-bottom">
                                        <svg class="bd-placeholder-img mr-3" width="64" height="64"
                                             xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"
                                             focusable="false" role="img" aria-label="Placeholder: 64x64"><title>
                                                Placeholder</title>
                                            <rect width="100%" height="100%" fill="#868e96"></rect>
                                            <text x="50%" y="50%" fill="#dee2e6" dy=".3em">64x64</text>
                                        </svg>
                                        <div class="media-body">
                                            <h6 class="mb-1 mt-0">Shivani Ahuja</h6>
                                            <div>
                                                <table class="table-sm table mb-0">
                                                    <tr>
                                                        <td>shivani@yahoo.com</td>
                                                        <td>23-08-1991</td>
                                                        <td>Pujabi-Khatri</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Unmarried</td>
                                                        <td>Manglik</td>
                                                        <td>B.Com, DU</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>--}}
                                </div>
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
        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.search_pro').on('click', function () {

                var selected_folio = $('.selected_folio').val();
                var selected_email = $('.selected_email').val();

                $.ajax({
                    type: "post",
                    url: "{{ route('admin.match.search_user') }}",
                    data: {'selected_folio': selected_folio, 'selected_email': selected_email},
                    success: function (data) {
                        // table.draw();
                        $('.insert_user_profile').html(data.html);
                        $('.other_profiles').html(data.otherHtml);
                        if (data.status == 200) {

                            swal("Success!", "Profile Found!", "success");
                        } else {
                            swal("Warning!", "No Profile Found!", "error");
                        }

                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });
        });
    </script>
@endsection