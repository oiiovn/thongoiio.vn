@extends('admin.layouts.master')
@push('libs-css')
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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Sửa Công việc') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <x-form :action="route('admin.job.update')" type="put" :validate="true">
                <x-input type="hidden" name="id" :value="$job->id" />
                <div class="row justify-content-center">
                    @include('admin.jobs.forms.edit-left')
                    @include('admin.jobs.forms.edit-right')
                </div>
            </x-form>
        </div>
    </div>
    @include('admin.jobs.partials.modal-clone')
@endsection

@push('libs-js')
<!-- ckfinder js -->
@endpush

@push('custom-js')
    {{-- <script>
        $('.select2-bs5').select2({
            language: "vi",
            theme: 'bootstrap-5'
        });
    </script> --}}
@endpush
