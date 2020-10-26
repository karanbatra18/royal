@extends('layouts.dashboard', [ 'titlePage' => __('Swyamber')])

@section('content')

    <style>
        #main-secc {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #e7e6e6;
            padding: 10px 10px;
        }

        .grid0 {
            width: 75%;
            background: white;
        }

        .grid-parent {
            display: grid;
            grid-template-columns: 1fr 2fr 1fr;
            grid-template-rows: 1fr;
            height: 215px;
            overflow: hidden;
        }

        .grid-image img {
            width: 100%;
        }

        #share-mater {
            background: #34495e;
        }

        #share-mater ul {
            padding: 0;
        }

        #share-mater ul li {
            list-style: none;
            width: 100%;
        }

        #share-mater ul li a {
            color: white;
            text-decoration: none;
            text-transform: capitalize;
            font-size: 20px;
            display: block;
            padding: 12px 25px;
        }

        #bg-ger {
            background: #f0f2f7;
            padding: 20px 20px 0px 20px;
        }

        #padd-20 {
            padding-left: 20px;
        }

        #share-mater ul li a:hover {
            background: #d9475c;
        }

        #bg-ger-child {
            border-bottom: 1px solid;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .fa-question-circle-o {
            font-size: 20px;
            padding: 0px 10px
        }

        .fa-shield {
            font-size: 20px;
        }

        .fa-shield sup {
            background: #d9475c;
            color: white;
            padding: 0px 4px;
            border-radius: 50px;
            margin: -3px;
        }

        #bg-ger-right {
            float: right;
            font-size: 12px;
            padding-top: 10px;
            color: grey;
        }

        #bg-ger-ul {
            list-style: none;
            display: grid;
            grid-template-columns: 1fr 1fr;
            padding: 0;
        }

        #bg-ger-ul li {
            font-size: 13px;
            padding: 3px 0px;
        }

        #bg-ger-suce-ul ul {
            padding: 0;
            margin: 0;
        }

        #bg-ger-suce-ul ul li {
            list-style: none;
            display: inline-block;
            padding: 0px 10px 0px 0px;
            margin-top: 6px;
        }

        #bg-ger-suce-ul ul li a {
            font-size: 20px;
            color: #34495e;
        }

        .grid-second {
            display: grid;
            grid-template-columns: 3fr 1fr;
            grid-gap: 0px 20px;
            width: 75%;

        }

        .grid-second-child {
            background: white;
            height: fit-content;
        }

        .spadd {
            padding: 30px 22px 10px 50px;
        }

        .spadd p {
            font-size: 15px;
        }

        .lh18 {
            line-height: 18px;
            color: #34495e
        }

        .pt20 {
            padding-top: 15px;
            color: silver;
        }

        #section1 {
            height: auto;
            border-bottom: 1px solid #34495e
        }

        #section2 {
            height: auto;
            border-bottom: 1px solid #34495e
        }

        #section3 {
            height: auto;
            border-bottom: 1px solid #34495e
        }

        #section4 {
            height: auto;
            border-bottom: 1px solid #34495e
        }

        #section5 {
            height: auto;
            border-bottom: 1px solid #34495e
        }

        .navbar-sticky-top {
            position: sticky;
            top: 0;
            padding: 0
        }

        .navbar-sticky-top ul {
            width: 100%;
            border-bottom: 1px solid
        }

        .navbar-sticky-top ul li {
            width: 25% !important;
            text-align: center;
        }

        .navbar-sticky-top ul li a {
            width: 100% !important;
            display: grid;
            color: #34495e;
            font-size: 16px;
            z-index: 99999;
            background: white;
        }

        .navbar-sticky-top ul li a:hover {
            background: white
        }

        .left-same-col {
            font-size: 17px;
            color: #d9475c;
            font-weight: inherit;
            position: relative;
        }

        .left-same-col i {
            padding-right: 10px;
            margin-left: -33px;
            position: absolute;
            margin-top: -3px;
            z-index: 1;
        }

        .spadd-ul {
            padding: 0;
            margin: 0;
            list-style: none;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .spadd-ul li {
            padding-top: 15px;
            display: grid;
            color: #999;
            font-size: 15px;
            letter-spacing: .50px;
        }

        .spadd-ul-s {
            color: #34495e
        }

        .spadd-ul-lp {
            text-align: right;
            letter-spacing: .50px;
            padding-top: 20px;
        }

        .spadd-ul-lp i {
            transform: rotate(45deg);
            font-size: 20px;
            margin-right: 10px;
        }

        .pt1-5 {
            padding-top: 20px;
            letter-spacing: .50px
        }

        .pt1-5 i {
            padding-right: 88px;
        }

        .spaddl-p {
            text-align: right;
            letter-spacing: .50px;
            margin-top: 30px;
        }

        .rd-col {
            color: #d9475c;
        }

        .lhauto {
            padding: 15px;
        }

        .same-gre {
            color: #999
        }

        tr {
            padding: 15px 0;
            border-bottom: 1px solid #f1f1f1 !important;
        }

        .pt-49 {
            padding-top: 44px;
            border-bottom: 1px solid;
            margin-bottom: 15px;
        }

        .pt-49 p {
            font-size: 17px;
            padding-left: 16px;
        }

        .pr-17 {
            padding: 15px 16px 0px 16px;
        }

        .pr-17a {
            background: #34495e;
            font-size: 14px;
            color: white;
            width: 100%;
            display: inline-block;
            padding: 10px 10px;
            text-align: center;
        }

        .pr-17a:hover {
            color: white;
            text-decoration: none;
        }
    </style>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <section id="main-secc">
                        <div class="grid0">
                            <div class="grid-parent">
                                <div class="grid-child-3">
                                    <!-- <img  src="https://imagecdn.jeevansathi.com/18702/16/374056319-1593341057.jpeg"> -->
                                    {{--<div id="lightgallery" class="grid-image">
                                        @for($i = 1; $i <= 5; $i++)
                                            --}}{{--@if($userProfile->)--}}{{--
                                       <a href="https://imagecdn.jeevansathi.com/18702/16/374056319-1593341057.jpeg">
                                          <img src="https://imagecdn.jeevansathi.com/18702/16/374056319-1593341057.jpeg" />
                                        </a>
                                        @endfor

                                      --}}{{-- <a style="display: none;" href="https://imagecdn.jeevansathi.com/18702/16/374056319-1593341057.jpeg">
                                          <img src="https://imagecdn.jeevansathi.com/18702/16/374056319-1593341057.jpeg" />
                                        </a>

                                        <a style="display: none;" href="https://imagecdn.jeevansathi.com/18702/16/374056319-1593341057.jpeg">
                                          <img src="https://imagecdn.jeevansathi.com/18702/16/374056319-1593341057.jpeg" />
                                        </a>--}}{{--
                                      </div>--}}
                                    @php
                                        if($user->marital_status == 'never_married') {
                                            $marriedStatus = 'Never Married';
                                       } else if($user->marital_status == 'divorced'){
                                       $marriedStatus = 'Divorced';
                                       } else if($user->marital_status == 'awaiting_divorce'){
                                       $marriedStatus = 'Awaiting Divorce';
                                       } else if($user->marital_status == 'widowed'){
                                       $marriedStatus = 'Widowed';
                                       } else if($user->marital_status == 'annulled'){
                                       $marriedStatus = 'Annulled';
                                       } else {
                                       $marriedStatus = '';
                                       }
                                    @endphp
                                    @php

                                        $profileImg = '';
                                        if(!empty($userProfile->profile_picture1)) {
                                            $profileImg = asset('assets/images/users/'.$userProfile->profile_picture1);
                                        } else if(!empty($userProfile->profile_picture2)) {
                                            $profileImg = asset('assets/images/users/'.$userProfile->profile_picture2);
                                        } else if(!empty($userProfile->profile_picture3)) {
                                            $profileImg = asset('assets/images/users/'.$userProfile->profile_picture3);
                                        } else if(!empty($userProfile->profile_picture4)) {
                                            $profileImg = asset('assets/images/users/'.$userProfile->profile_picture3);
                                        } else if(!empty($userProfile->profile_picture5)) {
                                            $profileImg = asset('assets/images/users/'.$userProfile->profile_picture3);
                                        } else {
                                            $profileImg = asset('assets/images/users/medium_avatar.png');
                                        }
                                    @endphp
                                    @php
                                        $income = 'Not Filled in';
                                                    if(isset($userProfile->annual_income) && $userProfile->annual_income == '03') {
                                                           $income =  '0 - 3 Lakh';

                                                       } else if(isset($userProfile->annual_income) && $userProfile->annual_income == '35') {
                                                              $income =  '3 - 5 Lakh';
                                                       }  else if(isset($userProfile->annual_income) && $userProfile->annual_income == '58'){
                                                            $income =  '5 - 8 Lakh';
                                                       }  else if(isset($userProfile->annual_income) && $userProfile->annual_income == 'sikh'){
                                                             $income =  '8 - 10 Lakh';
                                                       }  else if(isset($userProfile->annual_income) && $userProfile->annual_income == '1015'){
                                                             $income =  '10 - 15 Lakh';
                                                       }  else if(isset($userProfile->annual_income) && $userProfile->annual_income == 'jain'){
                                                             $income =  '15 - 20 Lakh';
                                                       }  else if(isset($userProfile->annual_income) && $userProfile->annual_income == '2025'){
                                                             $income =  '20 - 25 Lakh';
                                                       } else if(isset($userProfile->annual_income) && $userProfile->annual_income == '2530'){
                                                             $income =  '25 - 30 Lakh';
                                                       } else if(isset($userProfile->annual_income) && $userProfile->annual_income == '3040'){
                                                             $income =  '30 - 40 Lakh';
                                                       } else if(isset($userProfile->annual_income) && $userProfile->annual_income == '4050'){
                                                             $income =  '40 - 50 Lakh';
                                                       }  else if(isset($userProfile->annual_income) && $userProfile->annual_income == '5000'){
                                                             $income =  '50 Lakh and above';
                                                         }
                                    @endphp
                                    <div class="position-relative">
                                        <img src="{{ $profileImg }}" alt="no image">
                                        <div class="pop-gallery position-absolute overflow-hidden"
                                             style="left:0; top:0; opacity:0">
                                            @for($i = 1; $i <= 5; $i++)
                                                <?php $imageName = 'profile_picture' . $i; ?>
                                                @if(!empty($user->$imageName))
                                                    <a data-fancybox="gallery-{{ $user->id }}"
                                                       href="{{ asset('assets/images/users/'.$user->$imageName) }}">
                                                        <img src="{{ asset('assets/images/users/'.$user->$imageName) }}"
                                                             alt="">
                                                    </a>
                                                @endif
                                            @endfor
                                            {{--
                                                          <a data-fancybox="gallery-{{ $user->id }}" href="https://source.unsplash.com/O7qK1vQY3p0/1519x2279">
                                                             <img src="{{ $profileImg }}" alt="">
                                                         </a>
                                                          <a data-fancybox="gallery-{{ $user->id }}" href="https://source.unsplash.com/IbLZjKcelpM/1020x858">
                                                             <img src="{{ $profileImg }}" alt="">
                                                         </a>	--}}
                                        </div>
                                    </div>

                                </div>
                                <div class="grid-child-3" id="bg-ger">
                                    <div id="bg-ger-child">
                                        <span>{{ $user->first_name.' '.$user->last_name }}</span><span><i
                                                    class="fa fa-question-circle-o"></i></span>{{--<span><i class="fa fa-shield"><sup>1</sup></i></span>--}}{{--<span id="bg-ger-right">Last seen on 02-Oct-20</span>--}}
                                    </div>
                                    <ul id="bg-ger-ul">
                                        <li>{{ !empty($userProfile->folio_no) ? $userProfile->folio_no : '' }}</li>

                                        {{--<li>Not working</li>--}}
                                        <li>{{ !empty($userProfile->religion) ? $userProfile->religion : '' }}</li>
                                        <li>


                                            {{ $income }}</li>
                                        <li>{{ !empty($userProfile->mother_tongue) ? $userProfile->mother_tongue : '' }}</li>

                                        {{--<li>{{ !empty($userProfile->higher_education) ? $userProfile->higher_education : '' }}</li>--}}
                                        <li>{{ !empty($userProfile->state) ? $userProfile->state : '' }}</li>
                                        <li>@php
                                                if($user->marital_status == 'never_married') {
                                                    $marriedStatus = 'Never Married';
                                               } else if($user->marital_status == 'divorced'){
                                               $marriedStatus = 'Divorced';
                                               } else if($user->marital_status == 'awaiting_divorce'){
                                               $marriedStatus = 'Awaiting Divorce';
                                               } else if($user->marital_status == 'widowed'){
                                               $marriedStatus = 'Widowed';
                                               } else if($user->marital_status == 'annulled'){
                                               $marriedStatus = 'Annulled';
                                               } else {
                                               $marriedStatus = '';
                                               }
                                            @endphp
                                            {{ $marriedStatus }}</li>

                                    </ul>
                                    {{--<div id="bg-ger-suce-ul">
                                        <ul>
                                            <li><a href="#"><i class="material-icons">history</i></a></li>
                                            <li><a href="#"><i class="material-icons">share</i></a></li>
                                            <li><a href="#"><i class="material-icons">block</i></a></li>
                                            <li><a href="#"><i class="material-icons">flag</i></a></li>
                                        </ul>
                                    </div>--}}
                                </div>

                                <div class="grid-child-3" id="share-mater">
                                    {{--<ul>
                                        <li><a href="#"><i class="fa fa-share-alt"></i><span id="padd-20">Share</span></a></li>
                                        <li><a href="#"><i class="fa fa-phone"></i><span id="padd-20">Share</span></a></li>
                                    </ul>--}}
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- div second sctoll-spy -->
                    <section id="main-secc">
                        <div class="grid-second">
                            <div class="grid-second-child">
                                <div class="collapse navbar-collapse navbar-sticky-top" id="myNavbar">
                                    <ul class="nav navbar-nav">
                                        <li><a href="#section1"><span><i class="material-icons"> person</i></span><span>About Her</span></a>
                                        </li>
                                        <li><a href="#section2"><span><i
                                                            class="material-icons"> 	school</i></span><span>Education & Career</span></a>
                                        </li>
                                        <li><a href="#section3"><span><i
                                                            class="material-icons"> 	supervisor_account</i></span><span>Family Details</span></a>
                                        </li>
                                        <li><a href="#section4"><span><i
                                                            class="material-icons"> remove_red_eye</i></span><span>Desired Partner</span></a>
                                        </li>
                                    </ul>


                                </div>

                                {{--<div id="section1" class="container-fluid spadd">
                                  <p>Profile managed by {{ !empty($userProfile->profile_managed_by) ? $userProfile->profile_managed_by : 'Not filled in' }}</p>
                                  <p class="lh18">{{ !empty($userProfile->personal_detail) ? $userProfile->personal_detail : '' }}</p>
                                  --}}{{--<p class="pt20">About her Family<br>
                                   Not filled in</p>--}}{{--
                                  <p class="pt20">Education<br>{{ !empty($userProfile->education) ? $userProfile->education : 'Not filled in' }}</p>
                                  <p class="pt20">Occupation<br>{{ !empty($userProfile->occupation) ? $userProfile->occupation : 'Not filled in' }}</p>
                                </div>--}}
                                <div id="section2" class="container-fluid spadd">
                                    <span class="left-same-col"><i class="material-icons"> 	school</i>Basic Information</span>

                                    <ul class="spadd-ul">
                                        <li><span>Firstname</span><span
                                                    class="spadd-ul-s">{{ !empty($user->first_name) ? $user->first_name : 'Not filled in' }}</span>
                                        </li>
                                        <li>
                                            <span>Lastname</span><span>{{ !empty($user->last_name) ? $user->last_name : 'Not filled in' }}</span>
                                        </li>
                                        {{--						<li><span>UG Degree</span><span class="spadd-ul-s">BCA</span></li>
                                                                <li><span>UG College </span><span>Not filled in</span></li>
                                                                <li><span>Other UG Degree</span><span>Not filled in</span></li>--}}
                                        <li><span>Email</span><span
                                                    class="spadd-ul-s">{{ !empty($user->email) ? $user->email : 'Not filled in' }}</span>
                                        </li>
                                        <li><span>Gender</span><span
                                                    class="spadd-ul-s">{{ !empty($user->gender) ? $user->gender : 'Not filled in' }}</span>
                                        </li>
                                        <li>
                                            <span>Date of Birth</span><span>{{ !empty($user->dob) ? date('M d, Y', strtotime($user->dob)) : 'Not filled in' }}</span>
                                        </li>
                                        <li><span>Marital Status</span><span
                                                    class="spadd-ul-s">{{ $marriedStatus }}</span></li>
                                        <li><span>Phone</span><span
                                                    class="spadd-ul-s">{{ !empty($user->phone) ? $user->phone : 'Not filled in' }}</span>
                                        </li>
                                    </ul>
                                    {{--<p class="spadd-ul-lp spadd-ul-s"><i class="fa fa-thumb-tack"></i>Not interested in settling abroad</p>--}}
                                </div>
                                <div id="section2" class="container-fluid spadd">
                                    <span class="left-same-col"><i class="material-icons"> 	school</i>User information</span>

                                    <ul class="spadd-ul">
                                        <li><span>Profile Managed By</span><span
                                                    class="spadd-ul-s">{{ !empty($userProfile->profile_managed_by) ? $userProfile->profile_managed_by : 'Not filled in' }}</span>
                                        </li>
                                        <li>
                                            <span>Portfolio Number</span><span>{{ !empty($userProfile->folio_no) ? $userProfile->folio_no : 'Not filled in' }}</span>
                                        </li>
                                        {{--						<li><span>UG Degree</span><span class="spadd-ul-s">BCA</span></li>
                                                                <li><span>UG College </span><span>Not filled in</span></li>
                                                                <li><span>Other UG Degree</span><span>Not filled in</span></li>--}}
                                        <li><span>Height</span><span
                                                    class="spadd-ul-s">{{ !empty($userProfile->height) ? $userProfile->height : 'Not filled in' }}</span>
                                        </li>
                                        <li><span>Religion</span><span
                                                    class="spadd-ul-s">{{ !empty($userProfile->religion) ? ucfirst($userProfile->religion) : 'Not filled in' }}</span>
                                        </li>
                                        <li>
                                            <span>Caste</span><span>{{ !empty($userProfile->caste_id) ? $userProfile->caste->name : 'Not filled in' }}</span>
                                        </li>
                                        <li><span>Sub Caste</span><span
                                                    class="spadd-ul-s">{{ !empty($userProfile->sub_caste_id) ? $userProfile->subCaste->name : 'Not filled in' }}</span>
                                        </li>
                                        <li><span>Mother Tongue</span><span
                                                    class="spadd-ul-s">{{ !empty($userProfile->mother_tongue) ? ucfirst($userProfile->mother_tongue) : 'Not filled in' }}</span>
                                        </li>
                                        <li><span>Country</span><span
                                                    class="spadd-ul-s">{{ !empty($userProfile->country) ? ucfirst($userProfile->country) : 'Not filled in' }}</span>
                                        </li>
                                        <li><span>State</span><span
                                                    class="spadd-ul-s">{{ !empty($userProfile->state) ? ucfirst($userProfile->state) : 'Not filled in' }}</span>
                                        </li>
                                        <li><span>City</span><span
                                                    class="spadd-ul-s">{{ !empty($userProfile->city) ? ucfirst($userProfile->city) : 'Not filled in' }}</span>
                                        </li>
                                        <li><span>Annual Income</span><span
                                                    class="spadd-ul-s">{{ $income }}</span>
                                        </li>
                                    </ul>
                                    {{--<p class="spadd-ul-lp spadd-ul-s"><i class="fa fa-thumb-tack"></i>Not interested in settling abroad</p>--}}
                                </div>
                                <div id="section2" class="container-fluid spadd">
                                    <span class="left-same-col"><i class="material-icons"> 	school</i>About Me</span>

                                    <ul class="spadd-ul">
                                        <li><span>Personal Details</span><span
                                                    class="spadd-ul-s">{{ !empty($userProfile->personal_detail) ? $userProfile->personal_detail : 'Not filled in' }}</span>
                                        </li>
                                        <li>
                                            <span>Weight</span><span>{{ !empty($userProfile->weight) ? $userProfile->weight : 'Not filled in' }}</span>
                                        </li>
                                        <li><span>Body Type</span><span
                                                    class="spadd-ul-s">{{ !empty($userProfile->body_type) ? $userProfile->body_type : 'Not filled in' }}</span>
                                        </li>
                                        <li><span>Complexion</span><span
                                                    class="spadd-ul-s">{{ !empty($userProfile->complexion) ? ucfirst($userProfile->complexion) : 'Not filled in' }}</span>
                                        </li>
                                        <li>
                                            <span>Challanged</span><span>{{ !empty($userProfile->challanged) ? $userProfile->challanged : 'Not filled in' }}</span>
                                        </li>

                                    </ul>
                                    {{--<p class="spadd-ul-lp spadd-ul-s"><i class="fa fa-thumb-tack"></i>Not interested in settling abroad</p>--}}
                                </div>
                                <div id="section2" class="container-fluid spadd">
                                    <span class="left-same-col"><i class="material-icons"> 	school</i>Education & Career</span>

                                    <ul class="spadd-ul">
                                        <li><span>About Education</span><span
                                                    class="spadd-ul-s">{{ !empty($userProfile->education) ? $userProfile->education : 'Not filled in' }}</span>
                                        </li>
                                        <li><span>Highest Education</span><span
                                                    class="spadd-ul-s">{{ !empty($userProfile->higher_education) ? $userProfile->higher_education : 'Not filled in' }}</span>
                                        </li>
                                        <li>
                                            <span>College</span><span>{{ !empty($userProfile->college) ? $userProfile->college : 'Not filled in' }}</span>
                                        </li>
                                        <li>
                                            <span>School Name</span><span>{{ !empty($userProfile->school) ? $userProfile->school : 'Not filled in' }}</span>
                                        </li>

                                        <li><span>About Career</span><span
                                                    class="spadd-ul-s">{{ !empty($userProfile->about_career) ? $userProfile->about_career : 'Not filled in' }}</span>
                                        </li>
                                        <li><span>Employed In</span><span
                                                    class="spadd-ul-s">{{ !empty($userProfile->employed_in) ? $userProfile->employed_in : 'Not filled in' }}</span>
                                        </li>
                                        <li><span>Occupation</span><span
                                                    class="spadd-ul-s">{{ !empty($userProfile->occupation) ? $userProfile->occupation : 'Not filled in' }}</span>
                                        </li>
                                        <li>
                                            <span>Organization Name</span><span>{{ !empty($userProfile->organization_name) ? $userProfile->organization_name : 'Not filled in' }}</span>
                                        </li>
                                        {{--<li><span>Annual Income</span><span class="spadd-ul-s">{{ !empty($userProfile->annual_income) ? $userProfile->annual_income : 'Not filled in' }}</span></li>--}}
                                    </ul>
                                    {{--<p class="spadd-ul-lp spadd-ul-s"><i class="fa fa-thumb-tack"></i>Not interested in settling abroad</p>--}}
                                </div>
                                <div id="section2" class="container-fluid spadd">
                                    <span class="left-same-col"><i class="material-icons"> 	school</i>Contact Details</span>

                                    <ul class="spadd-ul">
                                        <li><span>Email</span><span
                                                    class="spadd-ul-s">{{ !empty($user->email) ? $user->email : 'Not filled in' }}</span>
                                        </li>
                                        <li><span>Alternate Email</span><span
                                                    class="spadd-ul-s">{{ !empty($user->alternate_email) ? $user->alternate_email : 'Not filled in' }}</span>
                                        </li>
                                        <li>
                                            <span>Phone</span><span>{{ !empty($user->phone) ? $user->phone : 'Not filled in' }}</span>
                                        </li>
                                        <li>
                                            <span>Alternate Phone</span><span>{{ !empty($user->alternate_phone) ? $user->alternate_phone : 'Not filled in' }}</span>
                                        </li>

                                        <li><span>Family Phone Number</span><span
                                                    class="spadd-ul-s">{{ !empty($user->family_phone_number) ? $user->family_phone_number : 'Not filled in' }}</span>
                                        </li>
                                        <li><span>Landline</span><span
                                                    class="spadd-ul-s">{{ !empty($user->landline) ? $user->landline : 'Not filled in' }}</span>
                                        </li>
                                        <li><span>Whatsup</span><span
                                                    class="spadd-ul-s">{{ !empty($user->whatsup) ? $user->whatsup : 'Not filled in' }}</span>
                                        </li>

                                    </ul>
                                    {{--<p class="spadd-ul-lp spadd-ul-s"><i class="fa fa-thumb-tack"></i>Not interested in settling abroad</p>--}}
                                </div>
                                <div id="section3" class="container-fluid spadd">
                                    <span class="left-same-col"><i class="material-icons"> 	supervisor_account</i>LifeStyle</span>

                                    <ul class="spadd-ul">
                                        <li><span>NonVeg</span><span
                                                    class="spadd-ul-s">{{ !empty($userProfile->non_veg) ? 'Yes' : 'No' }}</span>
                                        </li>
                                        <li>
                                            <span>Drink</span><span>{{ !empty($userProfile->drink) ? 'Yes' : 'No' }} </span>
                                        </li>
                                        <li><span>Somke</span><span
                                                    class="spadd-ul-s">{{ !empty($userProfile->smoke) ? 'Yes' : 'No' }}</span>
                                        </li>
                                        <li><span>Own a House</span><span
                                                    class="spadd-ul-s">{{ !empty($userProfile->own_house) ? 'Yes' : 'No' }}</span>
                                        </li>
                                        <li>
                                            <span>Own a Car</span><span>{{ !empty($userProfile->own_car) ? 'Yes' : 'No' }} </span>
                                        </li>
                                    </ul>
                                    {{--<p class="spadd-ul-lp spadd-ul-s"><i class="fa fa-thumb-tack"></i>Not interested in settling abroad</p>--}}
                                </div>
                                <div id="section3" class="container-fluid spadd">
                                    <span class="left-same-col"><i class="material-icons"> 	supervisor_account</i>Family Details</span>

                                    <ul class="spadd-ul">
                                        <li><span>Father Name</span><span
                                                    class="spadd-ul-s">{{ !empty($userProfile->father_name) ? $userProfile->father_name : 'Not filled in' }}</span>
                                        </li>
                                        <li>
                                            <span>Father's Occupation</span><span>{{ !empty($userProfile->father_occupation) ? $userProfile->father_occupation : 'Not filled in' }} </span>
                                        </li>
                                        <li><span>Mother Name</span><span
                                                    class="spadd-ul-s">{{ !empty($userProfile->mother_name) ? $userProfile->mother_name : 'Not filled in' }}</span>
                                        </li>
                                        <li><span>Mother's Occupation</span><span
                                                    class="spadd-ul-s">{{ !empty($userProfile->mother_occupation) ? $userProfile->mother_occupation : 'Not filled in' }}</span>
                                        </li>

                                        {{--	<li><span>Sister(s)</span><span class="spadd-ul-s">0 sister</span></li>
                                            <li><span>Brother(s)</span><span>0 brother</span></li>--}}
                                        <li>
                                            <span>Gothra</span><span>{{ !empty($userProfile->gothra) ? $userProfile->gothra : 'Not filled in' }} </span>
                                        </li>
                                        {{--<li><span>Gothra (maternal)</span><span class="spadd-ul-s">Ranga</span></li>--}}
                                        {{--<li><span>Family Status</span><span class="spadd-ul-s">Middle Class</span></li>--}}
                                        <li>
                                            <span>Family Income</span><span>{{ !empty($userProfile->family_income) ? $userProfile->family_income : 'Not filled in' }}</span>
                                        </li>
                                        <li>
                                            <span>Living with Parents</span><span>{{ !empty($userProfile->living_with_parents) ? 'Yes' : 'No' }}</span>
                                        </li>
                                        <li>
                                            <span>Willing to go abroad</span><span>{{ !empty($userProfile->abroad_willing) ? 'Yes' : 'No' }}</span>
                                        </li>
                                        {{--<li><span>Family Type</span><span class="spadd-ul-s">Joint Family</span></li>
                                        <li><span>Family Values</span><span class="spadd-ul-s">Liberal</span></li>
                                        <li><span>Family based out of</span><span class="spadd-ul-s">New Delhi</span></li>--}}
                                    </ul>
                                    {{--<p class="spadd-ul-lp spadd-ul-s"><i class="fa fa-thumb-tack"></i>Not interested in settling abroad</p>--}}
                                </div>

                                {{--<div id="section3" class="container-fluid spadd">
                                    <span class="left-same-col"><i class="material-icons"> 	supervisor_account</i>Lifestyle	</span>

                                    <ul class="spadd-ul">
                                        <li><span>Habits</span><span class="spadd-ul-s">Not filled in</span></li>
                                        <li><span>Assets</span><span>Not filled in</span></li>
                                        <li><span>Languages Known</span><span class="spadd-ul-s">Not filled in</span></li>
                                        <li><span>Blood Group</span><span>Not filled in</span></li>
                                        <li><span>Residential Status</span><span>Not filled in</span></li>
                                        <li><span>Special Cases</span><span class="spadd-ul-s">HIV+ - No</span></li>
                                    </ul>
                                </div>--}}
                                {{--<div id="section4" class="container-fluid spadd">
                                    <span class="left-same-col"><i class="material-icons"> 	supervisor_account</i>She Likes	</span>


                                             <p class="pt1-5"><i class="fa fa-paint-brush"></i>
                                             Painting, Cooking</p>

                                             <p class="pt1-5"><i class="fa fa-headphones"></i>
                                             Listening to music, Watching television</p>

                                </div>--}}


                                {{--<div id="section3" class="container-fluid spadd">
                                    <span class="left-same-col"><i class="material-icons"> remove_red_eye</i>Desired Partner</span>
                                    --}}{{--<p class="spaddl-p"><span class="rd-col">Her Preference</span ><span class="lhauto">---------</span><span>7 of 12 matching</span><span class="lhauto">------</span><span class="rd-col">Matches You</span></p>--}}{{--
                                    <table class="table">
                                        <tr>
                                            <td class="same-gre">Age</td>
                                            <td>26 to 32 Years</td>
                                            <td>----</td>
                                        </tr>
                                        <tr>
                                            <td class="same-gre">Height</td>
                                            <td> 5' 6" to 6' 0"</td>
                                            <td class="rd-col"><i class="fa fa-check"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="same-gre">Marital Status</td>
                                            <td>

                                                {{ $marriedStatus }}</td>
                                            <td class="rd-col"><i class="fa fa-check"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="same-gre">Country</td>
                                            <td>{{ $userProfile->country }}</td>
                                            <td class="rd-col"><i class="fa fa-check"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="same-gre">State/City</td>
                                            <td> Delhi, {{ $userProfile->state.', '.$userProfile->city }}</td>
                                            <td class="rd-col"><i class="fa fa-check"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="same-gre">Religion</td>
                                            <td>{{ $userProfile->religion ? ucfirst($userProfile->religion) : null }}</td>
                                            <td class="rd-col"><i class="fa fa-check"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="same-gre">Mother tongue</td>
                                            <td>{{ $userProfile->mother_tongue ? ucfirst($userProfile->mother_tongue) : null }}</td>
                                            <td class="rd-col"><i class="fa fa-check"></i></td>
                                        </tr>
                                    </table>


                                </div>--}}
                            </div>
                            <div class="grid-second-child">
                                <div class="pt-49">
                                    <p>Horoscope</p>
                                </div>
                                <p class="pt20 pr-17">Place of
                                    Birth<br>{{ $userProfile->birth_place ? ucfirst($userProfile->birth_place) : null }}
                                </p>
                                <p class="pt20 pr-17">Date of
                                    Birth<br>{{ !empty($user->dob) ? date('M d, Y', strtotime($user->dob)) : null }}</p>
                                <p class="pt20 pr-17">Time of
                                    Birth<br>{{ !empty($userProfile->birth_time) ? $userProfile->birth_time : 'Not filled in' }}
                                </p>
                                {{-- <p class="pt20 pr-17">Horoscope match is not necessary</p>
                                 <p class="pt20 pr-17">Sun sign<br>Not filled in</p>
                                 <p class="pt20 pr-17">Rashi/Moon Sign<br>Jun 27, 1994</p>
                                 <p class="pt20 pr-17">Nakshatra<br>Not filled in</p>--}}
                                <p class="pt20 pr-17">
                                    Manglik<br>
                                    @if(empty($userProfile->mangalik_status))
                                        Not Filled

                                    @elseif($userProfile->mangalik_status == 'mangalik')
                                        Mangalik
                                    @elseif($userProfile->mangalik_status == 'anshik_manglik')
                                        Anshik manglik
                                    @elseif($userProfile->mangalik_status == 'non_mangalik')
                                        Non Manglik


                                    @endif
                                </p>
                                {{-- <p class="pt20 pr-17"> <a href="#" class="pr-17a">Request horoscope</a></p>--}}

                            </div>
                        </div>
                    </section>


                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

        $(document).ready(function () {
            $('#lightgallery').lightGallery();
// Add scrollspy to <body>
            $('body').scrollspy({target: "#myNavbar", offset: 50});

// Add smooth scrolling on all links inside the navbar
            $("#myNavbar a").on('click', function (event) {
// Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
// Prevent default anchor click behavior
                    event.preventDefault();

// Store hash
                    var hash = this.hash;

// Using jQuery's animate() method to add smooth page scroll
// The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function () {

// Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash - 100;
                    });
                }  // End if
            });
        });
    </script>

@endsection



