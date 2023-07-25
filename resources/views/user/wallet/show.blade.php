@extends('layout')

@section('content')
    <x-card>
        <x-slot name="header">
            <span class="text-white"><i class="fa-solid fa-building-columns me-2" aria-hidden="true"></i><span class="">Ví
                    tiền</span></span>
        </x-slot>
        <div class="card-body text-center">
            <label for="">Số dư: <b class="price__color">{{ format_price($user->wallet->amount) }}</b></label>
        </div>
        <hr>
        <div class="card-body">
            <div class="mb-3 text-center">
                <a class="btn btn-orange" href="{{ route('transaction.deposit.create') }}">Nạp tiền</a>
                <a class="btn btn-orange-outline" href="{{ route('transaction.withdrawn.create') }}">Rút tiền</a>
            </div>

        </div>
        {{-- <div class="cart-footer p-3">
            <ul class="nav nav-tabs justify-content-center" id="transaction-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#deposit-tab" type="button"
                        role="tab" aria-selected="true">Lệnh nạp gần đây</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#withdrawn-tab" type="button"
                        role="tab" aria-selected="true">Lệnh rút gần đây</button>
                </li>
            </ul>
            <div class="tab-content" id="transaction-tab-content">
                <div class="tab-pane fade show active" id="deposit-tab" role="tabpanel">nạp</div>
                <div class="tab-pane fade" id="withdrawn-tab" role="tabpanel">rút</div>
            </div>
        </div> --}}
    </x-card>
@endsection
