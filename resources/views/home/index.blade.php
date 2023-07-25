@extends('layout')

@section('top-section')
    <x-banner/>
@endsection

@section('content')
    <div id="jobList">
        @each('jobs.loop.job-simple', $jobs, 'job', 'others.empty-data')
    </div>
    @include('others.effect-loadmore')
    @include('modals.modal-receive-job')
@endsection

@push('custom-js')
    @include('scripts.job-load-more')
    <script>
        $(document).on('click', '.user-receive-job', function(e){
            $("#modalFormReceiveJob input[name='code']").val($(this).data('code'));
        });
    </script>
@endpush