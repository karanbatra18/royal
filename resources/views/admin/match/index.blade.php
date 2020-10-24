@extends('layouts.dashboard', [ 'titlePage' => __('User Profile')])

@section('content')
<link rel='stylesheet' id='fancy-css'  href='https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css' type='text/css' media='all' />

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
                                    <label class="position-static">Search Profile</label>
                                    <select class="form-control user_profiles">
                                        <option value="" data-email="" data-folio="" selected>--Search Profile--</option>
                                        @if($users->count())
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}" data-email="{{ $user->email }}" data-folio="{{ !empty($user->userProfile) ? $user->userProfile->folio_no : ''}}">{{ $user->first_name.' '.$user->last_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="position-static">Search By Email</label>
                                    <select class="form-control selected_email" name="selected_email">
                                        <option value="" data-email="" data-folio="" selected>--Search Email--</option>
                                        @if($users->count())
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}" data-email="{{ $user->email }}" data-folio="{{ !empty($user->userProfile) ? $user->userProfile->folio_no : ''}}">{{ $user->email }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                   {{-- <input type="text" class="form-control selected_email" placeholder="Email-id"
                                           name="selected_email">--}}
                                </div>
                                <div class="col-md-3">
                                    <label class="position-static">Search By Folio No</label>
                                    <select class="form-control selected_folio" name="selected_folio">
                                    <option value="" data-email="" data-folio="" selected>--Search Folio No--</option>
                                    @if($users->count())
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" data-email="{{ $user->email }}" data-folio="{{ !empty($user->userProfile) ? $user->userProfile->folio_no : ''}}">{{ !empty($user->userProfile) ? $user->userProfile->folio_no : ''}}</option>
                                            @endforeach
                                            @endif
                                            </select>
                                    {{--<input type="text" class="form-control selected_folio" placeholder="folio number"
                                           name="selected_folio">--}}

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
                                        <form action="" class="row">
                                           {{-- <div class="form-group">
                                                <label for="age" class="position-static">Age</label>
                                                <input type="text" class="form-control"
                                                       id="age" value="">
                                            </div>--}}
                                            <div class="form-group col-md-6">
                                                <label for="gender" class="position-static">Gender</label>
                                                <select class="form-control" name="gender" id="gender">
                                                    <option value="" selected>Please Select</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="transgender">Transgender</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="marital_status" class="position-static">Marital Status</label>
                                                <select class="form-control" name="marital_status" id="marital_status">
                                                    <option value="" selected>Please Select</option>
                                                    <option value="never_married">
                                                        Never Married
                                                    </option>
                                                    <option value="divorced">
                                                        Divorced
                                                    </option>
                                                    <option value="awaiting_divorce">
                                                        Awaiting Divorce
                                                    </option>
                                                    <option value="widowed">
                                                        Widowed
                                                    </option>
                                                    <option value="annulled">
                                                        Annulled
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="mother_tongue" class="position-static">Mother Tongue</label>
                                                <select class="form-control" name="mother_tongue" id="mother_tongue">
                                                    <option value="" selected>Please Select</option>
                                                    <option value="hindi">
                                                        Hindi
                                                    </option>
                                                    <option value="english">
                                                        English
                                                    </option>
                                                    <option value="punjabi">
                                                        Punjabi
                                                    </option>
                                                    <option value="urdu">
                                                        Urdu
                                                    </option>
                                                    <option value="marathi">
                                                        Mrathi
                                                    </option>
                                                    <option value="others">
                                                        Others
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="religion" class="position-static">Religion</label>
                                                <select class="form-control"
                                                        name="religion" id="religion" required>
                                                    <option value="">Please select</option>
                                                    <option value="hindu">
                                                        Hindu
                                                    </option>
                                                    <option value="muslim">
                                                        Muslim
                                                    </option>
                                                    <option value="punjabi">
                                                        Punjabi
                                                    </option>
                                                    <option value="sikh">
                                                        Sikh
                                                    </option>
                                                    <option value="bania">
                                                        Bania
                                                    </option>
                                                    <option value="jain">
                                                        Jain
                                                    </option>
                                                    <option value="christian">
                                                        Christian
                                                    </option>
                                                    <option value="brahmin">
                                                        Brahmin
                                                    </option>

                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="caste_id" class="position-static">Caste</label>
                                                <select class="caste_id form-control"
                                                        name="caste_id" id="caste_id" required>
                                                    <option value="">Please select</option>
                                                    @if($castes->count())
                                                        @foreach($castes as $caste)
                                                            <option {{ (isset($userProfile->caste_id) && $userProfile->caste_id == $caste->id) ? 'selected' : ((old('caste_id') == $caste->id) ? 'selected' : '') }} value="{{ $caste->id }}">
                                                                {{ $caste->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif

                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="sub_caste_id" class="position-static">Sub
                                                    Caste</label>
                                                <select class="sub_caste_id form-control"
                                                        name="sub_caste_id" id="sub_caste_id" required>
                                                    <option value="">Please select</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="country-dropdown" class="position-static">Country</label>
                                                <select class="form-control"
                                                        name="country" id="country-dropdown" required>
                                                    <option value="">Please select</option>
                                                    @foreach ($countries as $country)
                                                        <option data-id="{{$country->id}}" value="{{$country->name}}">
                                                            {{$country->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="state-dropdown" class="position-static">State</label>
                                                <select class="form-control"
                                                        name="state" id="state-dropdown" required>
                                                    <option value="" selected>Please select</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="city-dropdown" class="position-static">City</label>
                                                <select class="form-control"
                                                        name="city" id="city-dropdown">
                                                    <option value="">Please select</option>
                                                </select>

                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="challanged" class="position-static">Challanged</label>
                                                <select class="form-control"
                                                        name="challanged" id="challanged">
                                                    <option value="">Please select</option>
                                                    <option value="handicapped">Handicapped</option>
                                                </select>

                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="higher_education" class="position-static">Higher
                                                    Education</label>
                                                <select class="form-control"
                                                        name="higher_education" id="higher_education">
                                                    <option value="">Please select</option>
                                                    <option value="phd">
                                                        PHD
                                                    </option>
                                                    <option value="btech">
                                                        B.Tech
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="occupation" class="position-static">Occupation</label>
                                                <select type="text" class="form-control"
                                                       name="occupation" id="occupation">
                                                    <option value="">Please select</option>
                                                    <option value="business">
                                                        Business
                                                    </option>
                                                    <option value="job">
                                                        Job
                                                    </option>
                                                    <option value="professional">
                                                        Professional
                                                    </option>
                                                    <option value="doctor">
                                                        Doctor
                                                    </option>
                                                </select>

                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="annual_income" class="position-static">Annual Income</label>
                                                <select type="text" class="form-control"
                                                       name="annual_income" id="annual_income">
                                                    <option value="">Please select</option>
                                                    <option value="03">
                                                        0 - 3 Lakh
                                                    </option>
                                                    <option value="35">
                                                        3 - 5 Lakh
                                                    </option>
                                                    <option value="58">
                                                        5 - 8 Lakh
                                                    </option>
                                                    <option value="810">
                                                        8 - 10 Lakh
                                                    </option>
                                                    <option value="1015">
                                                        10 - 15 Lakh
                                                    </option>
                                                    <option value="1520">
                                                        15 - 20 Lakh
                                                    </option>
                                                    <option value="2025">
                                                        20 - 25 Lakh
                                                    </option>
                                                    <option value="2530">
                                                        25 - 30 Lakh
                                                    </option>
                                                    <option value="3040">
                                                        30 - 40 Lakh
                                                    </option>
                                                    <option value="4050">
                                                        40 - 50 Lakh
                                                    </option>
                                                    <option value="5000">
                                                        50 Lakh and above
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="profile_managed_by" class="position-static">Profile Managed By</label>
                                                <select type="text" class="form-control"
                                                        name="profile_managed_by" id="profile_managed_by">
                                                    <option value="">Please select</option>
                                                    <option value="self">
                                                        Self
                                                    </option>
                                                    <option value="parent">
                                                        Parent
                                                    </option>
                                                    <option value="sibling">
                                                        Sibling
                                                    </option>
                                                    <option value="relative">
                                                        Relative
                                                    </option>
                                                    <option value="friend">
                                                        Friend
                                                    </option>
                                                    <option value="bureau">
                                                        Marriage Bureau
                                                    </option>
                                                </select>
                                            </div>

                                            {{--<div class="form-group ">
                                                <label for="staticEmail" class="position-static">Height</label>
                                                <input type="text" class="form-control"
                                                       id="staticEmail" value="">
                                            </div>--}}
                                           {{-- <div class="form-group ">
                                                <label for="staticEmail" class="position-static">Weight</label>
                                                <input type="text" class="form-control" id="staticEmail"
                                                       value="">
                                            </div>--}}
                                            <div class="form-group col-md-6">

                                                <input class="" name="smoke"
                                                       id="smoke" type="checkbox"
                                                       value="1"/>
                                                <label for="smoke"
                                                       class="position-static bmd-label-static">Somke</label>


                                            </div>
                                            <div class="form-group col-md-6">

                                                <input class="" name="own_house"
                                                       id="own_house" type="checkbox"
                                                       value="1"/>
                                                <label for="own_house" class="position-static bmd-label-static">Own
                                                    a House</label>


                                            </div>
                                            <div class="form-group col-md-6">
                                                <input class="" name="drink"
                                                       id="drink" type="checkbox"
                                                       value="1"/>
                                                <label for="drink"
                                                       class="position-static bmd-label-static">Drink</label>


                                            </div>
                                            <div class="form-group col-md-6">
                                                <input class="" name="non_veg"
                                                       id="non_veg" type="checkbox"
                                                       value="1"/>
                                                <label for="input-non_veg" class="position-static bmd-label-static">NonVeg</label>


                                            </div>
                                            <div class="form-group text-right">
                                                <input type="button" value="Filter" class="btn btn-primary search_filters">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-8 other_profiles">

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
<script type='text/javascript' src='https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js'></script>
    <script>
        $(function () {

            $('.user_profiles').select2();
            $('.selected_email').select2();
            $('.selected_folio').select2();

            $(document.body).on("select2:closing",".user_profiles",function(){
                if($(this).val() == '') {
                    $(".selected_email").val('').trigger('change');
                    $(".selected_folio").val('').trigger('change');
                } else {
                    $(".selected_email").select2("val", $(this).val());
                    $(".selected_folio").select2("val", $(this).val());
                }

            });

            $(document.body).on("select2:closing",".selected_email",function(){
                if($(this).val() == '') {
                    $(".user_profiles").val('').trigger('change');
                    $(".selected_folio").val('').trigger('change');
                } else {
                    $(".user_profiles").select2("val", $(this).val());
                    $(".selected_folio").select2("val", $(this).val());
                }

            });

            $(document.body).on("select2:closing",".selected_folio",function(){
                if($(this).val() == '') {
                    $(".user_profiles").val('').trigger('change');
                    $(".selected_email").val('').trigger('change');
                } else {
                    $(".user_profiles").select2("val", $(this).val());
                    $(".selected_email").select2("val", $(this).val());
                }

            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#country-dropdown').on('change', function () {
                var country_id = $(this).find(':selected').data('id');
                $("#state-dropdown").html('');
                $.ajax({
                    url: "{{url('get-states-by-country')}}",
                    type: "POST",
                    data: {
                        country_id: country_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state-dropdown').html('<option value="">Select State</option>');
                        $.each(result.states, function (key, value) {
                            $("#state-dropdown").append('<option value="' + value.name + '" data-id="'+value.id+'">' + value.name + '</option>');
                        });
                        $('#city-dropdown').html('<option value="">Select State First</option>');
                    }
                });
            });
            $('#state-dropdown').on('change', function () {
                var state_id = $(this).find(':selected').data('id');
                $("#city-dropdown").html('');
                $.ajax({
                    url: "{{url('get-cities-by-state')}}",
                    type: "POST",
                    data: {
                        state_id: state_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#city-dropdown').html('<option value="">Select City</option>');
                        $.each(result.cities, function (key, value) {
                            $("#city-dropdown").append('<option value="' + value.name + '" data-id="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            });


            $('.search_filters').on('click', function () {
                var id = $('.selected_folio').val();
                var profile_managed_by = $('#profile_managed_by').val();
                var occupation = $('#occupation').val();
                var challanged = $('#challanged').val();
                var annual_income = $('#annual_income').val();
                var gender = $('#gender').val();
                var marital_status = $('#marital_status').val();
                var mother_tongue = $('#mother_tongue').val();
                var religion = $('#religion').val();
                var caste_id = $('#caste_id').val();
                var sub_caste_id = $('#sub_caste_id').val();
                var country = $('#country-dropdown').val();
                var state = $('#state-dropdown').val();
                var city = $('#city-dropdown').val();
                var higher_education = $('#higher_education').val();
                var smoke = $('#smoke').is(':checked') ? 1 : 0;
                var drink = $('#drink').is(':checked') ? 1 : 0;
                var own_house = $('#own_house').is(':checked') ? 1 : 0;
                var non_veg = $('#non_veg').is(':checked') ? 1 : 0;

                $.ajax({
                    type: "post",
                    url: "{{ route('admin.match.search_filtered_user') }}",
                    data: {
                        'id': id,
                        'profile_managed_by': profile_managed_by,
                        'occupation': occupation,
                        'challanged': challanged,
                        'annual_income': annual_income,
                        'marital_status': marital_status,
                        'mother_tongue': mother_tongue,
                        'religion': religion,
                        'caste_id': caste_id,
                        'sub_caste_id': sub_caste_id,
                        'country': country,
                        'state': state,
                        'city': city,
                        'higher_education': higher_education,
                        'smoke': smoke,
                        'drink': drink,
                        'own_house': own_house,
                        'non_veg': non_veg
                    },
                    success: function (data) {
                        // table.draw();
                        //$('.insert_user_profile').html(data.html);
                        $('.other_profiles').html(data.otherHtml);
                        if (data.status == 200) {

                          //  swal("Success!", "Profile Found!", "success");
                        } else {
                            swal("Warning!", "No Profile Found!", "error");
                        }

                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });


            $('.search_pro').on('click', function () {

                var id = $('.selected_folio').val();


                $.ajax({
                    type: "post",
                    url: "{{ route('admin.match.search_user') }}",
                    data: {'id': id},
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

            $('.caste_id').on('change', function () {
                var caste_id = $(this).val();
                $(".sub_caste_id").html('');
                $.ajax({
                    url: "{{ route('caste.sub_castes') }}",
                    type: "POST",
                    data: {
                        caste_id: caste_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('.sub_caste_id').html('<option value="">Select Subcaste</option>');

                        $.each(result.castes, function (key, value) {
                            $(".sub_caste_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            });

            $(document).on('click', '.pagination a',function(event)
            {
                event.preventDefault();

                $('li').removeClass('active');
                $(this).parent('li').addClass('active');

                var myurl = $(this).attr('href');
                var page=$(this).attr('href').split('page=')[1];

                getData(page);
            });


        });

        $(window).on('hashchange', function() {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                }else{
                    getData(page);
                }
            }
        });

        function getData(page){
            var id = $('.selected_folio').val();
            var gender = $('#gender').val();
            var marital_status = $('#marital_status').val();
            var mother_tongue = $('#mother_tongue').val();
            var religion = $('#religion').val();
            var caste_id = $('#caste_id').val();
            var sub_caste_id = $('#sub_caste_id').val();
            var country = $('#country-dropdown').val();
            var state = $('#state-dropdown').val();
            var city = $('#city-dropdown').val();
            var higher_education = $('#higher_education').val();
            var smoke = $('#smoke').is(':checked') ? 1 : 0;
            var drink = $('#drink').is(':checked') ? 1 : 0;
            var own_house = $('#own_house').is(':checked') ? 1 : 0;
            var non_veg = $('#non_veg').is(':checked') ? 1 : 0;

            $.ajax({
                type: "post",
                url: "{{ route('admin.match.search_filtered_user').'?page=' }}"+page,
                data: {
                    'id': id,
                    'marital_status': marital_status,
                    'mother_tongue': mother_tongue,
                    'religion': religion,
                    'caste_id': caste_id,
                    'sub_caste_id': sub_caste_id,
                    'country': country,
                    'state': state,
                    'city': city,
                    'higher_education': higher_education,
                    'smoke': smoke,
                    'drink': drink,
                    'own_house': own_house,
                    'non_veg': non_veg
                },
                success: function (data) {
                    // table.draw();
                    //$('.insert_user_profile').html(data.html);
                    $('.other_profiles').html(data.otherHtml);
                    if (data.status == 200) {
                        location.hash = page;
                        //  swal("Success!", "Profile Found!", "success");
                    } else {
                        swal("Warning!", "No Profile Found!", "error");
                    }

                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    </script>
@endsection