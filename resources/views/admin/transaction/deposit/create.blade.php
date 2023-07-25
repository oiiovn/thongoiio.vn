@extends('admin.layouts.master')
@push('libs-css')
    <link rel="stylesheet" href="{{ asset('libs/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/select2/dist/css/select2-bootstrap-5-theme.min.css') }}">
@endpush
@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                    class="text-muted">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.transaction.deposit.index') }}"
                                    class="text-muted">{{ __('Nạp tiền') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Nạp tền') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <x-form :action="route('admin.transaction.deposit.store')" type="post" enctype="multipart/form-data" :validate="true" entype>
                <div class="row justify-content-center">
                    @include('admin.transaction.deposit.forms.create-left', ['users' => $users])
                    @include('admin.transaction.deposit.forms.create-right')
                </div>
            </x-form>
        </div>
    </div>
@endsection
@push('custom-js')
    @include('admin.transaction.deposit.scripts.create_script')
    <script src="{{ asset('libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('libs/select2/dist/js/i18n/vi.js') }}"></script>
@endpush
