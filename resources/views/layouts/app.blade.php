<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8" />
      <title>E-Voting | {{ $title }}</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
      <meta content="Coderthemes" name="author" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <!-- Fonts Poppins -->
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

      <!-- App favicon -->
      <link rel="shortcut icon" href="/assets/images/favicon.png">

      <!-- Plugins css -->
      <link href="/assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
      <link href="/assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
      
      <!-- App css -->
      <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
      <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

      <link href="/assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
      <link href="/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

      <!-- icons -->
      <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

      <link rel="stylesheet" href="/assets/custom/inputfile.css">

      <style>
        body {
          font-family: 'Poppins', sans-serif;
        }
      </style>

      <!-- Livewire Styles -->
      @livewireStyles

      <!-- Addon CSS -->
      @stack('style')

  </head>

  <body data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": false}'>

      <!-- Begin page -->
      <div id="wrapper">

        <!-- Topbar Start -->
        @include('includes.topbar')
        <!-- Topbar End -->
          

          <!-- Left Sidebar Start -->
          @include('includes.sidebar')
          <!-- Left Sidebar End -->

          <!-- ============================================================== -->
          <!-- Start Page Content here -->
          <!-- ============================================================== -->

            <div class="content-page">

                @yield('content')

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> &copy; E-Voting App by <a href="https://daniziadulmarwan.github.io" target="_blank" class="text-success">Zeiteim Tech</a> 
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- Footer End -->

            </div>
          <!-- ============================================================== -->
          <!-- End Page content -->
          <!-- ============================================================== -->


      </div>
      <!-- END wrapper -->

      <!-- Vendor js -->
      <script src="/assets/js/vendor.min.js"></script>

      <!-- Plugins js-->
      <script src="/assets/libs/flatpickr/flatpickr.min.js"></script>
      <script src="/assets/libs/apexcharts/apexcharts.min.js"></script>

      <script src="/assets/libs/selectize/js/standalone/selectize.min.js"></script>

      <!-- Dashboar 1 init js-->
      {{-- <script src="/assets/js/pages/dashboard-1.init.js"></script> --}}

      <!-- App js-->
      <script src="/assets/js/app.min.js"></script>

      <!-- Livewire Scripts -->
      @livewireScripts

      <!-- Addon JS -->
      @stack('script')

      <script>
        $('#chooseFile').bind('change', function () {
          var filename = $("#chooseFile").val();
          if (/^\s*$/.test(filename)) {
            $(".file-upload").removeClass('active');
            $("#noFile").text("No file chosen..."); 
          }
          else {
            $(".file-upload").addClass('active');
            $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
          }
        });
      </script>
  </body>
</html>