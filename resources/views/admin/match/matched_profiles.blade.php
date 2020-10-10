@if($otherProfiles->count())
    @foreach($otherProfiles as $user)

<div class="media mb-4 border-bottom">
    <svg class="bd-placeholder-img mr-3" width="64" height="64" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 64x64"><title>
            Placeholder</title>
        <rect width="100%" height="100%" fill="#868e96"></rect>
        <text x="50%" y="50%" fill="#dee2e6" dy=".3em">64x64</text>
    </svg>
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
