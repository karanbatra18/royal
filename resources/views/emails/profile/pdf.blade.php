<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Home</title>
</head>
<style>
    img {
        max-width: 100%;
    }

    a img {
        border: none;
    }

    .clear {
        clear: both;
    }

    a {
        transition: 0.2s;
        text-decoration: none;
        transition-property: all;
        transition-timing-function: ease-in-out;
    }

    .wrapper {
        max-width: 700px;
        margin: 0 auto;
        width: 100%;
        height: 100%;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
    }

    .right-sec {
        float: left;
        width: 25%;

    }

    body {
        color: #3C4858;
        font-weight: 300;
        font-family: "Roboto", "Helvetica", "Arial", sans-serif;
        background-color: #e7e6e6;
        margin: 0;
        padding: 0;
    }

    .mid-sec #inner-sec span i {
        font-size: 20px;
        padding: 0px 10px;
    }

    .lft-sec {
        float: left;
        width: 25%;

    }

    .lft-sec .image {
        background: #fff;
        padding: 10px 10px;
        min-height: 198px;
    }

    .mid-sec {
        width: 50%;
        float: left;
    }

    .mid-sec #inner-sec {
        padding: 10px 10px;
        min-height: 198px;
        background: #f0f2f7;

    }

    .mid-sec #inner-sec span {
        font-size: 24px;
        color: #3C4858;
        font-weight: 300;
    }

    .mid-sec #list-ul {
        list-style: none;
        display: grid;
        grid-template-columns: 1fr 1fr;
        padding: 0;
    }

    .mid-sec #list-ul li {
        font-size: 13px;
        padding: 3px 0px;
    }

    .right-sec .right-info {
        background: #34495e;
        padding: 10px 10px;
        min-height: 198px;
    }

    .left-heading i {
        padding-right: 10px;
    }

    .left-heading {
        font-size: 17px;
        color: #d9475c;
        font-weight: inherit;
        position: relative;
    }

    #section2 {
        height: auto;
        border-bottom: 1px solid #34495e;
        padding-top: 20px;
        padding: 30px 22px 10px 30px;

    }

    .basic-info-ul {
        padding: 0;
        margin: 0;
        list-style: none;
        display: grid;
        grid-template-columns: 1fr 1fr;
    }

    .spadd-ul-s {
        color: #34495e;
    }

    .basic-info-ul li {
        padding-bottom: 10px;
        padding-top: 15px;
        display: grid;
        color: #999;
        font-size: 15px;
        letter-spacing: .50px;
    }

    .basic-info .lft-info {
        /* background: #fff; */
        float: left;
        width: 72%;
    }

    .pt-49 p {
        font-size: 17px;
        padding-left: 16px;
    }

    .basic-info .inner-info {
        background: #fff;
    }

    .basic-info .right-info {
        float: left;
        width: 25%;
        margin-left: 21px;
    }

    .basic-info {
        margin-top: 20px;
    }

    .basic-info .right-info .inner-sec {
        background: #fff;
        padding-bottom: 10px;
    }

    .pt-49 {
        padding-top: 44px;
        border-bottom: 1px solid;
        margin-bottom: 15px;
    }

    .pr-17 {
        padding: 15px 16px 0px 16px;
        color: silver;
    }
</style>
<body>

<div class="user-profle">
    <div class="wrapper">
        <div class="lft-sec">
            <div class="image">
                <!--<img src="dipika.png">-->
            </div>
        </div>

        <div class="mid-sec">

            <div id="inner-sec">
                <span>{{ $user->full_name }}</span><span><i class="fa fa-question-circle-o"></i></span>
                <hr>
                <ul id="list-ul">
                    <li>{{ !empty($userProfile->folio_no) ? $userProfile->folio_no : '' }}</li>


                    <li>{{ !empty($userProfile->religion) ? $userProfile->religion : '' }}</li>
                    <li>

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
                        {{ $income }}
                    </li>
                    <li>{{ !empty($userProfile->mother_tongue) ? $userProfile->mother_tongue : '' }}</li>


                    <li>{{ !empty($userProfile->state) ? $userProfile->state : '' }}</li>
                    <li> @php
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
            </div>

        </div>

        <div class="right-sec">
            <div class="right-info">
            </div>
        </div>
        <div class="clear"></div>
    </div>

</div>
<div class="wrapper">
    <div class="basic-info">
        <div class="lft-info">
            <div class="inner-info">
                <div id="section2">
                                    <span class="left-heading"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
Basic Information</span>

                    <ul class="basic-info-ul">
                        <li><span>Firstname</span><span class="spadd-ul-s">{{ $user->first_name }}</span>
                        </li>
                        <li>
                            <span>Lastname</span><span>{{ $user->last_name }}</span>
                        </li>

                        <li><span>Email</span><span class="spadd-ul-s">{{ !empty($user->email) ? $user->email : 'Not filled in' }}</span>
                        </li>
                        <li><span>Gender</span><span class="spadd-ul-s">{{ !empty($user->gender) ? $user->gender : 'Not filled in' }}</span>
                        </li>
                        <li>
                            <span>Date of Birth</span><span>{{ date('d-M Y',strtotime($user->dob)) }}</span>
                        </li>
                        <li><span>Marital Status</span><span class="spadd-ul-s">@php
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
                                {{ $marriedStatus }}</span></li>
                        <li><span>Phone</span><span class="spadd-ul-s">{{ !empty($user->phone) ? $user->phone : 'Not filled in' }}</span>
                        </li>
                    </ul>

                </div>
                <div id="section2">
                                    <span class="left-heading"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
About Me</span>

                    <ul class="basic-info-ul">
                        <li><span>Personal Details</span><span class="spadd-ul-s">{{ !empty($userProfile->personal_detail) ? $userProfile->personal_detail : 'Not filled in' }}</span>
                        </li>
                        <li>
                            <span>Weight</span><span>{{ !empty($userProfile->weight) ? $userProfile->weight : 'Not filled in' }}</span>
                        </li>
                        <li><span>Body Type</span><span class="spadd-ul-s">{{ !empty($userProfile->body_type) ? $userProfile->body_type : 'Not filled in' }}</span>
                        </li>
                        <li><span>Complexion</span><span class="spadd-ul-s">{{ !empty($userProfile->complexion) ? ucfirst($userProfile->complexion) : 'Not filled in' }}</span>
                        </li>
                        <li>
                            <span>Challanged</span><span>{{ !empty($userProfile->challanged) ? $userProfile->challanged : 'Not filled in' }}</span>
                        </li>
                    </ul>

                </div>
                <div id="section2">
                                    <span class="left-heading"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
Education & Career</span>

                    <ul class="basic-info-ul">
                        <li><span>About Education</span><span class="spadd-ul-s">{{ !empty($userProfile->education) ? $userProfile->education : 'Not filled in' }}</span>
                        </li>
                        <li><span>Highest Education</span><span class="spadd-ul-s">{{ !empty($userProfile->higher_education) ? $userProfile->higher_education : 'Not filled in' }}</span>
                        </li>
                        <li>
                            <span>College</span><span>{{ !empty($userProfile->college) ? $userProfile->college : 'Not filled in' }}</span>
                        </li>
                        <li>
                            <span>School Name</span><span>{{ !empty($userProfile->school) ? $userProfile->school : 'Not filled in' }}</span>
                        </li>

                        <li><span>About Career</span><span class="spadd-ul-s">{{ !empty($userProfile->about_career) ? $userProfile->about_career : 'Not filled in' }}</span>
                        </li>
                        <li><span>Employed In</span><span class="spadd-ul-s">{{ !empty($userProfile->employed_in) ? $userProfile->employed_in : 'Not filled in' }}</span>
                        </li>
                        <li><span>Occupation</span><span class="spadd-ul-s">{{ !empty($userProfile->occupation) ? $userProfile->occupation : 'Not filled in' }}</span>
                        </li>
                        <li>
                            <span>Organization Name</span><span>{{ !empty($userProfile->organization_name) ? $userProfile->organization_name : 'Not filled in' }}</span>
                        </li>
                    </ul>

                </div>
                <div id="section2">
                                    <span class="left-heading"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
Contact Details</span>

                    <ul class="basic-info-ul">
                        <li><span>Email</span><span class="spadd-ul-s">{{ !empty($user->email) ? $user->email : 'Not filled in' }}</span>
                        </li>
                        <li><span>Alternate Email</span><span class="spadd-ul-s">{{ !empty($user->alternate_email) ? $user->alternate_email : 'Not filled in' }}</span>
                        </li>
                        <li>
                            <span>Phone</span><span>{{ !empty($user->phone) ? $user->phone : 'Not filled in' }}</span>
                        </li>
                        <li>
                            <span>Alternate Phone</span><span>{{ !empty($user->alternate_phone) ? $user->alternate_phone : 'Not filled in' }}</span>
                        </li>

                        <li><span>Family Phone Number</span><span class="spadd-ul-s">{{ !empty($user->family_phone_number) ? $user->family_phone_number : 'Not filled in' }}</span>
                        </li>
                        <li><span>Landline</span><span class="spadd-ul-s">{{ !empty($user->landline) ? $user->landline : 'Not filled in' }}</span>
                        </li>
                        <li><span>Whatsup</span><span class="spadd-ul-s">{{ !empty($user->whatsup) ? $user->whatsup : 'Not filled in' }}</span>
                        </li>
                    </ul>

                </div>
                <div id="section2">
                                    <span class="left-heading"><i class="fa fa-user" aria-hidden="true"></i>
LifeStyle</span>

                    <ul class="basic-info-ul">
                        <li><span>NonVeg</span><span class="spadd-ul-s">{{ !empty($userProfile->non_veg) ? 'Yes' : 'No' }}</span>
                        </li>
                        <li>
                            <span>Drink</span><span>{{ !empty($userProfile->drink) ? 'Yes' : 'No' }}  </span>
                        </li>
                        <li><span>Somke</span><span class="spadd-ul-s">{{ !empty($userProfile->smoke) ? 'Yes' : 'No' }}</span>
                        </li>
                        <li><span>Own a House</span><span class="spadd-ul-s">{{ !empty($userProfile->own_house) ? 'Yes' : 'No' }}</span>
                        </li>
                        <li>
                            <span>Own a Car</span><span>{{ !empty($userProfile->own_car) ? 'Yes' : 'No' }} </span>
                        </li>
                    </ul>

                </div>
                <div id="section2">
                                    <span class="left-heading"><i class="fa fa-user" aria-hidden="true"></i>

Family Details</span>

                    <ul class="basic-info-ul">

                        <li><span>Father Name</span><span class="spadd-ul-s">{{ !empty($userProfile->father_name) ? $userProfile->father_name : 'Not filled in' }}</span>
                        </li>
                        <li>
                            <span>Father's Occupation</span><span>{{ !empty($userProfile->father_occupation) ? $userProfile->father_occupation : 'Not filled in' }}</span>
                        </li>
                        <li><span>Mother Name</span><span class="spadd-ul-s">{{ !empty($userProfile->mother_name) ? $userProfile->mother_name : 'Not filled in' }}</span>
                        </li>
                        <li><span>Mother's Occupation</span><span class="spadd-ul-s">{{ !empty($userProfile->mother_occupation) ? $userProfile->mother_occupation : 'Not filled in' }}</span>
                        </li>


                        <li>
                            <span>Gothra</span><span>{{ !empty($userProfile->gothra) ? $userProfile->gothra : 'Not filled in' }} </span>
                        </li>


                        <li>
                            <span>Family Income</span><span>{{ !empty($userProfile->family_income) ? $userProfile->family_income : 'Not filled in' }}</span>
                        </li>
                        <li>
                            <span>Living with Parents</span><span>{{ !empty($userProfile->living_with_parents) ? 'Yes' : 'No' }}</span>
                        </li>
                        <li>
                            <span>Willing to go abroad</span><span>{{ !empty($userProfile->abroad_willing) ? 'Yes' : 'No' }}</span>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
        <div class="right-info">
            <div class="inner-sec">
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


                </div>
            </div>
        </div>
        <div class="clear"></div>

    </div>
</div>
</body>
</html>