@if(isset($only_show))
    @if($only_show)
        @if (auth()->check() && ($job->isAuthShop() || $job->isAuthWorker()))
            <div class="text-center">
                <x-link :href="route('job.show', $job->slug)" class="btn btn-orange">{{ __('Xem') }}</x-link>
            </div>
        @endif
    @else
        <div class="text-center">
            <button type="button" @disabled($job->disableButtonReceive()) class="btn btn-orange user-receive-job" 
                data-code="{{ $job->code }}" 
                data-bs-toggle="modal" 
                data-bs-target="#modalReceiveJob">
                {{ __(':text', ['text' => $job->notClickBtnReceive() ? 'Đã nhận' : 'Nhận đơn']) }}
            </button>
        </div>
    @endif
@endif
