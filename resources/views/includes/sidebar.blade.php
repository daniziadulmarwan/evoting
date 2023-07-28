<div class="left-side-menu">
  <div class="h-100" data-simplebar>
    <!-- User box -->
    <div class="user-box text-center">
        <img src="/assets/images/light.png" alt="user-img" title="{{ auth()->user()->fullname }}"
            class="rounded-circle avatar-md">
        <div class="dropdown">
            <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                data-toggle="dropdown">{{ auth()->user()->fullname }}</a>
            <div class="dropdown-menu user-pro-dropdown">

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-user mr-1"></i>
                    <span>My Account</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-settings mr-1"></i>
                    <span>Settings</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-lock mr-1"></i>
                    <span>Lock Screen</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-log-out mr-1"></i>
                    <span>Logout</span>
                </a>

            </div>
        </div>
        <p class="text-muted">
            @if (auth()->user()->status == 'admin')
                <span class="text-success">Administrator</span>
            @else
                <span class="text-danger">Operator</span>
            @endif
        </p>
    </div>

    <!--- Sidebar Start -->
    <div id="sidebar-menu">

        <ul id="side-menu">

            <li class="menu-title">Reports</li>

            <li>
                <a href="/admin/dashboard">
                    <i data-feather="airplay"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li>
                <a href="/admin/vote">
                    <i data-feather="lock"></i>
                    <span> Votes </span>
                </a>
            </li>

            <li class="menu-title mt-2">Manage</li>

            <li>
                <a href="/admin/voter">
                    <i data-feather="users"></i>
                    <span> Voters </span>
                </a>
            </li>

            <li>
                <a href="/admin/position">
                    <i data-feather="server"></i>
                    <span> Positions </span>
                </a>
            </li>

            <li>
                <a href="/admin/candidate">
                    <i data-feather="award"></i>
                    <span> Candidates </span>
                </a>
            </li>

            <li class="menu-title mt-2">Setting</li>

            <li>
                <a href="/admin/setting">
                    <i data-feather="settings"></i>
                    <span> Setting </span>
                </a>
            </li>
        </ul>
    </div>
    <!-- Sidebar End -->

    <div class="clearfix"></div>
  </div>
</div>