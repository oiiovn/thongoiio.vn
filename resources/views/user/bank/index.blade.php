@extends('layout')

@section('content')

@if(auth()->user()->hasBankAccount())
<x-card>
    <x-slot name="header">
        <span class="text-white"><i class="fa-solid fa-building-columns me-2" aria-hidden="true"></i><span class="">Danh sách ngân hàng của tôi</span></span>
    </x-slot>
    <div class="card-body">
        <div class="row">
            @foreach($user->bankAccount as $value)
            <div class="col-12 col-md-6">
                <x-card>
                    <x-slot name="header">
                        <span class="text-white">
                            <span class=""><i class="fa-solid fa-piggy-bank"></i> {{ $value->bank_name }}</span>
                            <span class="float-end">
                                <a class="text-white" href="{{ route('user.bank.delete', $value->id) }}">
                                    <i class="fa-solid fa-trash"></i></span>
                                </a>
                        </span>
                    </x-slot>
                    <div class="card-body">
                        Tên tài khoản: {{ $value->account_name }} </br>
                        Số tài khoản: {{ $value->account_number }} </br>
                        Ngân hàng: {{ $value->bank_name }}
                    </div>
                </x-card>
            </div>
            @endforeach
        </div>
    </div>
</x-card>
@endif

<x-form type="post" :validate="true">
    <input name="user_id" type="hidden" value="{{ $user->id }}" hidden />
    <x-card>
        <x-slot name="header">
            <span class="text-white"><i class="fa-solid fa-building-columns me-2" aria-hidden="true"></i><span class="">Tạo tài khoản ngân hàng</span></span>
        </x-slot>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">{{ __('Tên tài khoản') }}</label>
                <x-input class="w-100" name="account_name" placeholder="Nhập tên tài khoản ngân hàng" :required="true" />
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Số tài khoản') }}</label>
                <x-input type="number" class="w-100" name="account_number" placeholder="Nhập số tài khoản ngân hàng" :required="true" />
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Tên ngân hàng') }}</label>
                <x-input class="w-100" name="bank_name" placeholder="Nhập tên ngân hàng" :required="true" />
            </div>
            <button type="submit" class="btn btn-orange w-100">Tạo thông tin ngân hàng</button>
        </div>
    </x-card>
</x-form>

@endsection