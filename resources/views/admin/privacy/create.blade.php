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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Thêm mới chính sách') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <x-form :action="route('admin.privacy.create')" type="post" :validate="true">
                <x-input type="hidden" name="admin_id" :value="auth()->guard('admin')->user()->id" />
                <div class="row justify-content-center">
                    <div class="col-12 col-md-12">
                        <div class="card mb-3">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span>{{ ('Thêm chính sách mới được thực hiện bên GitBook vui lòng truy cập gitbook để tiếp tục chỉnh sửa.') }}</span>
                                </div>
                                <div>
                                    <a href="https://app.gitbook.com/o/XqMhJoAQfVAUNm04F4dX/s/FCnUv5Z2P9YAyscyPIwS/" class="btn btn-primary" target="_blank">GitBook</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-12 col-md-3">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h1>Tài khoản Gitbook</h1>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <span>{{ ('Tài khoản: toilaptrinh.') }}</span>
                                    <br>
                                    <span>{{ ('Mật khẩu: Oiio.vn2023.') }}</span>
                                </div>
                                <button class="btn btn-ghost-yellow">
                                    <i class="ti ti-edit"></i>
                                </button>
                                <button class="btn btn-ghost-red">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </x-form>
        </div>
    </div>
@endsection
