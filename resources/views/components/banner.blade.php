<x-card>
    <div class="slide-image">
        <img class="rounded-top" src="{{ asset('assets/images/default/banner.jpeg') }}" width="100%" />
    </div>

    <div class="card-body bg-yellow-light" id="test" style="border-bottom: 1px solid #fff;">
        <h3 class="d-flex align-items-center fw-bold">
            <img src="{{ asset('assets/image/logo.png') }}" class="border-logo" width="100" style="
    margin-right: 20px;" />
            <span class="fs-sm-15">Đặt Đơn Shopee - TikTok Shop</span>
        </h3>
        <p class="mb-0 text-center text-md-start">Cộng đồng facebook: 
            <x-link :href="$settings['group_facebook']" class="text-orange">Xem Facebook ngay</x-link>
        </p>
    </div>

    <x-slot name="footer">
        <div class="card-body bg-yellow-light">
            <div class="row d-mobi-none">
                <div class="col-12 col-md-4">
                    <p class="mb-0">
                        Số lượng shop: <span class="text-orange">{{ number_format($count_shop + $settings['statistic_virtual_user_shop']) }} <i class="fa-duotone fa-shop"></i></span>
                    </p>
                </div>
                <div class="col-12 col-md-4 text-center">
                    <p class="mb-0">
                        Số thành viên: <span class="text-orange">{{ number_format($users->sum('total') + $settings['statistic_virtual_user_member']) }} <i class="fa-regular fa-users"></i></span>
                    </p>
                </div>
                <div class="col-12 col-md-4 text-end">
                    <p class="mb-0">
                        Đơn hoàn thành: <span class="text-orange">{{ number_format($count_job + $settings['statistic_virtual_job_complete']) }} <i class="fa-solid fa-clipboard-list"></i></span>
                    </p>
                </div>
            </div>
            <div class="row d-desktop-none">
                <div class="col-4 col-md-4">
                    <p class="mb-0">
                        <span class="text-orange"><i class="fa-duotone fa-shop"></i> {{ number_format($count_shop + $settings['statistic_virtual_user_shop']) }}</span>
                    </p>
                </div>
                <div class="col-4 col-md-4 text-center">
                    <p class="mb-0">
                        <span class="text-orange"><i class="fa-regular fa-users"></i> {{ number_format($users->sum('total') + $settings['statistic_virtual_user_member']) }}</span>
                    </p>
                </div>
                <div class="col-4 col-md-4 text-end">
                    <p class="mb-0">
                        <span class="text-orange"><i class="fa-solid fa-clipboard-list"></i> {{ number_format($count_job + $settings['statistic_virtual_job_complete']) }}</span>
                    </p>
                </div>
            </div>
        </div>
    </x-slot>
</x-card>

<!-- @push('custom-js')
<script>
$(window).on('scroll', function() {
    var header = $('#test');
    var scroll = $(window).scrollTop();

    if (scroll >= 100) {
        header.addClass('stuck-header');
    } else {
        header.removeClass('stuck-header');
    }
});
</script>
@endpush -->