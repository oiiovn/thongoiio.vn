@extends('layout')

@section('content')
<x-form type="post" :validate="true" enctype="multipart/form-data">
    <x-card>
        <input name="id" type="hidden" value="{{ $user->id }}" />
        <div class="img-info">
            <div class="cover-img" onclick="document.getElementById('file-cover_img').click();" 
                @if(auth()->user()->getBackground()) style="background-image: url({{ asset($user->cover_photo) }})" @endif>
                <input id="file-cover_img" type="file" name="cover_photo" class="d-none"></input>
            </div>
            <div class="profile-img">
                <img onclick="document.getElementById('file-avatar').click();" id="avatar-img" src="{{asset(auth()->user()->getAvatar())}}"
                class="img-fluid" />
                <input id="file-avatar" name="avatar" type="file" class="d-none"></input>
                <p class="h5 fw-bold">{{ auth()->user()->fullname ?? auth()->user()->username }}</p>
            </div>
        </div>

        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">{{ __('Họ và tên') }}</label>
                <x-input class="w-100" name="fullname" value="{{ $user->fullname }}" :required="true" />
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Tên tài khoản') }}</label>
                <x-input class="w-100" name="username" value="{{ $user->username }}" :required="true" readonly />
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Email') }}</label>
                <x-input-email class="w-100" name="email" value="{{ $user->email }}" readonly />
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('Số điện thoại') }}</label>
                <x-input-phone class="w-100" name="phone" value="{{ $user->phone }}" :required="true" readonly />
            </div>
            
            <div class="mb-3">
                <label class="form-label">{{ __('Giới tính') }}</label>
                <x-select name="gender" :required="true">
                    <x-option value="" :title="__('Chọn giới tính')" />
                    @if(auth()->user()->hasGender())
                        @foreach ($gender as $key => $value)
                        <x-option :option="$user->gender->value" :value="$key" :title="__($value)" />
                        @endforeach
                    @else
                        @foreach ($gender as $key => $value)
                        <x-option :option="$value" :value="$key" :title="__($value)" />
                        @endforeach
                    @endif
                </x-select>
            </div>

            {{-- <div>
                <div class="row">
                    <div class="col-12 col-md-4 mb-3">
                        <label class="form-label">{{ __('Tỉnh') }}</label>
                        <x-select name="province_id" :required="true">
                            @if(auth()->user()->hasProvince())
                                <x-option value="{{$user->province_id}}" :title="__($user->province->name)" />
                            @else
                                <x-option value="" :title="__('Chọn tỉnh thành')" />
                            @endif

                            @foreach($province as $value)
                                <x-option value="{{ $value->id }}" :title="__($value->name)" />
                            @endforeach
                        </x-select>
                    </div>
                    <div class="col-12 col-md-4 mb-3">
                        <label class="form-label">{{ __('Quận/huyện') }}</label>
                        <x-select name="district_id" :required="true">
                            @if(auth()->user()->hasDistrict())
                                <x-option value="{{$user->district_id}}" :title="__($user->district->name)" />
                            @else
                                <x-option value="" :title="__('Chọn quận huyện')" />
                            @endif
                        </x-select>
                    </div>
                    <div class="col-12 col-md-4 mb-3">
                        <label class="form-label">{{ __('Xã') }}</label>
                        <x-select name="ward_id" :required="true">
                            @if(auth()->user()->hasWard())
                                <x-option value="{{$user->ward_id}}" :title="__($user->ward->name)" />
                            @else
                                <x-option value="" :title="__('Chọn xã phường')" />
                            @endif
                        </x-select>
                    </div>
                </div>
            </div> --}}

            <x-button type="submit" class="btn-orange w-100">Cập nhật thông tin tài khoản</x-button>
        </div>
    </x-card>
</x-form>


<x-form type="post" action="{{ route('user.contact.update') }}" :validate="true">
    <input name="user_id" type="hidden" value="{{ auth()->user()->id }}" hidden />
    <x-card>
        <x-slot name="header">
            <span class="text-white"><i class="fa-solid fa-address-book me-2" aria-hidden="true"></i>
                <span class="">Liên hệ</span>
            </span>
        </x-slot>

        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">{{ __('Địa chỉ') }}</label>
                <x-input class="w-100" name="address" value="{{ $user->contact->address ?? '' }}" placeholder="Nhập địa chỉ" />
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Facebook') }}</label>
                <x-input class="w-100" name="facebook" value="{{ $user->contact->facebook ?? '' }}" placeholder="Nhập liên kết facebook" />
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Zalo') }}</label>
                <x-input class="w-100" name="zalo" value="{{ $user->contact->zalo ?? '' }}" placeholder="Nhập số điện thọai zalo" />
            </div>
            <x-button type="submit" class="btn-orange w-100">Lưu thông tin liên hệ</x-button>
        </div>
    </x-card>
</x-form>

<x-form id="form-resetpass" action="{{ route('user.password') }}" type="post" :validate="true">
    <input name="id" type="hidden" value="{{ $user->id }}" />
    <x-card>
        <x-slot name="header">
            <span class="text-white"><i class="fa fa-key me-2" aria-hidden="true"></i><span class="">Đổi mật khẩu</span></span>
        </x-slot>
        <div class="form-resetpass m-4">
            <div class="form-info">
                <label>Mật khẩu mới</label>
                <x-input id="new-password" type="password" name="password" />
                <span id="new-password-err" class="text-danger"></span>
            </div>
            <div class="form-info">
                <label>Nhập lại mật khẩu mới</label>
                <x-input id="re-password" type="password" name="re_password" />
                <span id="re-password-err" class="text-danger"></span>
            </div>
            <x-button type="submit" id="btn-resetpass" class="btn btn-orange w-100" disabled>
                Cập nhật
            </x-button>
        </div>
    </x-card>
</x-form>
<script>
    // --> Xử lí cập nhật avartar và cover-photo
    let avatar = document.getElementById('avatar-img');
    let cover_img = document.querySelector(".cover-img");
    let file_avatar = document.getElementById('file-avatar');
    let file_coverimg = document.getElementById('file-cover_img');


    file_avatar.addEventListener("change", (e) => {
        let file = e.target.files[0];
        let reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function() {
            let base64Image = reader.result;
            avatar.src = base64Image;
        };
    })

    file_coverimg.addEventListener("change", (e) => {
        let file = e.target.files[0];
        let reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function() {
            let base64Image = reader.result;
            cover_img.style.backgroundImage = `url("${base64Image}")`;
        };
    })

    //Validate reset password
    let newPassword = document.querySelector('#new-password')
    let rePassword = document.querySelector('#re-password')
    let newPassword_err = document.querySelector('#new-password-err')
    let rePassword_err = document.querySelector('#re-password-err')
    let form_resetPassword = document.querySelector('#form-resetpass')
    let btnResetpass = document.querySelector('#btn-resetpass')

    newPassword.addEventListener('input', (e) => {
        let passwordRegex = /^(?=.*[a-zA-Z]).{8,}$/;
        if (!passwordRegex.test(e.target.value)) {
            newPassword_err.textContent = 'Mật khẩu tối thiểu phải có 8 kí tự và ít nhất một chữ cái.';
        } else {
            newPassword_err.textContent = '';
        }
    })


    rePassword.addEventListener('input', (e) => {

        if (e.target.value === newPassword.value) {

            rePassword_err.textContent = '';
        } else if (e.target.value == '') {
            rePassword_err.textContent = '';
        } else {
            rePassword_err.textContent = 'Mật khẩu chưa khớp với mật khẩu ở trên.';
        }
    })

    form_resetPassword.addEventListener('input', () => {
        // Check if all fields are valid
        if (newPassword_err.textContent === '' && rePassword_err.textContent === '' && rePassword.value !== '') {
            btnResetpass.disabled = false;
        } else {
            btnResetpass.disabled = true;
        }
    });
</script>
@endsection