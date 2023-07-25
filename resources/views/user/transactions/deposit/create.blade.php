@extends('layout')

@section('content')
<style>
    a{
        text-decoration: none !important;
    }
</style>
    <x-form type="post" action="{{ route('transaction.deposit.store') }}" :validate="true">
        <x-card>
            <x-slot name="header">
                <span class="text-white"><i class="fa-solid fa-building-columns me-2" aria-hidden="true"></i><span
                        class="">Tạo lệnh nạp tiền</span></span>
            </x-slot>
            <div class="card-body">
{{--                <x-input type="hidden" name="user_id" value="{{ $user->id }}" />--}}
{{--                <div class="mb-3 price_input__form">--}}
{{--                    <label class="form-label">{{ __('Nhập số tiền cần nạp') }}</label>--}}
{{--                    <x-input class="w-100 " name="amount" placeholder="Nhập số tiền cần nạp" min="100000"--}}
{{--                         :required="true" onchange="this.value = formatPrice(this.value)"/>--}}
{{--                   --}}
{{--                </div>--}}
{{--                <hr>--}}
{{--                <div class="mb-3">--}}
{{--                    <label for="">Chọn phương thức thanh toán</label>--}}
{{--                    <div class="mb-1">--}}
{{--                        <input type="radio" id="bankCodeQR" name="bank_code" value="VNPAYQR" checked>--}}
{{--                        <label for="bankCodeQR">Thanh toán bằng ứng dụng hỗ trợ VNPAYQR</label>--}}
{{--                    </div>--}}
{{--                    <div class="mb-1">--}}
{{--                        <input type="radio" id="bankCodeATM" name="bank_code" value="VNBANK">--}}
{{--                        <label for="bankCodeATM">Thanh toán qua thẻ ATM/Tài khoản nội địa</label>--}}
{{--                    </div>--}}
{{--                    <div class="mb-1">--}}
{{--                        <input type="radio" id="bankCodeQT" name="bank_code" value="INTCARD">--}}
{{--                        <label for="bankCodeQT">Thanh toán qua thẻ quốc tế</label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <x-button type="submit" class="btn-orange w-100">Tạo lệnh nạp tiền</x-button>--}}

                <div class="card-grid">
                    <div class="card-list">
                        <div class="card-item">
                            <button type="button" class="btn btn-orange" data-toggle="modal" data-target="#qrModal" data-qr="{{ asset('icon/QR-50.svg') }}">
                                <span>50.000đ</span>
                            </button>
                        </div>

                        <div class="card-item">
                            <button type="button" class="btn btn-orange" data-toggle="modal" data-target="#qrModal" data-qr="{{ asset('icon/QR-200.svg') }}">
                                <span>200.000đ</span>
                            </button>
                        </div>

                        <div class="card-item">
                            <button type="button" class="btn btn-orange" data-toggle="modal" data-target="#qrModal" data-qr="{{ asset('icon/QR-500.svg') }}">
                                <span>500.000đ</span>
                            </button>
                        </div>

                        <div class="card-item">
                            <button type="button" class="btn btn-orange" data-toggle="modal" data-target="#qrModal" data-qr="{{ asset('icon/QR-1000.svg') }}">
                                <span>1.000.000đ</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Nested Modal -->
                @include('user.transactions.deposit.modal.modalQR')

                <!-- JavaScript để xử lý việc hiển thị hình ảnh QR tương ứng -->
                <script>
                    $('#qrModal').on('show.bs.modal', function (event) {
                        var button = $(event.relatedTarget);
                        var qrImage = button.data('qr');
                        $('#qrImage').attr('src', qrImage);
                    });

                    $('#qrModal').on('keydown', function(event) {
                        if (event.keyCode === 27) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                    });
                </script>

                {{-- Style --}}
                <style>
                    .card-list{
                        display: grid;
                        grid-template-columns: 40% 40%;
                        justify-content: center;
                        align-items: center;
                        padding:0 1.5rem;
                    }
                    .card-item{
                        width: 100%;
                        margin-top: 2vh;
                        margin-bottom: 2vh;
                    }
                    .card-item button{
                        font-size: 30px;
                        font-weight: 500;
                        align-items: center;
                        justify-content: center;
                        display: flex;
                        width:95%;
                        height:110px;
                        border-radius: 10px;
                        background: #ED6237;
                        color:#FFF;
                        border:none;
                    }
                    .card-item button:hover{
                        opacity: 0.8;
                    }
                </style>
            </div>
        </x-card>
    </x-form>
@endsection

<!-- CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
