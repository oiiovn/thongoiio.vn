<div class="col-12 col-md-9">
    <div class="card">
        <div class="card-header justify-content-center">
            <h2 class="mb-0">{{ __('Thông tin lệnh rút tiền') }}</h2>
        </div>
        <div class="row card-body">
            <!-- username -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <div class="card">
                        <div class="list-group list-group-flush">
                            <li class="list-group-item list-group-item-action active" aria-current="true">
                                {{ __('Tài khoản') }}: {{ $withdrawn->user->email }}
                            </li>
                            <li class="list-group-item list-group-item-action">{{ __('Mã giao dịch') }}:
                                {{ $withdrawn->code }}</li>
                            <li class="list-group-item list-group-item-action">{{ __('Ngân hàng') }}:
                                {{ $withdrawn->bankAccount->bank_name }}</li>
                            <li class="list-group-item list-group-item-action">{{ __('Tên tài khoản') }}:
                                {{ $withdrawn->bankAccount->account_name }}</li>
                            <li class="list-group-item list-group-item-action">{{ __('Số tài khoản') }}:
                                {{ $withdrawn->bankAccount->account_number }}</li>
                            <li class="list-group-item list-group-item-action">{{ __('Ngày tạo') }}:
                                {{ format_datetime($withdrawn->created_at) }}</li>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="control-label">{{ __('Hóa đơn') }}:</label>
                    <label for="imgInp">
                        <img id="previewImage"
                            src="{{ asset($withdrawn->license ? $withdrawn->license : config('custom.images.bill')) }}"
                            class="w-100" alt="">
                    </label>
                    <input accept="image/*" type='file' name="license" class="d-none" id="imgInp" />
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Số tiền') }}:</label>
                    <x-input :value="$withdrawn->amount" :required="true" name="amount" :placeholder="__('Số tiền')" />
                </div>
                <div class="mb-3">
                    <label class="control-label">{{ __('Phí giao dịch') }}:</label>
                    <x-input :value="$withdrawn->fee" :required="true" name="fee" :placeholder="__('Phí giao dịch')" />
                </div>
                <div class="mb-3">
                    <label class="control-label">{{ __('Ngân hàng') }}:</label>
                    <x-select name="bank_id" :required="true">
                        <x-option value="" :title="__('Chọn Ngân hàng')" />
                        @foreach ($withdrawn->user->bankAccount as $value)
                            <x-option :option="$withdrawn->bank_id" :value="$value->id" :title="__(
                                $value->bank_name . '-' . $value->account_number . '-' . $value->account_name,
                            )" />
                        @endforeach
                    </x-select>
                </div>
                <div class="mb-3">
                    <label class="control-label">{{ __('Trạng thái') }}:</label>
                    <x-select name="status" :required="true">
                        <x-option value="" :title="__('Chọn Trạng thái')" />
                        @foreach ($status as $key => $value)
                            <x-option :option="$withdrawn->status->value" :value="$key" :title="__($value)" />
                        @endforeach
                    </x-select>
                </div>
                <div class="mb-3">
                    <label class="control-label">{{ __('Note') }}:</label>
                    <x-textarea rows="10" name="note" :placeholder="__('Note')">{{ $withdrawn->note }}</x-textarea>
                </div>
            </div>

        </div>
    </div>
</div>
