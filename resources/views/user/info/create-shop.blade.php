@extends('layout')

@section('content')

@section('content')
<x-card>
    <x-slot name="header">
        <span class="text-white"><i class="fa-brands fa-shopify"></i> Tạo cửa hàng</span>
    </x-slot>
    <div class="card-body">
        <x-form type="post" :validate="true" action="{{ route('user.post_shop') }}">
            <div class="mb-3">
                <label class="form-label">{{ __('Tên cửa hàng') }}</label>
                <x-input class="w-100" name="name_shop" placeholder="Nhập tên cửa hàng" :required="true" />
            </div>
            <x-button type="submit" class="btn-orange w-100">Tạo ngay</x-button>
        </x-form>
    </div>
</x-card>
@endsection
