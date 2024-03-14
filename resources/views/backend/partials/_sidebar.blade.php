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
                @can('Dashboard')
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('dashboard')}}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-widgets">Dashboard</span>
                    </a>
                </li>
                @endcan


                @can('Medias List')
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('media.index')}}">
                        <i class=" ri-image-line"></i> <span data-key="t-widgets">Media</span>
                    </a>
                </li>
                @endcan

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">AUTHORIZATION</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarUserManagement" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarUserManagement">
                        <i class="ri-group-2-fill"></i> <span data-key="t-dashboards">User Management</span>
                    </a>

                    <div class="collapse menu-dropdown" id="sidebarUserManagement">
                        <ul class="nav nav-sm flex-column">
                            @can('Users List')
                            <li class="nav-item">
                                <a href="{{route('users.index')}}" class="nav-link" data-key="t-analytics"> Users </a>
                            </li>
                            @endcan
                            @can("Roles List")
                            <li class="nav-item">
                                <a href="{{route('roles.index')}}" class="nav-link" data-key="t-analytics"> Roles </a>
                            </li>
                            @endcan
                            @can("Permissions List")
                            <li class="nav-item">
                                <a href="{{route('permissions.index')}}" class="nav-link" data-key="t-analytics"> Permissions </a>
                            </li>
                            @endcan
                        </ul>
                    </div>


                </li>







                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('general.settings')}}">
                        <i class="ri-pages-line"></i>  <span data-key="t-widgets">General Settings</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
