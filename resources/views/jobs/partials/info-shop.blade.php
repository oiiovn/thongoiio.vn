<x-card>
    <div class="card-header bg-orange">
        <h5 class="text-center mb-0 text-white">{{ __('Thông tin shop') }}</h5>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between flex-column flex-md-row">
            <div class="">
                <span class="text-orange fw-bold">{{ __('Tên shop: ') }}</span>
                <x-link class="text-orange" :href="route('info.shop_detail', $shop->slug)" :title="$shop->getNameShop()" />
            </div>
            @if($shop->contact->zalo)
            <div class="d-flex align-items-center gap-2">
                <img src="{{ asset('assets/image/zalo.png') }}" style="width: 16px;" />
                <x-link class="text-orange" target="_blank" :href="'http://zalo.me/'.$shop->contact->zalo" :title="$shop->contact->zalo" />
            </div>
            @endif
            <div class="text-orange">
                <i class="fa-duotone fa-phone"></i>
                <x-link class="text-orange" target="_blank" :href="'http://zalo.me/' . $shop->phone" :title="$shop->phone" />
            </div>
        </div>
    </div>
</x-card>