<div class="col-12 col-md-6">
    <div class="card">
        <div class="card-header justify-content-center">
            <h2 class="mb-0">{{ __('Thông tin lệnh rút tiền') }}</h2>
        </div>
        <div class="row card-body">
            <!-- username -->
            <div class="col-md-12 col-sm-12">
                <div class="mb-3">
                    <div class="card">
                        <div class="list-group list-group-flush">
                            <li class="list-group-item list-group-item-action active" aria-current="true">
                                {{ __('Tài khoản') }}: {{ $deposit->user->email }}
                            </li>
                            <li class="list-group-item list-group-item-action">{{ __('Mã giao dịch') }}:
                                {{ $deposit->code }}</li>
                            <li class="list-group-item list-group-item-action">{{ __('Mã giao dịch VNPAY') }}:
                                {{ $deposit->code_vnpay }}</li>
                            <li class="list-group-item list-group-item-action">{{ __('Mã ngân hàng') }}:
                                {{ $deposit->bank_code }}</li>
                            <li class="list-group-item list-group-item-action">{{ __('Ngân hàng') }}:
                                {{ $deposit->bank }}</li>
                            <li class="list-group-item list-group-item-action">{{ __('Số tiền') }}:
                                {{ format_price($deposit->amount) }}</li>
                            <li class="list-group-item list-group-item-action">{{ __('Phí giao dịch') }}:
                                {{ format_price($deposit->fee) }}</li>
                            <li class="list-group-item list-group-item-action">{{ __('Trạng thái') }}:
                                {{ $deposit->status->description() }}</li>
                            <li class="list-group-item list-group-item-action">{{ __('Ngày tạo') }}:
                                {{ format_datetime($deposit->created_at) }}</li>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>
