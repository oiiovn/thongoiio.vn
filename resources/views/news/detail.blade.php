@extends('layout')

@section('content')

<x-card>
    <x-slot name="header">
        <span class="text-white">
            <i class="fa-solid fa-newspaper"></i> {{ $news->title }}
        </span>
    </x-slot>
    <img src="{{ asset($news->avatar) }}" width="100%"/>
    <div class="card-body">
        {!! $news->content !!}
    </div>
</x-card>

@endsection