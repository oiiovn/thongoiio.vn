<div class="modal modal-blur fade" id="modalEditHistoryJob" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <x-form :action="route('job.update_history_proccess')" type="put" style="position: relative;" :validate="true">
                <x-input type="hidden" name="id" :value="$job->id" />
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">{{ __('Sửa thông tin đơn đặc') }}</h5>
                </div>
                <div class="modal-body">
                        <x-input type="hidden" name="id" :value="$job->id" />
                        <div class="mb-3">
                            <label class="control-label">{{ __('Tiền cọc') }}:</label>
                            <x-input-number name="money_product_addition" :value="$job->money_product_addition" :required="true" />
                        </div>
                        <div class="mb-3">
                            <label class="control-label">{{ __('Mô tả') }}: 
                                <small class="text-danger">{{ __('(Vui lòng điền thêm mã đơn hàng vào đây)') }}</small>
                            </label>
                            <textarea class="form-control" name="desc" required>{{ $job->desc }}</textarea>
                        </div>
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary me-auto"
                        data-bs-dismiss="modal">{{ __('Đóng') }}</button>
                    <x-button type="submit" class="btn btn-orange">
                        {{ __('Xác nhận') }}
                    </x-button>
                </div>
            </x-form>
        </div>
    </div>
</div>
<button type="button" class="d-none" data-bs-toggle="modal"
    data-bs-target="#modalEditHistoryJob">{{ __('OpenModel') }}</button>
