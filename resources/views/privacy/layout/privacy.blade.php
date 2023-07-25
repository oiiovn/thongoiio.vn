<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Web đặt đơn</title>
    <!-- start css -->
    <link rel="stylesheet" href="{{ asset('viewsCustom/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('viewsCustom/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('viewsCustom/assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('viewsCustom/assets/images/favicon.ico') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap">
    <!-- end css -->
</head>

<body style="background: #FFFDF6">
<!-- Start Header -->
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row"
     style="width: 100%;
            flex-shrink: 0;
            background: linear-gradient(141deg, rgba(255, 255, 240, 0.04) 0%, rgba(255, 255, 240, 0.02) 100%) !important;
            backdrop-filter: blur(20px);
            " >
    @include('layout.include.headerPrivacyTutorial')
</nav>
<!-- End Header -->

<!-- Start Main Content -->
<div class="container-fluid page-body-wrapper"
     style="height: 100vh;">
    @yield('content')
</div>
<!-- End Main Content -->

<!-- Start JS -->
<script src="{{ asset('viewsCustom/assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('viewsCustom/assets/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('viewsCustom/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
<script src="{{ asset('viewsCustom/assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('viewsCustom/assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('viewsCustom/assets/js/misc.js') }}"></script>
<script src="{{ asset('viewsCustom/assets/js/dashboard.js') }}"></script>
<script src="{{ asset('viewsCustom/assets/js/todolist.js') }}"></script>
<!-- End JS -->
</body>
</html>
