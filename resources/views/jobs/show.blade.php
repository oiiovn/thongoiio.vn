@extends('layout')
@push('libs-css')
    <link href="{{ asset('libs/Parsley.js-2.9.2/style.css') }}" rel="stylesheet">
@endpush
@section('content')
    <x-card>
        <div class="card-body">
            <ul class="steps steps-orange steps-counter steps-vertical">
                @foreach ($job->histories as $history)
                    @include('jobs.step.item', [
                        'history' => $history,
                        'job_status' => $job->status,
                        'money_product_addition' => $job->money_product_addition,
                        'is_access' => $job->canEditHistory(),
                    ])
                @endforeach
                @include('jobs.step.next', [
                    'job' => $job,
                ])
            </ul>
            @if ($job->isStatusComplete())
                <div class="mt-3 text-end">
                    @if ($job->isAuthShop())
                        <x-link class="btn btn-orange" :href="route('info.user_detail', $job->worker->slug)" :title="__('Đánh giá CTV')" />
                    @else
                        <x-link class="btn btn-orange" :href="route('info.shop_detail', $job->shop->slug)" :title="__('Đánh giá shop')" />
                    @endif
                </div>
            @endif
        </div>
    </x-card>
    @if ($job->isAuthShop() && $job->worker)
        @include('jobs.partials.info-worker', ['worker' => $job->worker])
    @elseif ($job->isAuthWorker() && $job->worker)
        @include('jobs.partials.info-shop', ['shop' => $job->shop])
    @endif
    <div class="wrap-job-detail">
        <x-loops.jobs.item :job="$job">
            <x-slot name="header">
                @include('jobs.loop.job-simple-header', ['show_full' => !$job->isAuthShop()])
            </x-slot>
            @include('jobs.partials.table-attribute', [
                'total_money' => $job->money,
                'money_product' => $job->money_product,
                'money_product_addition' => $job->money_product_addition,
                'total' => $job->money + $job->money_product + $job->money_product_addition,
            ])
            <div class="d-flex justify-content-between mt-3">
                @if ($job->isAuthShop())
                    <x-button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                        data-bs-target="#modalCloneJob">
                        {{ __('Sao chép') }}
                    </x-button>
                @endif
                @if ($job->canCancel())
                    <x-button type="button" class="btn btn-sm btn-danger user-cancel-job ms-auto" :data-id="$job->id"
                        data-bs-toggle="modal" data-bs-target="#modalCancelJob">
                        {{ __('Hủy đơn') }}
                    </x-button>
                @endif
            </div>
        </x-loops.jobs.item>
    </div>
    @include('modals.modal-cancel-job')
    @include('modals.modal-clone-job')
    @includeWhen($job->canEditHistory(), 'modals.modal-edit-history-job')
@endsection
@push('libs-js')
    <script src="{{ asset('libs/Parsley.js-2.9.2/parsley.min.js') }}"></script>
@endpush
@push('custom-js')
    <script>
        $(document).ready(function(e) {
            $('.user-cancel-job').click(function(e) {
                $("#modalFormCancelJob input[name='id']").val($(this).data('id'));
            });
            $('#editHistoryJob').click(function(e) {
                $("#modalEditHistoryJob textarea[name='desc']").val($(this).data('desc'));
            });
        });
    </script>
@endpush
