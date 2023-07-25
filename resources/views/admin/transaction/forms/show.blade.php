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
                                {{ __('Tài khoản') }}: {{ $transaction->user->email }}
                            </li>
                            <li class="list-group-item list-group-item-action">{{ __('Mã giao dịch') }}:
                                {{ $transaction->code }}</li>
                            <li class="list-group-item list-group-item-action">{{ __('Loại') }}:
                                {{ $transaction->type->description() }}</li>
                       
                            <li class="list-group-item list-group-item-action">{{ __('Số tiền') }}:
                                {{ format_price($transaction->amount) }}</li>
                            <li class="list-group-item list-group-item-action">{{ __('Phí giao dịch') }}:
                                {{ format_price($transaction->fee) }}</li>
                            <li class="list-group-item list-group-item-action">{{ __('Trạng thái') }}:
                                {{ $transaction->status->description() }}</li>
                            <li class="list-group-item list-group-item-action">{{ __('Ngày tạo') }}:
                                {{ format_datetime($transaction->created_at) }}</li>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>
