<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Web đặt đơn</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('viewsCustom/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('viewsCustom/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('viewsCustom/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('viewsCustom/assets/images/favicon.ico') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap">
</head>

<body style="background: #FFFDF6">
<!-- Start Header -->
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row"
     style="width: 100%;
            flex-shrink: 0;
            background: linear-gradient(141deg, rgba(255, 255, 240, 0.04) 0%, rgba(255, 255, 240, 0.02) 100%) !important;
            backdrop-filter: blur(20px);" >
    @include('viewsCustom.layout.include.header')
</nav>
<!-- End Header -->

<!-- Start Main Content -->
<div class="container-fluid page-body-wrapper"
     style="height: 100vh;">
    <!-- Start Sidebar -->
    <div class="sidebar" style="overflow-y: auto; position: sticky; top: 0;">
        @include('viewsCustom.layout.include.sidebar')
    </div>
    <!-- End Sidebar -->

    <!-- Start main-panel -->
    <div class="main-panel">
        <!-- Start Content -->
        <div class="content-wrapper" style="overflow-y: auto; overflow-x: hidden; padding: 10px;">
            @yield('content')
        </div>
        <!-- End Content -->

        <!-- Start Footer -->
        <footer class="footer fixed-top" style="border-top: none; width: 100%; background: #F3F3ED">
            @include('viewsCustom.layout.include.footer')
        </footer>
        <!-- End Footer -->
    </div>
    <!-- End main-panel -->

</div>
<!-- End Main Content -->

<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{ asset('viewsCustom/assets/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('viewsCustom/assets/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('viewsCustom/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('viewsCustom/assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('viewsCustom/assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('viewsCustom/assets/js/misc.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{ asset('viewsCustom/assets/js/dashboard.js') }}"></script>
<script src="{{ asset('viewsCustom/assets/js/todolist.js') }}"></script>
<!-- End custom js for this page -->
</body>
</html>
