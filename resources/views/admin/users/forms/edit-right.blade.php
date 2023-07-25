<div class="col-12 col-md-3">
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Đăng') }}
        </div>
        <div class="card-body p-2 d-flex justify-content-between">
            <x-button.submit :title="__('Cập nhật')" />
            <x-button.modal-delete data-route="{{ route('admin.user.delete', $user->id) }}" :title="__('Xóa')" />
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            {{ __('Số dư trong ví') }}
        </div>
        <div class="card-body">
            {{ number_format($user->wallet->amount) }} {{ __('đ') }}
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            {{ __('Ngân hàng') }}
        </div>
        <div class="card-body p-2 d-flex justify-content-between">
            <div class="w-100">
                @forelse($user->bankAccount as $val)
                    <div @class([ "card" , "mb-2"=> !$loop->last
                        ])>
                        <div class="card-body">
                            <p class="mb-0">Ngân hàng: {{ $val->bank_name }}</p>
                            <p class="mb-0">Tên TK: {{ $val->account_name }}</p>
                            <p class="mb-0">Số TK: {{ $val->account_number }}</p>
                        </div>
                    </div>
                @empty
                    <span>{{ $user->fullname ?? 'Người dùng này' }} chưa cập nhật thông tin tài khoản ngân hàng của họ.</span>
                @endforelse
            </div>
        </div>
    </div>
</div>