<!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
<div class="logo"><a href="#" class="simple-text logo-normal">
        <img width="119" height="52" src="https://royalmatrimonial.com/wp-content/uploads/2020/02/logo.png"
             class="custom-logo" alt="Royalmatrimonial">
    </a></div>
<div class="sidebar-wrapper">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
            </a>
        </li>
        @if(auth()->user()->role_id == 1)
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.permissions.create') }}">
                <i class="material-icons">P</i>
                <p>Permissions</p>
            </a>
        </li>
        @endif
        @php
            $userPermission = getModulePermission(auth()->id(), 1);
        @endphp
        @if(auth()->user()->role_id == 1 || !empty($userPermission ) && ($userPermission->can_write == 1 || $userPermission->can_edit == 1 || $userPermission->can_delete == 1 || $userPermission->can_activate == 1))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> <i class="material-icons">person</i></span>
                <span class="sidebar-normal"> User Management</span>
            </a>
        </li>
        @endif
        @php
            $castePermission = getModulePermission(auth()->id(), 9);
        @endphp
        @if(auth()->user()->role_id == 1 || !empty($castePermission ) && ($castePermission->can_write == 1 || $castePermission->can_edit == 1 || $castePermission->can_delete == 1))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('caste.index') }}">
                <span class="sidebar-mini"> <i class="material-icons">person</i></span>
                <span class="sidebar-normal"> Caste Management </span>
            </a>
        </li>
        @endif
        @php
            $machPermission = getModulePermission(auth()->id(), 2);
        @endphp
        @if(auth()->user()->role_id == 1 || !empty($machPermission ) && ($machPermission->can_write == 1 || $machPermission->can_edit == 1 || $machPermission->can_delete == 1))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.match') }}">
                <i class="material-icons">person</i>
                <p>Match Profile</p>
            </a>
        </li>
        @endif
        @php
            $birthdayPermission = getModulePermission(auth()->id(), 3);
        @endphp
        @if(auth()->user()->role_id == 1 || !empty($birthdayPermission ) && ($birthdayPermission->can_write == 1 || $birthdayPermission->can_edit == 1 || $birthdayPermission->can_delete == 1))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.birthday', ['birthday_date' => date('Y-m-d')]) }}">
                <i class="material-icons">B</i>
                <p>Birthday Listing</p>
            </a>
        </li>
        @endif
        @php
            $swyamberPermission = getModulePermission(auth()->id(), 4);
        @endphp
        @if(auth()->user()->role_id == 1 || !empty($swyamberPermission) && ($swyamberPermission->can_write == 1 || $swyamberPermission->can_edit == 1 || $swyamberPermission->can_delete == 1))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('swyamber.index') }}">
                <span class="sidebar-mini"> <i class="material-icons">person</i></span>
                <span class="sidebar-normal"> Swyamber Management</span>
            </a>
        </li>
        @endif
        @php
            $membershipPermission = getModulePermission(auth()->id(), 5);
        @endphp
        @if(auth()->user()->role_id == 1 || !empty($membershipPermission ) && ($membershipPermission->can_write == 1 || $membershipPermission->can_edit == 1 || $membershipPermission->can_delete == 1))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('membership.index') }}">
                <span class="sidebar-mini"> <i class="material-icons">person</i></span>
                <span class="sidebar-normal"> Membership Management</span>
            </a>
        </li>
        @endif
        @php
            $leadPermission = getModulePermission(auth()->id(), 6);
        @endphp
        @if(auth()->user()->role_id == 1 || !empty($leadPermission ) && ($leadPermission->can_write == 1 || $leadPermission ->can_edit == 1 || $leadPermission->can_delete == 1))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('lead.index') }}">
                <span class="sidebar-mini"> <i class="material-icons">person</i></span>
                <span class="sidebar-normal"> Lead Management</span>
            </a>
        </li>
        @endif
        @php
            $memberPermission = getModulePermission(auth()->id(), 7);
        @endphp
        @if(auth()->user()->role_id == 1 || !empty($memberPermission ) && ($memberPermission->can_write == 1 || $memberPermission ->can_edit == 1 || $memberPermission->can_delete == 1))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('member.index') }}">
                <span class="sidebar-mini"> <i class="material-icons">person</i></span>
                <span class="sidebar-normal"> Member Management</span>
            </a>
        </li>
        @endif
        @php
            $templatePermission = getModulePermission(auth()->id(), 8);
        @endphp
        @if(auth()->user()->role_id == 1 || !empty($templatePermission ) && ($templatePermission->can_write == 1 || $templatePermission->can_edit == 1 || $templatePermission->can_delete == 1))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('email.index') }}">
                <i class="material-icons">E</i>
                <p>Email Templates</p>
            </a>
        </li>
        @endif
    </ul>
</div>