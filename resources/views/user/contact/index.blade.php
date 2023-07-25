@extends('layout')

@section('content')

<x-form type="post" :validate="true">
    <input name="user_id" type="hidden" value="{{ auth()->user()->id }}" hidden />
    <x-card>
        <x-slot name="header">
            <span class="text-white"><i class="fa-solid fa-address-book me-2" aria-hidden="true"></i>
                <span class="">Thông tin liên hệ</span>
            </span>
        </x-slot>

        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">{{ __('Địa chỉ') }}</label>
                <x-input class="w-100" name="address" value="{{ $user->address }}" placeholder="Nhập địa chỉ" />
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Facebook') }}</label>
                <x-input class="w-100" name="facebook" value="{{ $user->facebook }}" placeholder="Nhập địa chỉ" />
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Zalo') }}</label>
                <x-input class="w-100" name="zalo" value="{{ $user->zalo }}" placeholder="Nhập địa chỉ" />
            </div>
            <x-button type="submit" class="btn-orange w-100">Lưu thông tin liên hệ</x-button>
        </div>
    </x-card>
</x-form>

@endsection