@extends('layout')
@push('custom-css')
@endpush
@section('content')
    <x-card>
        <div class="card-body">
            <ul class="steps steps-orange steps-counter steps-vertical">
                @foreach ($job->histories as $history)
                    <li @class([
                        "step-item",
                        "active" => $history->status == $job->status
                    ])>
                        <div class="m-0">{{ $history->status->description() }}</div>
                        <div class="text-muted">{{ $history->desc }}</div>
                    </li>
                @endforeach
                <li class="step-item">
                    <div class="m-0">{{ $job->status->nextCase()->description() }}</div>
                    <div class=""></div>
                </li>
            </ul>
        </div>
    </x-card>
    <div class="wrap-job-detail">
        <x-loops.jobs.item :job="$job">
            <x-slot name="header">
                @include('jobs.loop.job-simple-header', ['show_full' => false])
            </x-slot>
        </x-loops.jobs.item>
    </div>
@endsection
@push('custom-js')
@endpush
