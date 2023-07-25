{{--<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="background: #FFFFF0">--}}
{{--    --}}{{-- Logo --}}
{{--    <a class="navbar-brand brand-logo" href="{{ route('homepage') }}" style="background: #FFFDF6">--}}
{{--        <img src="{{ asset('icon/logoHeader.png') }}" alt="logo"--}}
{{--             style="display: flex; width: 140px; height: 60px; justify-content: center; align-items: center; flex-shrink: 0;"/>--}}
{{--    </a>--}}
{{--    --}}{{-- Logo Mobile --}}
{{--    <a class="navbar-brand brand-logo-mini" href="{{ route('homepage') }}">--}}
{{--        <img src="{{ asset('viewsCustom/assets/images/logo-mini.svg') }}" alt="logo" />--}}
{{--    </a>--}}
{{--</div>--}}
{{--<div class="navbar-menu-wrapper d-flex align-items-center justify-content-center">--}}
{{--    --}}{{-- Tìm kiếm --}}
{{--    <div class="search-field d-none d-md-block"--}}
{{--         style="border: 1px solid gray; width: 475px; height: 50px; flex-shrink: 0; border-radius: 15px;--}}
{{--                background: linear-gradient(227deg, rgba(244, 243, 239, 0.40) 0%, rgba(244, 243, 239, 0.10) 100%); backdrop-filter: blur(20px);">--}}
{{--        <form class="d-flex align-items-center h-100" action="#">--}}
{{--            <div class="input-group">--}}
{{--                <input type="text" class="form-control" placeholder="Tìm kiếm"--}}
{{--                       style="  margin-left: 30px;--}}
{{--                                color: rgba(86, 86, 86, 0.50);--}}
{{--                                font-size: 14px;--}}
{{--                                font-family: 'Lato';--}}
{{--                                font-style: normal;--}}
{{--                                font-weight: 400;--}}
{{--                                line-height: 22.4px;">--}}
{{--                <div class="input-group-prepend bg-transparent">--}}
{{--                    <img src="{{ asset('icon/search.svg') }}" alt="logo"--}}
{{--                         style="margin-top: 15px;--}}
{{--                                margin-bottom: 15px;--}}
{{--                                margin-left: 30px;--}}
{{--                                display: flex;--}}
{{--                                width: 20px;--}}
{{--                                height: 20px;--}}
{{--                                padding: 0.833px;--}}
{{--                                justify-content: center;--}}
{{--                                align-items: center;--}}
{{--                                flex-shrink: 0;">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}

{{--    <ul class="navbar-nav navbar-nav-right">--}}
{{--        --}}{{-- Thông báo --}}
{{--        <li class="nav-item dropdown">--}}
{{--            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">--}}
{{--                <img src="{{ asset('icon/bell.svg') }}" style="display: flex;--}}
{{--                                        width: 24px;--}}
{{--                                        height: 24px;--}}
{{--                                        padding: 1px;--}}
{{--                                        justify-content: center;--}}
{{--                                        align-items: center;--}}
{{--                                        flex-shrink: 0;">--}}
{{--                <span class="count-symbol bg-danger"></span>--}}
{{--            </a>--}}
{{--            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">--}}
{{--                <h6 class="p-3 mb-0">Notifications</h6>--}}
{{--                <div class="dropdown-divider"></div>--}}
{{--                <a class="dropdown-item preview-item">--}}
{{--                    <div class="preview-thumbnail">--}}
{{--                        <div class="preview-icon bg-success">--}}
{{--                            <i class="mdi mdi-calendar"></i>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">--}}
{{--                        <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>--}}
{{--                        <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <div class="dropdown-divider"></div>--}}
{{--                <a class="dropdown-item preview-item">--}}
{{--                    <div class="preview-thumbnail">--}}
{{--                        <div class="preview-icon bg-warning">--}}
{{--                            <i class="mdi mdi-settings"></i>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">--}}
{{--                        <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>--}}
{{--                        <p class="text-gray ellipsis mb-0"> Update dashboard </p>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <div class="dropdown-divider"></div>--}}
{{--                <a class="dropdown-item preview-item">--}}
{{--                    <div class="preview-thumbnail">--}}
{{--                        <div class="preview-icon bg-info">--}}
{{--                            <i class="mdi mdi-link-variant"></i>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">--}}
{{--                        <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>--}}
{{--                        <p class="text-gray ellipsis mb-0"> New admin wow! </p>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <div class="dropdown-divider"></div>--}}
{{--                <h6 class="p-3 mb-0 text-center">See all notifications</h6>--}}
{{--            </div>--}}
{{--        </li>--}}

{{--        --}}{{-- Thông tin người dùng --}}
{{--        <li class="nav-item nav-profile dropdown">--}}
{{--            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                @if (auth()->check())--}}
{{--                    <div class="nav-profile-img">--}}
{{--                        <img src="{{asset(auth()->user()->getAvatar())}}" width="35px" height="35px"--}}
{{--                             style="display: flex;--}}
{{--                                    align-items: flex-end;--}}
{{--                                    gap: 10px;"--}}
{{--                             alt="image">--}}
{{--                        <span class="availability-status online"></span>--}}
{{--                    </div>--}}
{{--                    <div class="nav-profile-text">--}}
{{--                        <p class="mb-1 text-black">{{ auth()->user()->username }}</p>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            </a>--}}
{{--            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">--}}
{{--                <a class="dropdown-item" href="{{ route('user.index') }}">--}}
{{--                    <i class="mdi mdi-cached me-2 text-success"></i> Thông tin tài khoản </a>--}}
{{--                <div class="dropdown-divider"></div>--}}
{{--                <a class="dropdown-item" href="#">--}}
{{--                    <i class="mdi mdi-cached me-2 text-success"></i> Tài khoản ngân hàng </a>--}}
{{--                <div class="dropdown-divider"></div>--}}
{{--                <a class="dropdown-item" href="{{ route('logout') }}">--}}
{{--                    <i class="mdi mdi-logout me-2 text-primary"></i> Đăng xuất </a>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">--}}
{{--        <span class="mdi mdi-menu"></span>--}}
{{--    </button>--}}
{{--</div>--}}
<style>
    .search-field{
        width: 475px;
        height: 50px;
        flex-shrink: 0;
        background: linear-gradient(227deg, rgba(244, 243, 239, 0.40) 0%, rgba(244, 243, 239, 0.10) 100%);
        backdrop-filter: blur(20px);
    }
    .input-group{
        background: #FFFDF6;
        border:1px solid gray;
        border-radius: 15px;
        backdrop-filter: blur(20px);
    }
    .form-control{
        background:transparent;
        outline: none;
        border:none;
        border-right: 1px solid gray;
        margin-left: 30px;
        color: rgba(86, 86, 86, 0.50);
        font-size: 14px;
        font-family: 'Lato';
        font-style: normal;
        font-weight: 400;
        line-height: 22.4px;
        backdrop-filter: blur(20px);
    }
    .input-group-prepend img{
        margin-top: 15px;
        margin-bottom: 15px;
        margin-left: 30px;
        margin-right:20px;
        display: flex;
        width: 20px;
        height: 20px;
        padding: 0.833px;
        justify-content: center;
        align-items: center;
        flex-shrink: 0;
        background: rgba(222, 222, 222, 0.30);
        cursor:pointer;
        backdrop-filter: blur(20px);
    }
    .dropdown-menu:hover{
        background: white;
    }
    .dropdown-item:hover{
        color:orange;
    }
</style>
<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="background: #FFFFF0">
    {{-- Logo --}}
    <a class="navbar-brand brand-logo" href="{{ route('homepage') }}" style="background: #FFFDF6">
        <img src="{{ asset('icon/logoHeader.png') }}" alt="logo"
             style="display: flex; width: 140px; height: 60px; justify-content: center; align-items: center; flex-shrink: 0;"/>
    </a>
    {{-- Logo Mobile --}}
    <a class="navbar-brand brand-logo-mini" href="{{ route('homepage') }}">
        <img src="{{ asset('viewsCustom/assets/images/logo-mini.svg') }}" alt="logo" />
    </a>
</div>
<div class="navbar-menu-wrapper d-flex align-items-center justify-content-center">
    {{-- Tìm kiếm --}}
    <div class="search-field d-none d-md-block">
        <form class="d-flex align-items-center h-100" action="#">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Tìm kiếm">
                <div class="input-group-prepend bg-transparent">
                    <img src="{{ asset('icon/search.svg') }}" alt="logo">
                </div>
            </div>
        </form>
    </div>

    <ul class="navbar-nav navbar-nav-right">
        {{-- Thông báo --}}
        <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                <img src="{{ asset('icon/bell.svg') }}"
                     style="display: flex;
                                        width: 24px;
                                        height: 24px;
                                        padding: 1px;
                                        justify-content: center;
                                        align-items: center;
                                        flex-shrink: 0;">
                <span class="count-symbol bg-danger"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
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
        <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                @if (auth()->check())
                    <div class="nav-profile-img">
                        <img src="{{asset(auth()->user()->getAvatar())}}" width="35px" height="35px"
                             style="display: flex;
                                    align-items: flex-end;
                                    gap: 10px;"
                             alt="image">
                        <span class="availability-status online"></span>
                    </div>
                    <div class="nav-profile-text">
                        <p class="mb-1 text-black">{{ auth()->user()->username }}</p>
                    </div>
                @endif
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a id="item-menu"class="dropdown-item" href="{{ route('user.index') }}"> Thông tin tài khoản </a>
                <div class="dropdown-divider"></div>
                <a id="item-menu" class="dropdown-item" href="#"> Tài khoản ngân hàng </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item" id="item-menu">
                    {{ __('Đăng xuất') }}
                    <img style="margin-left:auto;" src="{{ asset('icon/log-out.svg') }}" alt="">
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
    </button>
</div>
