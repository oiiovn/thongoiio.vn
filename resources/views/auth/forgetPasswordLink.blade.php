@extends('layout')

@section('content')
<x-card>
    <x-slot name="header">
        <span class="text-white"><i class="fa-duotone fa-key"></i> Đổi mật khẩu</span>
    </x-slot>
    <div class="card-body">
        <x-form type="post" :validate="true" action="{{ route('resetPwd.post') }}">
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="mb-3">
                <label class="form-label">{{ __('Email') }}</label>
                <x-input-email class="w-100" name="email" :required="true" />
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Mật khẩu') }}</label>
                <x-input-password class="w-100" name="password" :required="true" />
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Nhập lại mật khẩu') }}</label>
                <x-input-password class="w-100" name="password_confirmation" :required="true" />
                @if ($errors->has('password_confirmation'))
                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>
            <x-button type="submit" class="btn-orange w-100">Đổi mật khẩu</x-button>
        </x-form>
    </div>
</x-card>
@endsection