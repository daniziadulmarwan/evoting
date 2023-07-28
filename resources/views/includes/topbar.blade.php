<div class="navbar-custom">
  <div class="container-fluid">
    <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="dropdown d-none d-lg-inline-block">
            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                <i class="fe-maximize noti-icon"></i>
            </a>
        </li>

        <li class="dropdown notification-list topbar-dropdown">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="/assets/images/profile.jpg" alt="user-image" class="rounded-circle">
                <span class="pro-user-name ml-1 text-dark">
                    {{ auth()->user()->fullname }} <i class="mdi mdi-chevron-down"></i> 
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-user"></i>
                    <span>My Account</span>
                </a>

                <a href="/admin/setting" class="dropdown-item notify-item">
                    <i class="fe-settings"></i>
                    <span>Settings</span>
                </a>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-lock"></i>
                    <span>Lock Screen</span>
                </a>

                <div class="dropdown-divider"></div>

                <form action="/logout" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </button>
                </form>

            </div>
        </li>
    </ul>

    <!-- LOGO Start -->
    <div class="logo-box hidden">
        <a href="/admin/dashboard" class="logo text-center">
            <span class="logo-sm">
                <span class="logo-lg-text-dark"></span>
            </span>
            <span class="logo-lg">
                <span class="logo-lg-text-dark">E-Voting</span>
            </span>
        </a>
    </div>

    <!-- LOGO End -->

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i data-feather="align-left"></i>
            </button>
        </li>
    </ul>
    <div class="clearfix"></div>
  </div>
</div>