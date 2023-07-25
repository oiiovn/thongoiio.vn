@extends('layout')

@section('content')
<x-card>
    <x-slot name="header">
        <span class="text-white"><i class="fa-brands fa-shopify"></i>Cập nhật cửa hàng</span>
    </x-slot>
    <div class="card-body">
        <x-form type="post" :validate="true" action="{{ route('user.update_shop') }}">
            <div class="mb-3">
                <label class="form-label">{{ __('Tên cửa hàng') }}</label>
                <x-input class="w-100" name="name_shop" value="{{ auth()->user()->name_shop }}" placeholder="Nhập tên cửa hàng" :required="true" />
            </div>
            <x-button type="submit" class="btn-orange w-100">Cập nhật</x-button>
        </x-form>
    </div>
</x-card>
@endsection
