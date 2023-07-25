<div class="modal modal-blur fade" id="modalCloneJob" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">{{ __('Bạn có chắc?') }}</h5>
            </div>
            <div class="modal-body">
                <div class="text-muted">{{ __('Nếu bạn tiếp tục, bạn sẽ sao chép công việc.') }}</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary me-auto"
                    data-bs-dismiss="modal">{{ __('Hủy') }}</button>
                <x-form id="modalFormCloneJob" action="{{ route('admin.job.clone') }}" type="post" style="position: relative;">
                    <x-input type="hidden" name="id" :value="$job->id" />
                    <x-button.submit :title="__('Sao chép')" />
                </x-form>
            </div>
        </div>
    </div>
</div>
<button type="button" class="d-none" data-bs-toggle="modal" data-bs-target="#modalCloneJob">{{ __('OpenModel') }}</button>