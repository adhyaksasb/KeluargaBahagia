<nav>
  <div class="nav-bar">
    <i class="bx bx-menu sidebarOpen"></i>
    <span class="logo navLogo"><a href="{{url('/')}}">Keluarga<span class="bahagia">Bahagia</span></a></span>

    <div class="menu">
      <div class="logo-toggle">
        <span class="logo"><a href="{{url('/')}}">Keluarga<span class="bahagia">Bahagia</span></a></span>
        <i class="bx bx-x siderbarClose"></i>
      </div>

      <ul class="nav-links">
        <li><a href="{{url('/')}}">Home</a></li>
        <li><a href="{{url('genealogy')}}">Genealogy</a></li>
        <li><a href="{{url('members')}}">Members</a></li>
        <li><a href="{{url('gallery')}}">Gallery</a></li>
        <li class="hidden"><a href="{{url('login')}}">Login</a></li>
      </ul>
    </div>
    <div class="darkLight-searchBox">
      <div class="dark-light">
        <i class="bx bx-moon moon"></i>
        <i class="bx bx-sun sun"></i>
      </div>
      <div class="searchBox">
        <div class="searchToggle">
          <i class="bx bx-x cancel"></i>
          <i class="bx bx-search search"></i>
        </div>
        <div class="search-field">
          <input type="text" placeholder="Search..." />
          <i class="bx bx-search"></i>
        </div>
      </div>
      <div class="login">
        @if(Auth::check())        
        <div class="dropdown">
          <button class="dropbtn">{{Auth::user()->name}} 
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="{{url("admin/dashboard")}}">Admin Panel</a>
            <a href="{{url("user/logout")}}">Logout</a>
          </div>
        </div> 
        @else 
        <a href="{{url("login")}}" class="button">Login</a> 
        @endif
      </div>
    </div>
  </div>
</nav>