<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="{{URL::asset('home/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/ico" href="{{URL::asset('home/assets/img/favicon2.ico')}}">

    <title>
        @if (Request::is('/'))
            Homepage
        @elseif(Request::is('login'))
            Login Page
        @elseif(Request::is('about'))
            About Page
        @else
            Register Page
        @endif
        | Sistem Pelayanan Surat Menyurat
    </title>
    
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <!-- Nucleo Icons -->
    <link href="{{URL::asset('css/home/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('css/home/nucleo-svg.css')}}" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- CSS Files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link id="pagestyle" href="{{URL::asset('css/home/material-kit.css?v=3.0.0')}}" rel="stylesheet" />
</head>
<body class="index-page bg-gray-200">
    <!-- Navbar -->
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Start Navbar -->
                @include('layouts.home.navbar')
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    @yield('content-main')
            
        <!-- -------   START PRE-FOOTER 2 - simple social line w/ title & 3 buttons    -------- -->
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 ms-auto">
                        <h4 class="mb-1">Thank you for your support!</h4>
                        <p class="lead mb-0">We deliver the best web products</p>
                    </div>
                    <div class="col-lg-5 me-lg-auto my-lg-auto text-lg-end mt-5">
                        <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Kit%20made%20by%20%40CreativeTim%20%23webdesign%20%23designsystem%20%23bootstrap5&url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fmaterial-kit"
                            class="btn btn-twitter mb-0 me-2" target="_blank">
                            <i class="fab fa-twitter me-1"></i> Tweet
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-kit"
                            class="btn btn-facebook mb-0 me-2" target="_blank">
                            <i class="fab fa-facebook-square me-1"></i> Share
                        </a>
                        <a href="https://www.pinterest.com/pin/create/button/?url=https://www.creative-tim.com/product/material-kit"
                            class="btn btn-pinterest mb-0 me-2" target="_blank">
                            <i class="fab fa-pinterest me-1"></i> Pin it
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- -------   END PRE-FOOTER 2 - simple social line w/ title & 3 buttons    -------- -->

    </div>

    @include('layouts.home.footer')

    <!--   Core JS Files   -->
    <script src="{{URL::asset('js/home/core/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js/home/core/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js/home/plugins/perfect-scrollbar.min.js')}}"></script>

    <!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
    <script src="{{URL::asset('js/home/plugins/countup.min.js')}}"></script>

    <script src="{{URL::asset('js/home/plugins/choices.min.js')}}"></script>

    <script src="{{URL::asset('js/home/plugins/prism.min.js')}}"></script>
    <script src="{{URL::asset('js/home/plugins/highlight.min.js')}}"></script>

    <!--  Plugin for Parallax, full documentation here: https://github.com/dixonandmoe/rellax -->
    <script src="{{URL::asset('js/home/plugins/rellax.min.js')}}"></script>
    <!--  Plugin for TiltJS, full documentation here: https://gijsroge.github.io/tilt.js/ -->
    <script src="{{URL::asset('js/home/plugins/tilt.min.js')}}"></script>
    <!--  Plugin for Selectpicker - ChoicesJS, full documentation here: https://github.com/jshjohnson/Choices -->
    <script src="{{URL::asset('js/home/plugins/choices.min.js')}}"></script>

    <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
    <script src="{{URL::asset('js/home/plugins/parallax.min.js')}}"></script>

    <script src="{{URL::asset('js/home/material-kit.min.js?v=3.0.0')}}" type="text/javascript"></script>
</body>
</html>