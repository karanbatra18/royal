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

        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> <i class="material-icons">person</i></span>
                <span class="sidebar-normal"> User Management</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('caste.index') }}">
                <span class="sidebar-mini"> <i class="material-icons">person</i></span>
                <span class="sidebar-normal"> Caste Management </span>
            </a>
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
            <a class="nav-link" href="{{ route('swyamber.index') }}">
                <span class="sidebar-mini"> <i class="material-icons">person</i></span>
                <span class="sidebar-normal"> Swyamber Management</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('membership.index') }}">
                <span class="sidebar-mini"> <i class="material-icons">person</i></span>
                <span class="sidebar-normal"> Membership Management</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="{{ route('lead.index') }}">
                <span class="sidebar-mini"> <i class="material-icons">person</i></span>
                <span class="sidebar-normal"> Lead Management</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('member.index') }}">
                <span class="sidebar-mini"> <i class="material-icons">person</i></span>
                <span class="sidebar-normal"> Member Management</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('email.index') }}">
                <i class="material-icons">E</i>
                <p>Email Templates</p>
            </a>
        </li>

    </ul>
</div>