@extends('layout')

@section('content')
<x-card>
    <x-slot name="header">
        <span class="text-white"><i class="fa-regular fa-face-clouds"></i> Quên mật khẩu</span>
    </x-slot>
    <div class="card-body">
        <!-- @if (Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
        @endif -->
        <x-form type="post" :validate="true" action="{{ route('password.post') }}">
            <div class="mb-3">
                <label class="form-label">{{ __('Email') }}</label>
                <x-input-email class="w-100" name="email" :required="true" />
            </div>
            <div class="mb-3">
                <x-link href="{{ route('register.index') }}">Chưa có tài khoản? Đăng ký ngay!</x-link><br>
                <x-link href="{{ route('login.index') }}">Đã có tài khoản? Đăng nhập ngay!</x-link>
            </div>
            <x-button type="submit" class="btn-orange w-100">Gửi xác nhận</x-button>
        </x-form>

    </div>
</x-card>
@endsection