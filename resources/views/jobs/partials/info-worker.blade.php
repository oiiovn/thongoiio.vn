<x-card>
    <div class="card-header bg-orange">
        <h5 class="text-center mb-0 text-white">{{ __('Thông tin người nhận đơn') }}</h5>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between flex-column flex-md-row">
            <div class="">
                <span class="fw-bold">{{ __('Người nhận: ') }}</span>
                <x-link class="text-orange" :href="route('info.user_detail', $worker->slug)" :title="$worker->fullname" />
            </div>
            @if($worker->contact->zalo)
            <div class="">
                <img src="{{ asset('assets/image/zalo.png') }}" style="width: 16px;" />
                <x-link class="text-orange" target="_blank" :href="'http://zalo.me/'.$worker->contact->zalo" :title="$worker->contact->zalo" />
            </div>
            @endif
            <div class="text-orange">
                <i class="fa-duotone fa-phone"></i>
                <x-link class="text-orange" target="_blank" :href="'http://zalo.me/' . $worker->phone" :title="$worker->phone" />
            </div>
        </div>
    </div>
</x-card>