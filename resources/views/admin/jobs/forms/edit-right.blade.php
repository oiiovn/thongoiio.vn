<div class="col-12 col-md-3">
    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>{{ __('Đăng') }}</span>
            <x-link href="#" data-bs-toggle="modal" data-bs-target="#modalCloneJob" :title="__('Sao chép')" />
        </div>
        <div class="card-body p-2">
            <p>{{__('Trạng thái')}}: <span @class([
                'badge', $job->status->badge()
            ])>{{ $job->status->description() }}</span></p>
            <div class="d-flex justify-content-between">
                <x-button.submit :title="__('Cập nhật')" />
                <x-button.modal-delete data-route="{{ route('admin.job.delete', $job->id) }}" :title="__('Xóa')" />
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Đơn ảo') }}
        </div>
        <div class="card-body p-2">
            <x-input-switch :checked="$job->is_virtual" :disabled="true" name="is_virtual" value="1" :label="__('đơn ảo?')"/>
        </div>
    </div>
    @if($job->canCancel())
        <div class="card mb-3">
            <div class="card-header">
                {{ __('Hủy đơn') }}
            </div>
            <div class="card-body p-2">
                <x-input-switch name="is_cancelled" value="1" :label="__('Hủy đơn?')"/>
            </div>
        </div>
    @endif
</div>