<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Login Administrator - Studi Lanjut IMBOS Pringsewu</title>
    <meta name="description" content="Splasher is a Dashboard & Admin Site Responsive Template by hencework." />
    <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Splasher Admin, Splasheradmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
    <meta name="author" content="hencework"/>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    
    <!-- vector map CSS -->
    <link href="{{ asset('vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>

    <!-- SweetAlert CSS -->
    <link href="{{ asset('vendors/bower_components/sweetalert/dist/sweetalert.css') }}" rel="stylesheet" type="text/css"/>
    
    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <!--Preloader-->
    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>
    <!--/Preloader-->
    
    <div class="wrapper pa-0">
        <header class="sp-header">
            {{-- <div class="sp-logo-wrap pull-left">
                <a href="{{ url('/') }}">
                    <img class="brand-img mr-10" src="{{ asset('img/logo-imbos.png') }}" alt="brand"/>
                    <span class="brand-text"><img src="{{ asset('img/logo-imbos.png') }}" width="150px" alt="brand"/></span>
                </a>
            </div> --}}
            <div class="clearfix"></div>
        </header>
        
        <!-- Main Content -->
        <div class="page-wrapper pa-0 ma-0 auth-page">
            <div class="container">
                <!-- Row -->
                <div class="table-struct full-width full-height">
                    <div class="table-cell vertical-align-middle auth-form-wrap">
                        <div class="auth-form ml-auto mr-auto no-float card-view pt-30 pb-30">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="mb-30">
                                        <h3 class="text-center txt-dark mb-10">Login Administrator</h3>
                                        <h6 class="text-center nonecase-font txt-grey">Studi Lanjut IMBOS Pringsewu</h6>
                                    </div>	
                                    <div class="form-wrap">
                                        <form action="{{ route('admin.login') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="username">Username</label>
                                                <input type="text" class="form-control" required="" id="username" name="username" placeholder="Masukan Username">
                                            </div>
                                            <div class="form-group">
                                                <label class="pull-left control-label mb-10" for="password">Password</label>
                                                {{-- <a class="capitalize-font txt-danger block mb-10 pull-right font-12" href="{{ url('/forgot-password') }}">forgot password ?</a> --}}
                                                <div class="clearfix"></div>
                                                <input type="password" class="form-control" required="" id="password" name="password" placeholder="Masukan Password">
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="checkbox checkbox-primary pr-10 pull-left">
                                                    <input id="remember" name="remember" type="checkbox">
                                                    <label for="remember"> Keep me logged in</label>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-danger btn-rounded">Masuk</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>	
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Row -->	
            </div>
        </div>
        <!-- /Main Content -->
    </div>
    <!-- /#wrapper -->
    
    <!-- JavaScript -->
    
    <!-- jQuery -->
    <script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>

    <!-- SweetAlert JavaScript -->
    <script src="{{ asset('vendors/bower_components/sweetalert/dist/sweetalert.min.js') }}"></script>
    
    <!-- Slimscroll JavaScript -->
    <script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>
    
    <!-- Init JavaScript -->
    <script src="{{ asset('dist/js/init.js') }}"></script>

    @if ($errors->any())
    <script>
        setTimeout(function() {
            swal({
                title: "Error",
                text: "Username atau password yang Anda masukkan salah.",
                type: "warning",
                confirmButtonText: "OK",
                confirmButtonColor: "#ff9528"
            });
        }, 1000); // 2 detik
    </script>
    @endif

</body>
</html>
