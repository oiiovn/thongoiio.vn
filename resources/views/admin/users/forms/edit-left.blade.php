<div class="col-12 col-md-9">
    <div class="card mb-3">
        <div class="card-header justify-content-center">
            <h2 class="mb-0">{{ __('Thông tin Thành viên') }}</h2>
        </div>
        <div class="row card-body">
            <!-- username -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Tên đăng nhập') }}:</label>
                    <x-input name="username" :value="$user->username" :required="true" :placeholder="__('Tên đăng nhập')" />
                </div>
            </div>
            <!-- Fullname -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Họ và tên') }}:</label>
                    <x-input name="fullname" :value="$user->fullname" :required="true"
                        placeholder="{{ __('Họ và tên') }}" />
                </div>
            </div>
            <!-- email -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Email') }}:</label>
                    <x-input-email name="email" :value="$user->email" :required="true" />
                </div>
            </div>
            <!-- phone -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Số điện thoại') }}:</label>
                    <x-input-phone name="phone" :value="$user->phone" :required="true" />
                </div>
            </div>
            <!-- new password -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Mật khẩu') }}:</label>
                    <x-input-password name="password" />
                </div>
            </div>
            <!-- new password confirmation-->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Xác nhận mật khẩu') }}:</label>
                    <x-input-password name="password_confirmation" 
                        data-parsley-equalto="input[name='password']"
                        data-parsley-equalto-message="{{ __('Mật khẩu không khớp.') }}" />
                </div>
            </div>
            <!-- gender -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Giới tính') }}:</label>
                    <x-select name="gender" :required="true">
                        <x-option value="" :title="__('Chọn Giới tính')" />
                        @if($user->hasGender())
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
            </div>

        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Liên hệ') }}
        </div>
        <div class="card-body">
            <p>{{ __('Địa chỉ') }}: {{ $user->contact->address ?? $user->fullname.' chưa cập nhật thông tin này' }}</p>
            <p>{{ __('Zalo') }}: {{ $user->contact->zalo ?? $user->fullname.' chưa cập nhật thông tin này' }}</p>
            <p>{{ __('Facebook') }}: {{ $user->contact->facebook ?? $user->fullname.' chưa cập nhật thông tin này' }}</p>
        </div>
    </div>
</div>