<aside class="col-md-4 col-lg-3">
    <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
        <li class="nav-item">
            <a href="{{url('/user_dashboard/'.Auth::user()->id)}}" class="nav-link {{ Request::is('user_dashboard/'.Auth::user()->id) ? 'active' : ''}}">Dashboard</a>
        </li>
        <li class="nav-item">
            <a href="{{url('/user_orders')}}" class="nav-link {{ Request::is('user_orders') ? 'active' : ''}}">Orders</a>
        </li>
        <li class="nav-item">
            <a href="{{url('/edit_profile')}}" class="nav-link {{ Request::is('edit_profile') ? 'active' : ''}}">Edit Profile</a>
        </li>
        <li class="nav-item">
            <a href="{{url('/change_password/'.Auth::user()->remember_token)}}" class="nav-link {{ Request::is('change_password/'.Auth::user()->remember_token) ? 'active' : ''}}">Change Password</a>
        </li>
        <li class="nav-item">
            <a onclick="logout_confirmation(event)" class="nav-link" href="{{url('/log_out')}}">Sign Out</a>
        </li>
    </ul>
</aside>


