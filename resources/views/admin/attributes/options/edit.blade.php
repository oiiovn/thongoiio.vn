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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.attribute.index') }}"
                                        class="text-muted">{{ __('Thuộc tính') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Sửa tùy chọn') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <x-form :action="route('admin.attribute.option.update')" type="put" :validate="true">
                <x-input type="hidden" name="id" :value="$attribute_option->id" />
                <x-input type="hidden" name="attribute_id" :value="$attribute_option->attribute_id" />
                <div class="row justify-content-center">
                    @include('admin.attributes.options.forms.edit-left')
                    @include('admin.attributes.options.forms.edit-right')
                </div>
            </x-form>
        </div>
    </div>
@endsection

@push('libs-js')
@endpush