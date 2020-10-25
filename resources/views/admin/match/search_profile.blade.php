<div class="media">
    @php
        $profileImg = '';
        if(!empty($user->profile_picture1)) {
            $profileImg = asset('assets/images/users/'.$user->profile_picture1);
        } else if(!empty($user->profile_picture2)) {
            $profileImg = asset('assets/images/users/'.$user->profile_picture2);
        } else if(!empty($user->profile_picture3)) {
            $profileImg = asset('assets/images/users/'.$user->profile_picture3);
        } else if(!empty($user->profile_picture4)) {
            $profileImg = asset('assets/images/users/'.$user->profile_picture3);
        } else if(!empty($user->profile_picture5)) {
            $profileImg = asset('assets/images/users/'.$user->profile_picture3);
        } else {
            $profileImg = asset('assets/images/users/default.jpg');
        }
    @endphp
    {{--<a href="{{ route('user.show', ['user_id' => $user->id]) }}">
    <img class="thumb_image" src="{{ $profileImg }}" alt="no image">
    </a>--}}

    <div class="position-relative">
        <img class="thumb_image"   src="{{ $profileImg }}" alt="no image">
        <div class="pop-gallery position-absolute overflow-hidden" style="left:0; top:0; opacity:0">
            @for($i = 1; $i <= 5; $i++)
                <?php $imageName = 'profile_picture'.$i; ?>
                @if(!empty($user->$imageName))
                    <a data-fancybox="gallery-{{ $user->id }}" href="{{ asset('assets/images/users/'.$user->$imageName) }}">
                        <img src="{{ asset('assets/images/users/'.$user->$imageName) }}" alt="">
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
    <div class="media-body">
        <h3 class="mb-1 mt-0"><a href="{{ route('user.show', ['user_id' => $user->id]) }}">{{ $user->first_name.' '.$user->last_name }}</a></h3>
        <div>
            <ul class="list-unstyled row mb-0">
                <li class="col-md-3 ">{{ $user->email }}</li>
                <li class="col-md-3">{{ date('d-M Y',strtotime($user->dob)) }}</li>
                <li class="col-md-3 ">{{ display_caste($user->id) }}</li>
                <li class="col-md-3">
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
                    {{ $marriedStatus }}</li>
                <li class="col-md-3">{{ $user->age }} Years</li>
                <li class="col-md-3 ">{{ $user->mangalik_status == 'yes' ? 'Manglik' : 'Not Manglik' }}</li>
                <li class="col-md-3 ">{{ $user->higher_education }} {{ !empty($user->college) ? ','.$user->college : '' }}</li>
                <li class="col-md-3 ">{{ $user->city.', '.$user->state }}</li>
                <li class="col-md-3 "><a href="{{ route('user.show', ['user_id' => $user->id]) }}">View Profile</a></li>
            </ul>
        </div>
    </div>
</div>