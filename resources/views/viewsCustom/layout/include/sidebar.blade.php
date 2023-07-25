<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a style="border-bottom: 1px solid #CBCBC6;" class="nav-link" href="index.html">
                @if (auth()->guard('web')->check())
                    <span class="menu-title-wallet" href="{{route('wallet.show')}}">Ví tiền: </span><span style="padding-left:10px;"class="menu-title-wallet"> {{format_price(auth()->user()->wallet()->value('amount'))}} </span>
                    <img style="border-radius: 34px;background: #E0793F;height:20px;margin-left: auto;" src="{{ asset('icon/plus-circle.svg') }}" alt="">
                @endif
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <img src="{{ asset('icon/dichvu.svg') }}" alt="">
                <span class="menu-title"> Dịch vụ</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">Lên Shopee Mall</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Lên Lazada Mall</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Mở thông tin khách hàng Shopee</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Setup gian hàng chuẩn SEO</a></li>

                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic1">
                <img src="{{ asset('icon/quanlyshop.svg') }}" alt="">
                <span class="menu-title"> Quản lý shop</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic1">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">Thông tin shop</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Tạo đơn</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Chờ xác nhận</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Đã nhận</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Đang đặt</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Đã đặt</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Chờ đánh giá</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Hoàn thành</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Đơn huỷ</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic2">
                <img src="{{ asset('icon/quanlydon.svg') }}" alt="">
                <span class="menu-title"> Quản lý đặt đơn</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic2">
                <ul class="nav flex-column sub-menu">
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic3">
                <img src="{{ asset('icon/help.svg') }}" alt="">
                <span class="menu-title"> Trợ giúp</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic3">
                <ul class="nav flex-column sub-menu">
                </ul>
            </div>
        </li>

    </ul>
</nav>


