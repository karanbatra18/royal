<!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
<div class="logo"><a href="#" class="simple-text logo-normal">
        <img width="119" height="52" src="https://royalmatrimonial.com/wp-content/uploads/2020/02/logo.png" class="custom-logo" alt="Royalmatrimonial">
    </a></div>
<div class="sidebar-wrapper">
    <ul class="nav">
        <li class="nav-item active  ">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
            </a>
        </li>
             @if(auth()->user()->role_id == 1)
                       
        <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
                        <span class="sidebar-mini"> <i class="material-icons">person</i></span>
                         
                        <p>User Management
                        <b class="caret"></b>
                      </p>
                    </a>
                    <div class="collapse show" id="laravelExample" style="">
                      <ul class="nav">
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('user.create') }}">
                            <span class="sidebar-mini">  <i class="material-icons">person</i> </span>
                            <span class="sidebar-normal">Add User </span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('user.index') }}">
                            <span class="sidebar-mini"> <i class="material-icons">person</i></span>
                            <span class="sidebar-normal"> All User</span>
                          </a>
                        </li>
                        
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('caste.index') }}">
                            <span class="sidebar-mini"> <i class="material-icons">person</i></span>
                            <span class="sidebar-normal"> Caste Management </span>
                          </a>
                        </li>
                      </ul>
                    </div>
        </li>
        
         <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.match') }}">
                <i class="material-icons">person</i>
                <p>Match Profile</p>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.birthday', ['birthday_date' => date('Y-m-d')]) }}">
                <i class="material-icons">B</i>
                <p>Birthday Listing</p>
            </a>
        </li>
        
        
         <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#swayamber" aria-expanded="false">
                        <span class="sidebar-mini"> <i class="material-icons">person</i></span>
                         
                        <p>Swyamber
                        <b class="caret"></b>
                      </p>
                    </a>
                    <div class="collapse" id="swayamber" style="">
                      <ul class="nav">
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('swyamber.create') }}">
                            <span class="sidebar-mini">  <i class="material-icons">person</i> </span>
                            <span class="sidebar-normal">Add Swyamber </span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('swyamber.index') }}">
                            <span class="sidebar-mini"> <i class="material-icons">person</i></span>
                            <span class="sidebar-normal"> All Swyamber</span>
                          </a>
                        </li>
                      </ul>
                    </div>
        </li>
        
        
        
      
             <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#membership" aria-expanded="false">
                        <span class="sidebar-mini"> <i class="material-icons">person</i></span>
                         
                        <p>Membership
                        <b class="caret"></b>
                      </p>
                    </a>
                    <div class="collapse" id="membership" style="">
                      <ul class="nav">
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('membership.create') }}">
                            <span class="sidebar-mini">  <i class="material-icons">person</i> </span>
                            <span class="sidebar-normal">Add Plan </span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('membership.index') }}">
                            <span class="sidebar-mini"> <i class="material-icons">person</i></span>
                            <span class="sidebar-normal"> All Plans</span>
                          </a>
                        </li>
                      </ul>
                    </div>
        </li>
        
        @endif;
        
          <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#leadm" aria-expanded="false">
                        <span class="sidebar-mini"> <i class="material-icons">person</i></span>
                         
                        <p>Lead Management
                        <b class="caret"></b>
                      </p>
                    </a>
                    <div class="collapse" id="leadm" style="">
                      <ul class="nav">
                                 @if(auth()->user()->role_id == 1)
      
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('lead.create') }}">
                            <span class="sidebar-mini">  <i class="material-icons">person</i> </span>
                            <span class="sidebar-normal">Add Lead </span>
                          </a>
                        </li>
                        @endif;
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('lead.index') }}">
                            <span class="sidebar-mini"> <i class="material-icons">person</i></span>
                            <span class="sidebar-normal"> All Lead</span>
                          </a>
                        </li>
                      </ul>
                    </div>
        </li>
        
             @if(auth()->user()->role_id == 1)
                       
            <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#laravelExamples" aria-expanded="false">
                        <span class="sidebar-mini"> <i class="material-icons">person</i></span>
                         
                        <p>Member Management
                        <b class="caret"></b>
                      </p>
                    </a>
                    <div class="collapse" id="laravelExamples" style="">
                      <ul class="nav">
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('member.create') }}">
                            <span class="sidebar-mini">  <i class="material-icons">person</i> </span>
                            <span class="sidebar-normal">Add Member </span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('member.index') }}">
                            <span class="sidebar-mini"> <i class="material-icons">person</i></span>
                            <span class="sidebar-normal"> All Member</span>
                          </a>
                        </li>
                      </ul>
                    </div>
        </li>
        
    
        

        
           <li class="nav-item">
            <a class="nav-link" href="{{ route('email.index') }}">
                <i class="material-icons">E</i>
                <p>Email Templates</p>
            </a>
        </li>
@endif;
    </ul>
</div>