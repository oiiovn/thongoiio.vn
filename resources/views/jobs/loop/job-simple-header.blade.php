@if (isset($show_full) && $show_full)
    <div class="row align-items-center mb-2">
        <div class="col-8 col-md-8">
            <div class="mb-0 float-start">
                <img class="rounded-circle shadow-sm bg-body-tertiary rounded"
                    src="{{ asset($job->shop->getAvatar()) }}" width="40px" />
            </div>
            <div class="float-start ps-2">
                <x-link :href="route('info.shop_detail', $job->shop->slug)" class="d-flex align-items-center gap-1 fs-14 mb-0 fw-bold">
                    <span>{{ $job->shop->getNameShop() }}</span>
                    @if($job->shop->isReputable())
                        <i class="fa-regular fa-circle-check float-end text-primary"></i>
                    @endif
                </x-link>
                <div class="d-flex align-items-center fs-12 fs-sm-10 mb-0 text-muted">
                    @if($job->shop->contact->address)
                        <span class="address-shop" title="{{ $job->shop->contact->address ?? '' }}">{{ $job->shop->contact->address ?? '' }}</span>
                        <span class="mx-1">-</span>
                    @endif
                    <span>
                        {{ __(':diffTime', ['diffTime' => $job->created_at->diffForHumans()]) }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-4 fs-12">
            <p class="count-reviews text-orange">
                @if ($job->shop->reviews_avg_rating)
                    <span class="fw-bold">{{ number_format($job->shop->reviews_avg_rating, 1) }}</span>
                @endif
                <span class="text-warning"><i class="fa-solid fa-star"></i></span>
                <span class="fw-bold">{{ __('/ :count', ['count' => $job->shop->reviews_count]) }}</span>
            </p>
        </div>
    </div>
@else
    <div class="d-flex justify-content-end pb-2">
        <div class="">
            <p class="fs-12 mb-0 text-muted">
                {{ __('Đăng :diffTime', ['diffTime' => $job->created_at->diffForHumans()]) }}</p>
        </div>
    </div>
@endif
