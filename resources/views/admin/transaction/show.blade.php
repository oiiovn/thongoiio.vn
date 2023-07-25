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
                            <li class="breadcrumb-item"><a href="{{ route('admin.transaction.index') }}"
                                    class="text-muted">{{ __('Danh sách giao dịch') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Thông tin lệnh nạp') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row justify-content-center">
                @include('admin.transaction.forms.show', ['transaction' => $transaction])
            </div>
        </div>
    </div>
@endsection
