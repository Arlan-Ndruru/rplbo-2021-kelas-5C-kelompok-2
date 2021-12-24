<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{URL::asset('dash/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/ico" href="{{URL::asset('home/assets/img/favicon2.ico')}}">
    <title>
        Dashboard | {{$title}}
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{URL::asset('css/dash/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('css/dash/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files Select -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <!-- CSS Files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link id="pagestyle" href="{{URL::asset('css/dash/material-dashboard.css?v=3.0.0')}}" rel="stylesheet" />
    <style>
      #footer{
        position: relative;
        bottom: 0;
      }
    </style>
</head>

<body class="g-sidenav-show  bg-gray-200">
    
    {{-- Aside --}}
    @include('layouts.dash.aside')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('layouts.dash.navbar')
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            @yield('content-main')
            
            <footer class="footer py-4">
                <footer id="footer" class="col-12">
                  <div class="footer clearfix text-muted text-center divider">
                    <div class="btn btn-outline-primary border-0">
                      <p>2021 &copy; 11950111676</p>
                    </div>
                  </div>
                </footer>
            </footer>
        </div>
    </main>
    
    {{-- Plugins --}}
    @include('layouts.dash.plugins')

    <!--   Core Select JS Files   -->
    
    <!--   Core JS Files   -->
    <script src="{{URL::asset('js/dash/core/popper.min.js')}}"></script>
    <script src="{{URL::asset('js/dash/core/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('js/dash/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{URL::asset('js/dash/plugins/smooth-scrollbar.min.js')}}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{URL::asset('js/dash/material-dashboard.min.js?v=3.0.0')}}"></script>
</body>

</html>