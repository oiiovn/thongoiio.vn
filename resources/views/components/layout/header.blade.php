<style>
    @media (prefers-reduced-motion: reduce) {
        .nav-link {
            transition: none;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 5px;
        }
    }

    @media (min-width: 1400px) {

        .container,
        .container-lg,
        .container-md,
        .container-sm,
        .container-xl,
        .container-xxl {
            max-width: 100%;
        }
    }

    .rounded-circle {
        border-radius: 50% !important;
        border: 2px solid #ed6237;
    }

    /* Dropdowns */
    .dropdown .dropdown-toggle:after {
        border-top: 0;
        border-right: 0;
        border-left: 0;
        border-bottom: 0;
        font: normal normal normal 24px/1 "Material Design Icons";
        content: "\f140";
        width: auto;
        height: auto;
        vertical-align: baseline;
        font-size: .75rem;
    }

    .dropdown .dropdown-menu {
        margin-top: .75rem;
        font-size: 0.875rem;
        -webkit-box-shadow: 0px 1px 15px 1px rgba(230, 234, 236, 0.35);
        box-shadow: 0px 1px 15px 1px rgba(230, 234, 236, 0.35);
    }

    .dropdown .dropdown-menu .dropdown-item {
        font-size: 1rem;
        padding: .25rem 1.5rem;
    }

    .dropdown .dropdown-menu .dropdown-item:active {
        background: initial;
    }

    .dropdown .dropdown-menu .dropdown-item:hover {
        background-color: #f8f9fa;
        color: #ffffff;
    }

    .dropdown-item {
        display: block;
        width: 100%;
        padding: 0.25rem 1rem;
        clear: both;
        font-weight: 400;
        color: #343a40;
        text-align: inherit;
        text-decoration: none;
        white-space: nowrap;
        background-color: transparent;
        border: 0;
    }

    #item-menu:hover,
    #item-menu:focus {
        color: rgba(251, 104, 21, 0.90);
        background-color: #ffffff;

    }

    .dropdown-item.active,
    .dropdown-item:active {
        color: #fff;
        text-decoration: none;
        background-color: #0d6efd;
    }

    .dropdown-item.disabled,
    .dropdown-item:disabled {
        color: #adb5bd;
        pointer-events: none;
        background-color: transparent;
    }

    .dropdown-item .dropdown-menu.show {
        display: block;
    }

    .dropdown-header {
        display: block;
        padding: 0.5rem 1rem;
        margin-bottom: 0;
        font-size: 0.875rem;
        color: #343a40;
        white-space: nowrap;
    }

    .dropdown-item-text {
        display: block;
        padding: 0.25rem 1rem;
        color: #343a40;
    }

    .preview-item-content h6 {
        color: #454545;
        cursor: pointer;
    }

    .dropdown-menu-dark {
        color: #dee2e6;
        background-color: #343a40;
        border-color: rgba(0, 0, 0, 0.15);
    }

    .dropdown-item {
        color: #454545;
    }

    .dropdown-item:hover,
    .dropdown-menu-dark .dropdown-item:focus {
        background-color: rgba(255, 255, 255, 0.15);
    }

    .dropdown-item.active,
    .dropdown-menu-dark .dropdown-item:active {
        background-color: #0d6efd;
    }

    .dropdown-item.disabled,
    .dropdown-menu-dark .dropdown-item:disabled {
        color: #adb5bd;
    }

    .dropdown-divider {
        border-color: rgba(0, 0, 0, 0.15);
    }

    .dropdown-item-text {
        color: #454545;
    }

    .dropdown-header {
        color: #adb5bd;
    }

    .nav-item.nav-settings {
        padding-left: 20px;
        padding-right: 5px;
    }

    .nav-item.nav-settings .nav-link {
        margin-right: 0;
        margin-left: 0;
    }

    .nav-item.nav-profile .nav-link .nav-profile-img {
        position: relative;
        width: 32px;
        height: 32px;
    }

    .nav-item.nav-profile .nav-link .nav-profile-img img {
        width: 32px;
        height: 32px;
        border-radius: 100%;
    }

    .nav-item.nav-profile .nav-link .nav-profile-img .availability-status {
        position: absolute;
        width: 10px;
        height: 10px;
        border-radius: 100%;
        border: 2px solid #ffffff;
        bottom: 5px;
        right: -5px;
    }

    .nav-item.nav-profile .nav-link .nav-profile-img .availability-status.online {
        background: #1bcfb4;
    }

    .nav-item.nav-profile .nav-link .nav-profile-img .availability-status.offline {
        background: #fe7c96;
    }

    .nav-item.nav-profile .nav-link .nav-profile-img .availability-status.busy {
        background: #fed713;
    }

    .nav-item.nav-profile .nav-link .nav-profile-text {
        margin-left: 1.25rem;
    }

    .nav-item.nav-profile .nav-link .nav-profile-text {
        margin-left: 0;
    }

    .nav-item.nav-profile .nav-link .nav-profile-text p {
        line-height: 1;
    }

    @media (max-width: 767px) {
        .nav-item.nav-profile .nav-link .nav-profile-text {
            display: none;
        }
    }

    .nav-item.nav-profile .nav-link.dropdown-toggle:after {
        line-height: 2;
    }

    .dropdown-menu {
        position: absolute;
        display: none;
        min-width: 10rem;
        padding: 0.5rem 0;
        margin: 0;
        font-size: 1rem;
        color: #212529;
        text-align: left;
        list-style: none;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ebedf2;
        border-radius: 0.25rem;
    }

    .dropdown-menu[data-bs-popper] {
        top: 100%;
        left: 0;
        margin-top: 0.125rem;
    }

    .dropdown-menu-start {
        --bs-position: start;
    }

    .dropdown-menu-start[data-bs-popper] {
        right: auto;
        left: 0;
    }

    .dropdown-menu-end {
        --bs-position: end;
    }

    .dropdown-menu-end[data-bs-popper] {
        right: 0;
        left: auto;
    }

    @media (min-width: 576px) {
        .dropdown-menu-sm-start {
            --bs-position: start;
        }

        .dropdown-menu-sm-start[data-bs-popper] {
            right: auto;
            left: 0;
        }

        .dropdown-menu-sm-end {
            --bs-position: end;
        }

        .dropdown-menu-sm-end[data-bs-popper] {
            right: 0;
            left: auto;
        }
    }

    @media (min-width: 768px) {
        .dropdown-menu-md-start {
            --bs-position: start;
        }

        .dropdown-menu-md-start[data-bs-popper] {
            right: auto;
            left: 0;
        }

        .dropdown-menu-md-end {
            --bs-position: end;
        }

        .dropdown-menu-md-end[data-bs-popper] {
            right: 0;
            left: auto;
        }
    }

    @media (min-width: 992px) {
        .dropdown-menu-lg-start {
            --bs-position: start;
        }

        .dropdown-menu-lg-start[data-bs-popper] {
            right: auto;
            left: 0;
        }

        .dropdown-menu-lg-end {
            --bs-position: end;
        }

        .dropdown-menu-lg-end[data-bs-popper] {
            right: 0;
            left: auto;
        }
    }

    @media (min-width: 1200px) {
        .dropdown-menu-xl-start {
            --bs-position: start;
        }

        .dropdown-menu-xl-start[data-bs-popper] {
            right: auto;
            left: 0;
        }

        .dropdown-menu-xl-end {
            --bs-position: end;
        }

        .dropdown-menu-xl-end[data-bs-popper] {
            right: 0;
            left: auto;
        }
    }

    @media (min-width: 1400px) {
        .dropdown-menu-xxl-start {
            --bs-position: start;
        }

        .dropdown-menu-xxl-start[data-bs-popper] {
            right: auto;
            left: 0;
        }

        .dropdown-menu-xxl-end {
            --bs-position: end;
        }

        .dropdown-menu-xxl-end[data-bs-popper] {
            right: 0;
            left: auto;
        }
    }

    .dropup .dropdown-menu[data-bs-popper] {
        top: auto;
        bottom: 100%;
        margin-top: 0;
        margin-bottom: 0.125rem;
    }

    .search-field-s {
        width: 475px;
        height: 50px;
        flex-shrink: 0;
        background: #FFF;
        backdrop-filter: blur(20px);
    }

    .input-group-s {
        width: 100%;
        background-color: rgba(var(--bs-tertiary-bg-rgb), var(--bs-bg-opacity)) !important;
        border: 1px solid #D8D8D8;
        border-radius: 15px;
        backdrop-filter: blur(20px);

    }

    .form-control-s {
        background: transparent;
        position: absolute;
        outline: none;
        width: 75%;
        padding: 0.75rem;
        border: none;
        align-items: center;
        justify-content: center;
        margin-left: 30px;
        display: flex;
        color: #212529;
        font-size: 14px;
        font-family: 'Lato';
        font-style: normal;
        font-weight: 400;
        line-height: 22.4px;
        backdrop-filter: blur(20px);
    }

    .input-group-prepend-s img {
        margin-top: 15px;
        margin-bottom: 15px;
        margin-left: 30px;
        margin-right: 20px;
        display: flex;
        width: 20px;
        height: 20px;
        padding: 0.833px;
        justify-content: center;
        align-items: center;
        flex-shrink: 0;
        background-color: rgba(var(--bs-tertiary-bg-rgb), var(--bs-bg-opacity)) !important;
        backdrop-filter: blur(20px);
        cursor: pointer;
    }
    .input-group-s:hover{
        border:1px solid #E0793F;
    }
    .input-group-s:hover,
    .input img {
        opacity: 0.8;
    }

    .form-control-s:focus {
        border-color: none !important;
        outline: none !important;
    }

    .dropdown-menu:hover {
        background: white;
    }

    .dropdown-item:hover {
        color: orange;
    }

    .navbar .navbar-menu-wrapper {
        padding: 0;
        width: calc(100% - 1px);
    }

    @media (max-width: 480px) {
        .navbar .navbar-brand-wrapper {
            width: auto;
            /* height: 50px; */
        }
    }

    /* Đã sửa */
    .navbar .navbar-menu-wrapper .navbar-nav .nav-item .nav-link {
        color: inherit;
        font-size: 0.875rem;
        margin-left: 1rem;
        margin-right: 1rem;
        height: 70px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }
        /* .grid-news .content-news {
        margin-left: 10px;
        flex-shrink: 0;
    }

    .grid-news .content-news span {
        color: #000;
        font-size: 13px;
        font-style: normal;
        font-weight: 400;
        line-height: 17px;
    }

    .grid-news .content-news .btn-date-news {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .grid-news .content-news .btn-date-news span {
        color: #A6A4A4;
        font-size: 10px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }
    .content-news p:hover{
        color:#E0793F;
    }
    .btn-date-news a {
        text-decoration: none;
        padding-left: 10px;
        padding-bottom: 5px;
        color: #DE8C49;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }
    .content-news .btn-date-news a:hover{
        color:#E0793F;
    } */
    @media (max-width: 991px) {
        .navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown {
            position: static !important;
        }
        #navbarNavDropdown{
            display:flex;
            position:absolute;
            margin-left: 20%;
            padding-right: 0;
            padding-left: 0;
        }
        .navbar-collapse {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin-top: 0;
        }
        .navbar-nav{
            margin-left: 50px;
        }
        .search-field-s{
            display: none !important;
        }
    }
</style>
<nav class="navbar navbar-expand-lg" style="width: 100%; height: 80px; border-bottom: 1px solid rgba(233, 233, 233, 0.95);"> <!-- Đã sửa -->
    <div class="container">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand me-2" href="{{ route('homepage') }}">
                <img src="{{ asset('icon/logoHeader.png') }}" style="width: auto; height: 50px; justify-content: center; align-items: center; flex-shrink: 0;" />
            </a>
        </div>
        <!-- {{--        <div class="d-flex align-items-center gap-2">--}}
{{--            <x-link class="fs-14 d-flex align-items-center gap-1 text-orange p-2" :href="'tel:'.$settings['hotline']">--}}
{{--                <i class="fa-duotone fa-phone"></i>--}}
{{--                <span class="d-none d-md-block">{{ $settings['hotline'] }}</span>--}}
{{--            </x-link>--}}
{{--            <x-link class="d-flex align-items-center gap-1 fs-14 text-orange ms-2 p-2" :href="$settings['admin_facebook_link']" target="_blank">--}}
{{--                <i class="fa-brands fa-facebook"></i>--}}
{{--                <span class="d-none d-md-block">{{ $settings['admin_facebook_name'] }}</span>--}}
{{--            </x-link>--}}
{{--        </div>--}} -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-center" style="list-style:none;">
                @if (auth()->guard('web')->check())
                {{-- Tìm kiếm --}}
                <div class="search-field-s d-none d-md-block">
                    <form class="d-flex align-items-center h-100" action="#">
                        <div class="input-group-s">
                            <input type="text" class="form-control-s" placeholder="Tìm kiếm">
                            <div style="position: relative;border-left: 1px solid #3333;align-items: center;justify-content: center;display: flex;width: 20%;margin-left: auto;" class="input-group-prepend-s bg-transparent">
                                <img src="{{ asset('icon/search.svg') }}" alt="logo">
                            </div>
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav navbar-nav-right" style="margin-right:0;">
                    {{-- Thông báo --}}
                    <li class="nav-item dropdown" style="border: none;">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                            <img src="{{ asset('icon/bell.svg') }}" style="display: flex;
                                                    height: 25px;
                                                    padding: 1px;
                                                    justify-content: center;
                                                    align-items: center;
                                                    flex-shrink: 0;">
                            <span class="count-symbol bg-danger"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown"style="width: fit-content;"><!-- ãã sửa-->
                            <h6 class="p-3 mb-0">Notifications</h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-success">
                                        <i class="mdi mdi-calendar"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                                    <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-warning">
                                        <i class="mdi mdi-settings"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                                    <p class="text-gray ellipsis mb-0"> Update dashboard </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-info">
                                        <i class="mdi mdi-link-variant"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                                    <p class="text-gray ellipsis mb-0"> New admin wow! </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <h6 class="p-3 mb-0 text-center">See all notifications</h6>
                        </div>
                    </li>
                    {{-- Thông tin người dùng --}}
                    @else
                    <li class="nav-item" style="justify-content: end;display:flex;margin-left:90%;">
                        <a class="nav-link active" aria-current="page" href="{{ route('login.index') }}">Đăng nhập</a>
                    </li>
                    <li class="nav-item" style="justify-content: end;display:flex;margin-left:auto;">
                        <a class="nav-link" href="{{ route('register.index') }}">Đăng ký</a>
                    </li>
                    @endif
                    <li class="nav-item nav-profile dropdown" style="border: none;">
                        @if (auth()->check())

                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false"style="width: fit-content;">
                            @if (auth()->check())
                            <div class="nav-profile-img">
                                <img src="{{asset(auth()->user()->getAvatar())}}" width="35px" height="35px" style="display: flex;align-items: flex-end;gap: 10px;" alt="image">
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">{{ auth()->user()->username }}</p>
                            </div>
                            @endif
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <a id="item-menu" class="dropdown-item" href="{{ route('user.index') }}"> Thông tin tài khoản </a>
                            <div class="dropdown-divider"></div>
                            <a id="item-menu" class="dropdown-item" href="{{ route('user.index') }}"> Tài khoản ngân hàng </a>
                            <div class="dropdown-divider"></div>
                            <a id="item-menu" class="dropdown-item" href="{{ route('user.index') }}"> Đổi mật khẩu </a>
                            <div class="dropdown-divider"></div>
                            <x-form class="" :action="route('logout')" type="post">
                                <button id="item-menu" type="submit" class="dropdown-item border-0" style="background: transparent !important">{{ __('Đăng xuất') }}
                                    <img style="margin-left:auto;" src="{{ asset('viewsCustom/assets/images/ic4.svg') }}" alt="">
                                </button>
                            </x-form>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>

        </div>

        <!-- Side bar on mobile devices -->
        @include('components.layout.nav-mobile')
        <!-- End Side bar on mobile devices -->

    </div>
</nav>