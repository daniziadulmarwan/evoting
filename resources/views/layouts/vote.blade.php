<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8" />
      <title>EVoting</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
      <meta content="EVoting App" name="daniziadulmarwan" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- App favicon -->
      <link rel="shortcut icon" href="/assets/images/md.png">

      <!-- Fonts Poppins -->
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

      <!-- plugin css -->
      <link href="/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

      <!-- App css -->
      <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
      <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

      <link href="/assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
      <link href="/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

      <!-- Icons -->
      <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

      @vite('resources/js/main.js')

      <style>
        body {
          font-family: 'Poppins', sans-serif;
        }
      </style>

  </head>

  <body data-layout-mode="horizontal" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

      <!-- Begin page -->
      <div id="wrapper">

          <!-- Topbar Start -->
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
                              <img src="/assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle">
                              <span class="pro-user-name ml-1">
                                  {{ auth()->user()->fullname }} <i class="mdi mdi-chevron-down"></i> 
                              </span>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                              <!-- item-->
                              <a href="javascript:void(0);" class="dropdown-item notify-item">
                                  <i class="fe-user"></i>
                                  <span>My Account</span>
                              </a>
  
                              <!-- item-->
                              <a href="javascript:void(0);" class="dropdown-item notify-item">
                                  <i class="fe-settings"></i>
                                  <span>Settings</span>
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
  
                  <!-- LOGO -->
                  <div class="logo-box">
                      <a href="/voter/dashboard" class="logo logo-dark text-center">
                          <span class="logo-sm">
                              <img src="/assets/images/light.png" alt="" height="22">
                          </span>
                          <span class="logo-lg">
                              <img src="/assets/images/dark.png" alt="" height="20">
                          </span>
                      </a>
  
                      <a href="/voter/dashboard" class="logo logo-light text-center">
                          <span class="logo-sm">
                              <img src="/assets/images/light.png" alt="" height="80">
                          </span>
                          <span class="logo-lg">
                              <img src="/assets/images/dark.png" alt="" height="50">
                              <span class="logo-lg-text-light ml-2">EVoting</span>
                          </span>
                      </a>
                  </div>
                  
                  <div class="clearfix"></div>
              </div>
          </div>
          <!-- Topbar End -->

          @yield('content')
            
          <!-- Footer-->
          <footer class="footer footer-alt">
            <p class="text-muted">2023@ EVoting App By <a href="https://daniziadulmarwan.github.io" target="_blank" class="text-success ml-1"><b>Zeiteim Tech</b></a></p>
          </footer>
      </div>
      <!-- END wrapper -->

      <!-- Right bar overlay-->
      <div class="rightbar-overlay"></div>

      <!-- Vendor js -->
      <script src="/assets/js/vendor.min.js"></script>

      <!-- Plugins js-->
      <script src="/assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
      <script src="/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
      <script src="/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>

      <!-- Dashboard 2 init -->
      <script src="/assets/js/pages/dashboard-2.init.js"></script>

      <!-- App js -->
      <script src="/assets/js/app.min.js"></script>
      
  </body>
</html>