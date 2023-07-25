<div class="col-12 col-md-9">
    <div class="card">
        <div class="card-header justify-content-center">
            <h2 class="mb-0">{{ __('Thông tin lệnh nạp tiền') }}</h2>
        </div>
        <div class="row card-body">
            <!-- username -->
            <div class="col-md-6 col-sm-12">

                <div class="mb-3">
                    <label class="control-label">{{ __('Chọn người dùng') }}:</label>
                    <x-select class="select2-bs5-ajax" name="user_id" :required="true">
                    </x-select>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Số tiền') }}:</label>
                    <x-input name="amount" :placeholder="__('Số tiền')" :required="true"
                        onchange="this.value = formatPrice(this.value)" />
                </div>

            </div>

        </div>
    </div>
</div>
