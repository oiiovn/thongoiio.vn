<div class="modal modal-blur fade" id="modalReceiveJob" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">{{ __('Bạn có chắc?') }}</h5>
            </div>
            <div class="modal-body">
                <div class="text-muted">{{ __('Nếu bạn tiếp tục, bạn sẽ nhận đơn và tuân thủ theo chính sách của chúng tôi.') }}</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary me-auto"
                    data-bs-dismiss="modal">{{ __('Đóng') }}</button>
                <x-form id="modalFormReceiveJob" action="{{ route('job.received.store') }}" type="post" style="position: relative;">
                    <x-input type="hidden" name="code" value="" />
                    <button type="submit" class="btn btn-orange">{{ __('Nhận ngay') }}</button>
                </x-form>
            </div>
        </div>
    </div>
</div>
<button type="button" class="d-none" data-bs-toggle="modal" data-bs-target="#modalReceiveJob">{{ __('OpenModel') }}</button>