@if($otherProfiles->count())
    @foreach($otherProfiles as $user)
<div class="media mb-4 border-bottom">
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
    <img class="thumb_image" src="{{ $profileImg }}" alt="no image">
    <div class="media-body">
        <h6 class="mb-1 mt-0">{{ $user->first_name.' '.$user->last_name }}</h6>
        <div>
            <table class="table-sm table mb-0">
                <tbody><tr>
                    <td>{{ $user->email }}</td>
                    <td>{{ date('d-M Y',strtotime($user->dob)) }}</td>
                    <td>{{ display_caste($user->id) }}</td>
                </tr>
                <tr>
                    <td>{{ $user->marital_status }}</td>
                    <td>{{ $user->mangalik_status == 'yes' ? 'Manglik' : 'Not Manglik' }}</td>
                    <td>{{ $user->higher_education }} {{ !empty($user->college) ? ','.$user->college : '' }}</td>
                </tr>
                </tbody></table>
        </div>
    </div>
</div>
        @endforeach
    {!! $otherProfiles->links() !!}
    @endif
