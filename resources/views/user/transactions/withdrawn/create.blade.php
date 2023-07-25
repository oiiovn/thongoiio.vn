@extends('layout')

@section('content')
    <x-form type="post" action="{{ route('transaction.withdrawn.store') }}" :validate="true">
        <x-card>
            <x-slot name="header">
                <span class="text-white"><i class="fa-solid fa-building-columns me-2" aria-hidden="true"></i><span
                        class="">Tạo lệnh rút tiền</span></span>
            </x-slot>
            <div class="card-body">
                <x-input type="hidden" name="user_id" value="{{ $user->id }}" />
                <div class="mb-3">
                    <label class="form-label">{{ __('Số dư: ') }}<b
                            class="price__color">{{ format_price($user->wallet->amount) }}</b></label>
                </div>
                <div class="mb-3 price_input__form">
                    <label class="form-label">{{ __('Nhập số tiền cần rút') }}</label>
                    <x-input class="w-100 " name="amount"
                        placeholder="Nhập số tiền cần rút" min="100000" max="{{ $user->wallet->amount }}"
                        :required="true" onchange="this.value = formatPrice(this.value)"/>
                 
                </div>
                <hr>
                <div class="mb-3">
                    <label for="">Chọn tài khoản ngân hàng</label>
                    @each('user.transactions.withdrawn.include.bank-row', $user->bankAccount, 'item')

                </div>
                <x-button type="submit" class="btn-orange w-100">Tạo lệnh rút tiền</x-button>
            </div>
        </x-card>
    </x-form>
@endsection
