<x-card>
    <x-slot name="header">
        <span class="text-white">
            <img class="rounded-circle shadow-sm bg-body-tertiary rounded" src="
                @if($value->avatar != null) 
                    {{ asset($value->avatar) }} 
                @else 
                    {{ asset('assets/image/avatar.png') }} 
                @endif" width="35px" height="35px" style="border: 2px solid white;" />
            <span>{{ $value->fullname }}</span>
        </span>
    </x-slot>

    <div class="card-body" id="comment-input">
        @if(count($value->reviews->where('author_id', auth()->user()->id)->where('user_id', $value->id)) 
            < count($value->jobs->where('worker_id', $value->id)) )
        <x-form type="post" :validate="true">
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
                <input name="status" value="1" hidden />
                <input type="text" class="form-control" placeholder="Đánh giá {{ $value->fullname }}" name="title" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-orange" type="submit" id="button-addon2">Đánh giá</button>
            </div>
        </x-form>
        @endif

        @foreach ($value->reviews->where('author_id', auth()->user()->id) as $key)
        <x-card class="mb-0 mt-3">
            <div class="card-body">
                <p class="text-end m-0 rating-box">
                    <span class="text-warning">{{ $key->rating }} <i class="fa-solid fa-star"></i></span>
                </p>
                <span>{{ $key->title }}</span>
                <hr>
                <p class="mb-0 text-muted">
                    <a href="{{ route('reviews.delete', $key->id) }}"><i class="fa-duotone fa-trash text-danger"></i></a>
                    <em class="float-end">Ngày đăng: {{ $key->created_at }}</em>
                </p>
            </div>
        </x-card>
        @endforeach
    </div>
</x-card>