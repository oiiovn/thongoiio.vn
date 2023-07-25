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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Thêm tin tức') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <x-form :action="route('admin.news.create')" type="post" :validate="true">
                <x-input type="hidden" name="admin_id" :value="auth()->guard('admin')->user()->id" />
                <div class="row justify-content-center">
                    @include('admin.news.forms.form-create')
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