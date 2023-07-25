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
                            <li class="breadcrumb-item"><a href="{{ route('admin.transaction.withdrawn.index') }}"
                                    class="text-muted">{{ __('Danh sách lệnh rút') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Sửa lệnh rút') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <x-form :action="route('admin.transaction.withdrawn.update')" type="put" enctype="multipart/form-data" :validate="true" entype>
                <x-input type="hidden" name="id" :value="$withdrawn->id" />
                <div class="row justify-content-center">
                    @include('admin.transaction.withdrawn.forms.edit-left', ['withdrawn' => $withdrawn])
                    @include('admin.transaction.withdrawn.forms.edit-right', ['withdrawn' => $withdrawn])
                </div>
            </x-form>
        </div>
    </div>
@endsection
@push('custom-js')
    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                previewImage.src = URL.createObjectURL(file)
            }
        }
    </script>
@endpush
