<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li @if(Session::get('page')=="dashboard") class="nav-item active" @else class="nav-item" @endif>
            <a class="nav-link" href="{{url('admin/dashboard')}}">
            <i class="mdi mdi-view-dashboard menu-icon"></i>
            <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @if(!empty(Auth::user()->member_id))
        <li @if(Session::get('page')=="user") class="nav-item active" @else class="nav-item" @endif>
            <a class="nav-link" href="{{url('admin/users')}}">
            <i class="mdi mdi-account menu-icon"></i>
            <span class="menu-title">Users</span>
            </a>
        </li>
        <li @if(Session::get('page')=="member") class="nav-item active" @else class="nav-item" @endif>
            <a class="nav-link" href="{{url('admin/members')}}">
            <i class="mdi mdi-account-multiple icon-paper menu-icon"></i>
            <span class="menu-title">Family Members</span>
            </a>
        </li>
        <li @if(Session::get('page')=="relationship") class="nav-item active" @else class="nav-item" @endif>
            <a class="nav-link" href="{{url('admin/relationships')}}">
            <i class="mdi mdi-account-switch menu-icon"></i>
            <span class="menu-title">Relationships</span>
            </a>
        </li>
        <li @if(Session::get('page')=="gallery") class="nav-item active" @else class="nav-item" @endif>
            <a class="nav-link" href="{{url('admin/gallery')}}">
            <i class="mdi mdi-image menu-icon"></i>
            <span class="menu-title">Gallery</span>
            </a>
        </li>
        @else
        <li @if(Session::get('page')=="member") class="nav-item active" @else class="nav-item" @endif>
            <a class="nav-link" href="{{url('admin/register-member')}}">
            <i class="mdi mdi-account menu-icon"></i>
            <span class="menu-title">Register Member</span>
            </a>
        </li>
        @endif
    </ul>
</nav>