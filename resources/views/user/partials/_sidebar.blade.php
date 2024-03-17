<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{route('dashboard')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{asset(fromSettings('logo_dark')??'logo-dark.png')}}" alt="" height="30">
            </span>
            <span class="logo-lg">
                <img src="{{asset(fromSettings('logo_dark')??'logo-light.png')}}" alt="" height="30">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{route('dashboard')}}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{asset(fromSettings('logo')??'logo-light.png')}}" alt="" height="30">
            </span>
            <span class="logo-lg">
                <img src="{{asset(fromSettings('logo')??'logo-light.png')}}" alt="" height="30">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                {{-- @can('Dashboard') --}}
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('dashboard')}}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-widgets">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('invites.index')}}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-widgets">Invite</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('dashboard')}}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-widgets">Transactions</span>
                    </a>
                </li>
                {{-- @endcan --}}









                {{-- <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('general.settings')}}">
                        <i class="ri-pages-line"></i>  <span data-key="t-widgets">General Settings</span>
                    </a>
                </li> --}}

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
