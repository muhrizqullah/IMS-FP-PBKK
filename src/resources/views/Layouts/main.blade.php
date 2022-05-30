<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/logo/logo.png" rel="icon">
    <title>IMS | Dashboard</title>
    <link href="{{ URL::asset('dist/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('dist/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('dist/css/ruang-admin.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">

        <!-- Sidebar -->
        @include('Layouts.sidebar')
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                @include('Layouts.topbar')
                <!-- Topbar -->

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    @yield('container')
                </div>
                <!---Container Fluid-->
            </div>
        </div>

        <!-- Scroll to top -->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <script src="{{ URL::asset('dist/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('dist/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ URL::asset('dist/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <script src="{{ URL::asset('dist/js/ruang-admin.min.js') }}"></script>
        <script src="{{ URL::asset('dist/vendor/chart.js/Chart.min.js') }}"></script>
        <script src="{{ URL::asset('dist/js/demo/chart-area-demo.js') }}"></script>
</body>

</html>
