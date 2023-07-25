@extends('layout')

@section('content')

<x-card>    
    <div class="img-info">
        <div class="cover-img" @if($user->getBackground()) style="background-image: url({{ asset($user->cover_photo) }})" @endif>
            <input id="file-cover_img" type="file" class="d-none"></input>
        </div>
        <div class="profile-img">
            <img id="avatar-img" src="{{asset($user->getAvatar())}}" class="img-fluid" />
            <p class="h5 fw-bold">
                {{ $user->name_shop }}
                @if($user->isReputable())
                    <i class="fa-regular fa-circle-check text-primary mt-1 ms-2 float-end"></i>
                @endif
            </p>
        </div>
    </div>
    
    <div class="card-body">
        <x-card>
            <div class="card-body">
                <p class="fs-6 mb-0">
                    <i class="fa-solid fa-envelope"></i> Email: 
                    <span class="float-end">{{ $user->email }}</span>
                </p>
                <p class="fs-6 mb-0">
                    <i class="fa-solid fa-phone"></i> Số điện thoại: 
                    <span class="float-end">{{ $user->phone }}</span>
                </p>
                <p class="fs-6 mb-0">
                    <i class="fa-regular fa-venus-mars"></i> Giới tính: 
                    <span class="float-end">{{ $gender[$user->gender->value ?? '3'] }}</span>
                </p>
                <p class="fs-6 mb-0">
                    <i class="fa-solid fa-address-book"></i> Địa chỉ: 
                    <span class="float-end">{{ $user->contact->address ?? 'Chưa cập nhật' }}</span>
                </p>
                <p class="fs-6 mb-0">
                    <i class="fa-brands fa-square-facebook"></i> Facebook: 
                    <span class="float-end">
                        <a href="{{ Str::startsWith($user->contact->facebook, 'https://') ? $user->contact->facebook : 'https://' . $user->contact->facebook }}" target="_blank">
                            {{ $user->contact->facebook ?? 'Chưa cập nhật' }}
                        </a>
                    </span>
                </p>
                <p class="fs-6 mb-0">
                    <i class="fa-solid fa-envelope"></i> Zalo: 
                    <span class="float-end"><a href="http://zalo.me/{{$user->contact->zalo}}" target="_blank">{{ $user->contact->zalo ?? 'Chưa cập nhật' }}</a></span>
                </p>
            </div>
        </x-card>
        <x-card>
            <x-slot name="header">
                <span class="text-white">Thông tin ngân hàng</span>
            </x-slot>
            <div class="card-body">
                @if($user->hasBankAccount())
                    <div class="row">
                        @foreach ($user->bankAccount as $value)
                        <div class="col-6">
                            <x-card @class([
                                    "mb-0"=> !$loop->first
                                ])>
                                <x-slot name="header">
                                    <span class="text-white">
                                        <i class="fa-solid fa-piggy-bank"></i> {{ $value->bank_name }}
                                    </span>
                                </x-slot>
                                <div class="card-body">
                                    Tên TK: {{ $value->account_name }} <br />
                                    Số TK: {{ $value->account_number }}
                                </div>
                            </x-card>
                        </div>
                        @endforeach
                    </div>
                @else
                    Shop chưa cập nhật thông tin ngân hàng
                @endif
            </div>
        </x-card>
    </div>
</x-card>


@if($users != null)
    @foreach($users->where('id', $user->id) as $value)
        @if(count($value->reviews->where('author_id', auth()->user()->id)->where('user_id', $value->id)) 
            < count($value->jobCreateds->where('shop_id', $value->id)) )
            <x-card>
                <div class="card-body">
                    <x-form type="post" action="{{ route('reviewsShop.create') }}" :validate="true">
                        <div class="form-group m-0">
                            <label class="control-label">{{ __('Vote sao') }}:</label>
                        </div>
                        <div class="rating">
                            <input type="radio" name="rating" id="rating-5" value="5">
                            <label for="rating-5"></label>
                            <input type="radio" name="rating" id="rating-4" value="4">
                            <label for="rating-4"></label>
                            <input type="radio" name="rating" id="rating-3" value="3">
                            <label for="rating-3"></label>
                            <input type="radio" name="rating" id="rating-2" value="2">
                            <label for="rating-2"></label>
                            <input type="radio" name="rating" id="rating-1" value="1">
                            <label for="rating-1"></label>
                        </div>
                        <div class="input-group">
                            <input name="author_id" value="{{ auth()->user()->id }}" hidden />
                            <input name="user_id" value="{{ $value->id }}" hidden />
                            <input name="status" value="2" hidden />
                            <input type="text" class="form-control" placeholder="Đánh giá {{ $value->fullname }}" name="title" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-orange" type="submit" id="button-addon2">Đánh giá</button>
                        </div>
                    </x-form>
                </div>
            </x-card>
        @endif
    @endforeach
@endif

<x-card>
    <x-slot name="header">
        <span class="text-white">
            <i class="fa-solid fa-shop me-2" aria-hidden="true"></i>
            <span class="">Đánh giá của cộng tác viên</span>
            <p class="float-end m-0 rating-box">
                <span class="text-warning"> 
                    @if ($user->reviews->where('status', 2)->count() > 0)
                        {{ round($user->reviews->where('status', 2)->sum('rating') / $user->reviews->where('status', 2)->count(),1) }}
                    @else 0 @endif
                    <i class="fa-solid fa-star"></i>
                </span>
            </p>
        </span>
    </x-slot>
    <div class="card-body">
        @foreach($user->reviews->where('status', 2) as $value)
        <x-card class="{{ $loop->last ? 'mb-0' : '' }}">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <img src="{{ asset($value->author->getAvatar()) }}" width="40px" height="40px" class="rounded-circle" />
                        <span class="fw-bold ps-2">{{ $value->author->fullname ?? $value->author->username }}</span>
                    </div>
                    <div class="col-4">
                        <p class="text-end m-0 rating-box">
                            <span class="text-warning">{{ $value->rating }} <i class="fa-solid fa-star"></i></span>
                        </p>
                    </div>
                </div>
                <p class="mb-0 mt-2">{{ $value->title }}</p>
                <hr class="mt-2 mb-2">
                </hr>
                <p class="text-end text-muted mb-0"><em>{{ $value->created_at }}</em></p>
            </div>
        </x-card>
        @endforeach
    </div>
</x-card>

@endsection