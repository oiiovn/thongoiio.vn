<div class="modal modal-blur fade" id="modalCancelJob" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <x-form id="modalFormCancelJob" action="{{ route('job.cancel') }}" type="put" style="position: relative;">
                <x-input type="hidden" name="id" value="" />
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">{{ __('Bạn có chắc?') }}</h5>
                </div>
                <div class="modal-body">
                    <div class="">
                        <label class="control-label">{{ __('Mô tả') }}:</label>
                        <textarea class="form-control" name="desc"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary me-auto"
                        data-bs-dismiss="modal">{{ __('Đóng') }}</button>
                    <button type="submit" class="btn btn-danger">{{ __('Hủy ngay') }}</button>
                </div>
            </x-form>
        </div>
    </div>
</div>
<button type="button" class="d-none" data-bs-toggle="modal"
    data-bs-target="#modalCancelJob">{{ __('OpenModel') }}</button>
