<!DOCTYPE html>
<html lang="en">
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
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">
    <style>
    /* Đã sửa */
    @media (max-width: 991px){
        #sidebar-left-child{
            position: relative !important;
            width: 100% !important;
            margin-bottom: 10px !important;
            height: auto !important;
        }
        #sidebar-right-child{
            position:fixed !important ; 
            width: 50%;
            overflow-y: scroll !important;
        }
        .navbar .navbar-menu-wrapper {
            width: auto;
            padding-left: 15px;
            padding-right: 15px;
            display:flex;
        }
        .navbar-brand-wrapper{
            margin-left: 10px;
        }
        .offcanvas-body{
            margin-left:0 !important;
            padding-left: 0 !important;
        }
        .card-list{
            grid-template-columns: 50% 50% !important;
            padding: 0 !important;
        }
        .card-list span{
            font-size: 20px;
        }
    }
    @media (max-width:600px) {
    }
    #sidebar-left-child::-webkit-scrollbar-thumb{
        height:0.5%;
    }
    </style>
<head>
    <x-layout.head />
</head>

<body>
    <header>
        <x-layout.header />
    </header>
    <main>
        <div class="container pt-3">
            <div class="row">
                <div class="col-12 col-md-3 sidebar-left-right d-mobi-none" id="sidebar-left" style="background-color:#FFF ;width: 245px;padding-top:65px;margin-right: 20px;padding-left:0;padding-right:0;border-radius:10px;">
                    <div style="position:fixed;width:243px;border-radius: 10px;overflow-y: scroll;height: 95%;margin-top:3px;" @class([
                            'd-none' => Route::is('login.index', 'register.index')
                        ]) id="sidebar-left-child">
                        <x-sidebar_home_left />
                    </div>
                </div>
                <div class="col-12 col-md-9 main-sec-content" style="margin-top:70px;" id="content">


                    <div class="row">
                        <div class="col-12 col-md-9 main-content" style="padding-left:0;padding-right:0;">
                            @yield('content')
                        </div>
                        <div class="col-12 col-md-3 sidebar-left-right d-mobi-none" id="sidebarRight">
                            <div style="border-radius: 10px;width:334px;" @class([
                                    'd-none' => Route::is('login.index', 'register.index'),
                                    'sidebar-right-child' => !Route::is('homepage')
                                ])>
                                <x-sidebar_home_right />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer fixed-bottom">
            @include('components.layout.footer')
        </footer>
    <x-layout.script />
    <x-alert />
</body>

</html>
   <!-- @yield('top-section') -->
