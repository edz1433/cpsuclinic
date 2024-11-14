<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>CPSU | Clinic</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('style/plugins/fontawesome-free-v6/css/all.min.css') }}">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="{{ asset('style/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('style/dist/css/adminlte.css') }}">
        <!-- Logo  -->
        <link rel="shortcut icon" type="" href="{{ asset('style/dist/img/CPSU_L.png') }}">
        
        <style>
            body {
                overflow: hidden;
                background-color: #e9ecef !important;
            }

            .loginpage-left {
                background-color: #358359!important;
                height: 100vh !important;
            }

            .loginpage-right {
                background-color: #e9ecef!important;
                height: 100%;
            }

            .login-page, .register-page {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                height: 100vh;
                background-color: #e9ecef;
            }
            @media only screen and (max-width: 992px) {
                .loginpage-left {
                    display: none;
                }
            }
            @media only screen and (max-width: 992px) {
                .loginpage-right {
                    width: 100%;
                    height: 100%;
                }
            }
            .form-control.form-control-solid {
                background-color: #f5f8fa !important;
                border-color: #f5f8fa !important;
                color: #5e6278 !important;
                transition: color .2s ease, background-color .2s ease !important;
            }
            .input-group-text {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-align: center;
                align-items: center;
                padding: .375rem .75rem;
                margin-bottom: 0;
                font-size: 1rem;
                font-weight: 400;
                line-height: 1.5;
                color: #495057;
                text-align: center;
                white-space: nowrap;
                background-color: #f5f8fa !important;
                border: 1px solid #f5f8fa !important;
                border-radius: .25rem;
            }
            .btn-login {
                background-color: #358359 !important;
                border-color: #358359 !important;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.3) !important;
            }
            .input-group {
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.3) !important;
                border-radius: 5px;
            }
        </style>
    </head>
    <body class="hold-transition">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-4 loginpage-left"></div>
                <div class="col-md-8 col-sm-12 loginpage-right">
                    <div class="login-page">
                        <div class="login-logo">
                            <a href="./">
                                <img src="{{ asset('style/dist/img/MDHULogoblack.png') }}" class="img-responsive" width="30%">
                            </a>
                        </div>
                        <div class="">
                            <div class="">
                                <p class="login-box-msg">Sign in to start your session</p>
                                <form action="{{ route('postLogin') }}" method="post" id="signInAuth">
                                    @csrf

                                    @if(session('error'))
                                        <div class="alert alert-danger" style="font-size: 12pt;">
                                            <i class="fas fa-exclamation-triangle "></i> {{session('error')}}
                                        </div>
                                    @endif

                                    @if(session('success'))
                                        <div class="alert alert-success" style="font-size: 10pt;">
                                        <i class="fas fa-check"></i> {{session('success')}}
                                        </div>
                                    @endif

                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control form-control-solid" name="username" placeholder="Username" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control form-control-solid" name="password" placeholder="Password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="icheck-primary">
                                                <input type="checkbox" id="remember">
                                                <label for="remember">
                                                    Remember Me
                                                </label>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-4">
                                            <button type="submit" class="btn btn-primary btn-block btn-login">Sign In</button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>
                            </div>
                            <!-- /.login-card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.login-box -->
        <!-- jQuery -->
        <script src="{{ asset('style/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('style/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('style/dist/js/adminlte.min.js') }}"></script>
        <!-- jquery-validation -->
        <script src="{{ asset('style/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('style/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    </body>
</html>