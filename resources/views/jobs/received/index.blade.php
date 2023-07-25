@extends('layout')
@push('custom-css')
<style>
    .main-content{
        position: relative;
    }
</style>
@endpush
@section('content')
    <x-card>
        @include('jobs.loop.job-nav-status', [
            'type' => 'member',
            'route_name' => 'job.received.index',
            'current_status' => $current_status
        ])
    </x-card>
    <div class="wrap-job-list">
        <div id="jobList" class="">
            @forelse ($jobs as $job)
                @include('jobs.loop.job-simple', $option_view)
            @empty
                @include('others.empty-data')
            @endforelse
        </div>
        @include('others.loading')
        @include('others.effect-loadmore')
    </div>
@endsection
@push('custom-js')
    @include('jobs.scripts.script')
    @include('scripts.job-load-more')
@endpush
