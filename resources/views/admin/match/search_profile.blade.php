    <div class="media">
        <svg class="bd-placeholder-img mr-3" width="64" height="64" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 64x64"><title>
                Placeholder</title>
            <rect width="100%" height="100%" fill="#868e96"></rect>
            <text x="50%" y="50%" fill="#dee2e6" dy=".3em">64x64</text>
        </svg>
        <div class="media-body">
            <h3 class="mb-1 mt-0">{{ $user->first_name.' '.$user->last_name }}</h3>
            <div>
                <ul class="list-unstyled row mb-0">
                    <li class="col-md-3 ">{{ $user->email }}</li>
                    <li class="col-md-3">{{ date('d-M Y',strtotime($user->dob)) }}</li>
                    <li class="col-md-3 ">{{ display_caste($user->id) }}</li>
                    <li class="col-md-3">{{ $user->marital_status }}</li>
                    <li class="col-md-3">{{ $user->age }} Years</li>
                    <li class="col-md-3 ">{{ $user->mangalik_status == 'yes' ? 'Manglik' : 'Not Manglik' }}</li>
                    <li class="col-md-3 ">{{ $user->higher_education }} {{ !empty($user->college) ? ','.$user->college : '' }}</li>
                    <li class="col-md-3 ">{{ $user->city.', '.$user->state }}</li>
                </ul>
            </div>
        </div>
    </div>