<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <link rel="stylesheet" href="{{ asset('vendor/owl-carousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendor/owl-carousel/css/owl.theme.default.min.css')}}">
    <link href="{{ asset('vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
</head>

<body>
    <div id="main-wrapper">
        @include('layout.header')
        @include('layout.menus')
        <div class="content-body">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset('vendor/global/global.min.js')}}"></script>
    <!-- <script src="{{ asset('js/quixnav-init.js')}}"></script> -->
    <script src="{{ asset('js/custom.min.js')}}"></script>
    <!-- <script src="{{ asset('vendor/raphael/raphael.min.js')}}"></script> -->
    <!-- <script src="{{ asset('vendor/morris/morris.min.js')}}"></script> -->
    <!-- <script src="{{ asset('vendor/circle-progress/circle-progress.min.js')}}"></script> -->
    <!-- <script src="{{ asset('vendor/chart.js/Chart.bundle.min.js')}}"></script> -->
    <!-- <script src="{{ asset('vendor/gaugeJS/dist/gauge.min.js')}}"></script> -->
    <!-- <script src="{{ asset('vendor/flot/jquery.flot.js')}}"></script>/ -->
    <!-- <script src="{{ asset('vendor/flot/jquery.flot.resize.js')}}"></script> -->
    <!-- <script src="{{ asset('vendor/owl-carousel/js/owl.carousel.min.js')}}"></script> -->
    <!-- <script src="{{ asset('vendor/jqvmap/js/jquery.vmap.min.js')}}"></script> -->
    <!-- <script src="{{ asset('vendor/jqvmap/js/jquery.vmap.usa.js')}}"></script> -->
    <script src="{{ asset('vendor/jquery.counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{ asset('js/dashboard/dashboard-1.js')}}"></script>
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"> 
    </script>
    
</body>

</html>
