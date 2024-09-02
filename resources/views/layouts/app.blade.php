<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <title>Desa Wisata</title>


    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="image/png">

<!-- ::::::::::::::All CSS Files here :::::::::::::: -->

<!-- Vendor CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/plaza-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">

<!-- Plugin CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugin/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugin/material-scrolltop.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugin/price_range_style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugin/in-number.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugin/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugin/jquery.lineProgressbar.css') }}">

<!-- Main Style CSS File -->
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>
<body>
    <div>
        @yield('content')
    </div>

    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/modernizr-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    
    <!-- Plugins JS Files -->
    <script src="{{ asset('assets/js/plugin/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/material-scrolltop.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/price_range_script.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/in-number.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jquery.elevateZoom-3.0.8.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/venobox.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jquery.lineProgressbar.js') }}"></script>
    
    <!-- Main js file that contains all jQuery plugins activation. -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    
</body>
</html>