@extends('layout')

@section('content')

<x-card>
    <x-slot name="header">
        <span class="text-white">
            <i class="fa-solid fa-newspaper"></i> Tin tức
        </span>
    </x-slot>
    <div class="card-body">
        <div class="row">
            @foreach($news as $value)
            <div class="col-6">
                <a href="{{ route('news.detail', $value->slug) }}">
                    <x-card>
                        <img class="shadow-sm" src="{{ asset($value->avatar) }}" width="100%" height="160px" />
                        <div class="card-body">
                            {{ $value->title }}
                        </div>
                    </x-card>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</x-card>

@endsection