@extends('admin.layouts.master')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        {{ __('Dashboard') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <x-form class="row mb-5" :action="url()->current()" type="get" :validate="true">
                <div class="col-12 col-md-4">
                    <!-- from date -->
                    <div class="form-group">
                        <label class="control-label">{{ __('Từ ngày') }}:</label>
                        <x-input type="date" name="from_date" :value="request('from_date')" placeholder="{{ __('Từ ngày') }}" />
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <!-- to date -->
                    <div class="form-group">
                        <label class="control-label">{{ __('Đến ngày') }}:</label>
                        <x-input type="date" name="to_date" :value="request('to_date')" placeholder="{{ __('Đến ngày') }}" />
                    </div>
                </div>
                <div class="col-12 col-md-2">
                    <div class="form-group d-flex flex-column">
                        <label class="invisible" for="">{{ __('Lọc') }}</label>
                        <x-button.submit :title="__('Lọc')" />
                    </div>
                </div>
            </x-form>
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="row row-cards">
                        @foreach ($data as $statisic)
                            @include('admin.dashboard.partials.block-statistics', $statisic)
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
