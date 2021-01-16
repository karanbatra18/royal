@if($otherProfiles->count())
    <div class="media mb-12 pro_send_btn">
    <button type="button" class="btn btn-primary search_pro send_profile">Send Profiles
        <div class="ripple-container"></div>
    </button>
    </div>
    @foreach($otherProfiles as $user)
<div class="media mb-4 border-bottom">
    @php
        $profileImg = '';
        if(!empty($user->{$user->default_pic})) {
            $profileImg = asset('assets/images/users/'.$user->{$user->default_pic});
        } else
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
      	<input type="checkbox" name="send_profile" class="pdf_profile" value="{{ $user->id }}">

    <div class="position-relative">
    	 <a data-fancybox="gallery-{{ $user->id }}" href="https://source.unsplash.com/O7qK1vQY3p0/1519x2279"> <img class="thumb_image"   src="{{ $profileImg }}" alt="no image"> </a>
         <div class="pop-gallery position-absolute w-100 h-100" style="left:0; top:0; opacity:0; overflow:hidden">
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
        <h6 class="mb-1 mt-0">
            <a href="{{ route('user.show', ['user_id' => $user->id]) }}"> {{ $user->first_name.' '.$user->last_name }} </a>

        
        </h6>
          <ul class="match-ullist">
              @if(in_array($user->id, $userSentProfiles))
                  {{--<span class="already_sent">--}}
                      <li> <a href="#">
                    {{--<i class="fa fa-paper-plane" aria-hidden="true"></i>--}}
                      <i class="fa fa-history" aria-hidden="true"></i>
                              </a></li>
                      {{--  <i class="fa fa-check-square-o" aria-hidden="true"></i>--}}

              @endif
       {{-- <li> <a href="#"><i class="fa fa-history" aria-hidden="true"></i></a></li>--}}
        <li> <a class="print_pdf" data-id="{{ $user->id }}" href="{{ route('admin.print_profile',['id' => $user->id]) }}"> <i class="fa fa-print"></i></a></li>
</ul>  
        <div>
            <table class="table-sm table mb-0">
                <tbody><tr>
                    <td>{{ $user->email }}</td>
                    <td>{{ date('d-M Y',strtotime($user->dob)) }}</td>
                    <td>{{ display_caste($user->id) }}</td>
                </tr>
                <tr>
                    <td>@php
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
                    {{ $marriedStatus }}</td>
                    <td>{{ $user->mangalik_status == 'yes' ? 'Manglik' : 'Not Manglik' }}</td>
                    <td>{{ $user->higher_education }} {{ !empty($user->college) ? ','.$user->college : '' }}</td>
                    <td><a href="{{ route('user.show', ['user_id' => $user->id]) }}">View Profile</a></td>
                </tr>
                </tbody></table>
        </div>
    </div>
</div>
        @endforeach
    {!! $otherProfiles->links() !!}
    @endif
