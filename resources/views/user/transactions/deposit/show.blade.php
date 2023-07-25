@extends('layout')

@section('content')
    <x-card>
        <x-slot name="header">
            <span class="text-white"><i class="fa-solid fa-building-columns me-2" aria-hidden="true"></i><span
                    class="">Kết quả giao dịch</span></span>
        </x-slot>
        <div class="card-body">
            <ul>
                <li>Mã giao dịch: {{ $data->code }}</li>
                <li>Số tiền: {{ format_price($data->amount) }}</li>
                <li>Mã giao dịch VnPay: {{ $data->code_vnpay }}</li>
                <li>Mã ngân hàng: {{ $data->bank }}</li>
                <li>Thời gian thanh toán: {{ format_datetime($data->time) }}</li>
                <li>Trạng thái thanh toán: {{ $data->status->description() }}</li>
            </ul>
        </div>
    </x-card>
@endsection
