<style>
    *{
        list-style: none;
    }
    ol, ul {
     padding-left: 0 !important; 
    }
    .nav .nav-item .nav-link {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    white-space: nowrap;
    padding: 1.125rem 0 1.125rem 0;
    color: #3e4b5b;
    -webkit-transition-duration: 0.45s;
    transition-duration: 0.45s;
    transition-property: color;
    -webkit-transition-property: color;
    }
    .card-body{
        background: #FFF;
    }
    .nav a:hover{
        color:#E0793F !important;
    }
</style>
 <!-- <x-card>
    <x-slot name="header">
        <span class="text-white"><i class="fa-solid fa-magnifying-glass"></i> Tìm kiêm</span>
    </x-slot>
    <x-slot name="footer">
        <a href="{{ route('info.search_shop') }}">
            <div class="card-option border-dotted">
                Tìm kiếm cửa hàng <i class="fa-solid fa-right float-end"></i>
            </div>
        </a>
        <a href="{{ route('info.search_user') }}">
            <div class="card-option">
                Tìm kiếm cộng tác viên <i class="fa-solid fa-right float-end"></i>
            </div>
        </a>
    </x-slot>
</x-card> -->
<x-card>
    <x-slot name="header">
        <div class="nav" style="border-bottom: 1px solid #3333;">
            <ul class="nav-r" style="width:100%">
                <li class="nav-item" style="margin-left: 5px;margin-bottom: 10px;">
                    <span style="color: #000;font-size: 18px;font-style: normal;font-weight: 700;line-height: normal;">Cộng đồng đặt đơn</span>
                </li>
                <li class="nav-item">
                    <div class="nav-link">
                        <span style="font-size: 14px;"  class="menu-title">Số lượng shop: </span><span style="margin-left: 141px;font-size: 14px;color:#d0011b;padding-right:5px;" class="menu-title-wallet"> 36 </span>
                        <img style="margin-left:auto;color:#303030;display: flex;width: 22px;height: 22px;margin-right: 5px;justify-content: center;align-items: center;"
                        src="{{ asset('viewsCustom/assets/images/ic2.svg') }}" alt="">
                    </div>
                </li>   
                <li class="nav-item">
                    <div class="nav-link">
                        <span style="font-size: 14px;"  class="menu-title">Số thành viên: </span><span style="margin-left: 107px;font-size: 14px;color:#d0011b;padding-right:5px;" class="menu-title-wallet"> 166.000 </span>
                        <img style="margin-left:auto;color:#303030;display: flex;width: 22px;height: 22px;margin-right: 5px;justify-content: center;align-items: center;"
                        src="{{ asset('viewsCustom/assets/images/ic6.svg') }}" alt="">
                    </div>
                </li> 
                <li class="nav-item">
                    <div class="nav-link">
                        <span style="font-size: 14px;"  class="menu-title">Đơn hoàn thành: </span><span style="margin-left: 130px;font-size: 14px;color:#d0011b;padding-right:5px;" class="menu-title-wallet"> 51 </span>
                        <img style="margin-left:auto;color:#303030;display: flex;width: 22px;height: 22px;margin-right: 5px 2.75px 0.917px 1.833px;justify-content: center;align-items: center;"
                        src="{{ asset('viewsCustom/assets/images/ic3.svg') }}" alt="">
                    </div>
                </li>
            </ul>
        </div>
    </x-slot>

    <x-card>
        <x-slot name="header">
            <div class="nav">
                <ul class="nav-r">
                    <li class="nav-item">       
                        <span style="color: #000;font-size: 18px;font-style: normal;font-weight: 700;line-height: normal;">{{ ('Shop có nhiều đơn hàng') }}</span>
                    </li>
                </ul>
            </div>
        </x-slot>
            <div class="nav text-center"  style="width:100%;height: 200px;flex-direction: column;justify-content: flex-start;align-items: center;gap: 10px;display: inline-flex;">
                @foreach($users as $user)
                <a href="{{ route('info.shop_detail', $user->slug) }}">
                <img style="width: 45px; height: 45px; border-radius: 9999px; border: 0.50px black solid" src="#" alt=""/>
                    <div @class([
                        ""=> !$loop->last
                    ])>
                        <p>
                             {{ $user->getNameShop() }}
                            @if($user->isReputable())
                                <i class="fa-regular fa-circle-check text-primary"></i>
                            @endif
                        </p>
                    </div>
                </a>
                @endforeach
            </div>
    </x-card>
    <!-- @if (auth()->check())
    <x-card>
        <x-slot name="header">
            <span class="text-white fs-14"> {{ __('Đã nhận gần đây') }}</span>
        </x-slot>
        <div class="card-body">
            @foreach ($jobs as $job)
                <x-link :href="route('job.show', $job->slug)">
                    <div class="order-list mb-2">
                        <p class="m-0 fw-bold">{{ __('Đơn gần đây') }}</p>
                        <p class="m-0 text-orange"> {{ __('Xem chi tiết') }} <i class="fa-solid fa-right float-end"></i></p>
                    </div>
                </x-link>
            @endforeach
        </div>
    </x-card>
    @endif -->
</x-card>

