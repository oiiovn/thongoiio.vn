@extends('layout')

@section('content')

<x-card>
    <x-slot name="header">
        <span class="text-white"><i class="fa-duotone fa-briefcase me-2" aria-hidden="true"></i><span class="">Danh sách cộng tác viên của tôi</span></span>
    </x-slot>
    <div class="card-body">
        @if($user != null)
            @foreach($user as $value)
                @include('reviews.include.comment')
            @endforeach
        @else
            <p class="text-center m-0 fs-5 text-orange">
                Bạn chưa hợp tác với cộng tác viên nào hết <i class="fa-solid fa-face-sad-sweat"></i>
            </p>
        @endif
    </div>
</x-card>

@endsection