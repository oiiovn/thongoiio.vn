@extends('admin.layouts.master')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                    class="text-muted">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Thêm hướng dẫn cho người dùng') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <x-form :action="route('admin.tutorial.create')" type="post" :validate="true">
                <x-input type="hidden" name="admin_id" :value="auth()->guard('admin')->user()->id" />
                <div class="row justify-content-center">
                    <div class="col-12 col-md-12">
                        <div class="card mb-3">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span>{{ ('Thêm hướng dẫn mới được thực hiện bên GitBook vui lòng truy cập gitbook để tiếp tục chỉnh sửa.') }}</span>
                                </div>
                                <div>
                                    <a href="https://app.gitbook.com/o/XqMhJoAQfVAUNm04F4dX/s/FCnUv5Z2P9YAyscyPIwS/" class="btn btn-primary" target="_blank">GitBook</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </x-form>
        </div>
    </div>
@endsection

@push('custom-js')
<!-- ckfinder js -->
@include('ckfinder::setup')
<script src="{{ asset('libs/ckeditor/ckeditor.js') }}"></script>
@endpush
