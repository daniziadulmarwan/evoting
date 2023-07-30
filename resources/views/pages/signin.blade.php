<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Evoting | Sign In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/md.png">

    <!-- Fonts Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- App css -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="/assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
    <link href="/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

    <!-- Icons -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="/assets/custom/clock.css">

    <style>
      body {
        font-family: 'Poppins', sans-serif;
      }
      .head-title {
        font-family: 'Pacifico', cursive;
      }
    </style>
  </head>

    <body class="auth-fluid-pages pb-0">

      <div class="auth-fluid">
        <div class="auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="card-body">

                    <!-- Logo -->
                    <div class="auth-brand text-center text-lg-left">
                        <div class="auth-logo">
                            <a href="/" class="logo logo-dark text-center">
                                <span class="logo-lg">
                                    <img src="/assets/images/md.png" alt="" height="150">
                                </span>
                            </a>
        
                            <a href="/" class="logo logo-light text-center">
                                <span class="logo-lg">
                                    <img src="/assets/images/md.png" alt="" height="150">
                                </span>
                            </a>
                        </div>
                    </div>

                    <!-- Error -->
                    <div class="row">
                        <div class="col-md-12">
                        @if (session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <i class="mdi mdi-block-helper mr-2"></i> {{ session('error') }}
                            </div>
                        @endif
                        </div>
                    </div>

                    <!-- Title-->
                    <h4 class="mt-0">Sign In</h4>
                    <p class="text-muted mb-4">Enter your email address and password to access account.</p>

                    <!-- Form Start -->
                    <form action="{{ route('signin') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control @error('username') is-invalid @enderror" type="text" id="username" placeholder="Enter username" name="username">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" name="password">
                                <div class="input-group-append" data-password="false">
                                    <div class="input-group-text">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                      
                        <x-button type="submit" title="Sign In" />
                    </form>
                    <!-- Form End -->

                    <!-- Footer-->
                    <x-signin-footer />

                </div>
            </div>
        </div>

        <div class="auth-fluid-right text-center" style="background: #c9d5e0">

            <div class="text-center d-flex justify-content-center">
                <x-widget.clock />
            </div>

            <div class="auth-user-testimonial text-dark">
                <h2 class="mb-3 text-dark head-title">Al - Qur'an Al - Karim</h2>
                <p class="lead"><i class="mdi mdi-format-quote-open"></i>  Boleh jadi kamu membenci sesuatu, padahal ia amat baik bagimu, dan boleh jadi (pula) kamu menyukai sesuatu, padahal ia amat buruk bagimu. Allah mengetahui, sedang kamu tidak mengetahui. <i class="mdi mdi-format-quote-close"></i>
                </p>
                <h5 class="text-dark">
                    - Q.S. Al - Baqarah 216
                </h5>
            </div>
        </div>
      </div>

      <!-- Vendor js -->
      <script src="/assets/js/vendor.min.js"></script>

      <!-- App js -->
      <script src="/assets/js/app.min.js"></script>

      <script src="/assets/custom/clock.js"></script>
    </body>
</html>