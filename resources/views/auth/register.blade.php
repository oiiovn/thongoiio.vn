<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đăng ký - Web đặt đơn</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('viewsCustom/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('viewsCustom/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('viewsCustom/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('viewsCustom/assets/images/favicon.ico') }}" />
    <style>
        @media (max-width:391px){
            .content-wrapper{
                padding:2rem 1.5rem;
            }
            .page-body-wrapper {
                min-height: calc(100vh - 160px);
            }
        }
    </style>
</head>
<body>
<div class="container-scroller" style="overflow-y: hidden">
    <div class="container-fluid page-body-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row flex-grow">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-4" style="border-radius: 10px">
                        <div class="brand-logo">
                            <img src="{{ asset('icon/logoPagesAuth.png') }}" alt="logo">
                        </div>
                        <h4 style="margin-top: 12px; display: flex; width: 100%; align-items: center; gap: 10px; font-family: 'Lato', sans-serif; font-weight: bold;">
                            Đăng ký để đặt đơn
                        </h4>
                        <x-form class="web" type="post" :validate="true" style="font-family: 'Lato', sans-serif">
                            <div class="mb-3" style="margin-top: 15px;">
                                <x-input class="form-control form-control-flush" type="text" name="fullname" placeholder="Họ và tên" required
                                       style="height: 30px !important; flex-shrink: 0; border-radius: 5px; border: 1px solid #C7C6C1; font-family: 'Lato', sans-serif;"/>
                            </div>

                            <div class="mb-3" style="margin-top: 15px">
                                <x-input class="form-control form-control-flush" type="text" name="username" placeholder="Tên đăng nhập"
                                       style="height: 30px; flex-shrink: 0; border-radius: 5px; border: 1px solid #C7C6C1; font-family: 'Lato', sans-serif;"/>
                                <p id="errorName" class="text-left text-danger mb-2"></p>
                            </div>

                            <div class="mb-3" style="margin-top: 15px">
                                <x-input class="form-control form-control-flush" type="text" name="phone" placeholder="Số điện thoại"
                                         style="height: 30px; flex-shrink: 0; border-radius: 5px; border: 1px solid #C7C6C1; font-family: 'Lato', sans-serif;"/>
                                <p id="errorPhone" class="text-danger text-left mb-2"></p>
                            </div>

                            <div class="mb-3" style="margin-top: 15px">
                                <x-input id="email" class="form-control form-control-flush email" type="email" name="email" placeholder="Email"
                                         style="height: 30px; flex-shrink: 0; border-radius: 5px; border: 1px solid #C7C6C1; font-family: 'Lato', sans-serif;"/>
                                <p id="errorEmail" class="text-danger text-left mb-2"></p>
                            </div>

                            <div class="mb-3" style="margin-top: 15px">
                                <x-input id="password" class="form-control form-control-flush" type="password" name="password" placeholder="Mật khẩu"
                                       style="height: 30px; flex-shrink: 0; border-radius: 5px; border: 1px solid #C7C6C1; font-family: 'Lato', sans-serif;"/>
                                <p id="errorPassword" class="text-danger text-left mb-2"></p>
                            </div>

                            <div class="mb-3" style="margin-top: 15px">
                                <x-input id="password-confirm" class="form-control form-control-flush" type="password" name="confirm-password" placeholder="Nhập lại mật khẩu"
                                         style="height: 30px; flex-shrink: 0; border-radius: 5px; border: 1px solid #C7C6C1; font-family: 'Lato', sans-serif;"/>
                                <p id="errorConfirm" class="text-danger text-left mb-2"></p>
                            </div>

                            <div class="mb-0" style="margin-top: 15px;">
                                <label class="anim" style="display: flex; justify-content: left; align-items: center;gap: 10px;">
                                    <input type="checkbox" class="checkbox" required="" />
                                    <span style="color: #AEAEAE; font-size: 14px; font-family: 'Lato', sans-serif; font-weight: 400; line-height: 22.40px; word-wrap: break-word">
                                        Tôi đồng ý với
                                        <a href="#" style="color: #505050; font-size: 14px; font-family: 'Lato', sans-serif; font-weight: 400; line-height: 22.40px; word-wrap: break-word; text-decoration: none;">
                                            Điều khoản sử dụng!
                                        </a>
                                    </span>
                                </label>
                                <div class="clear"> </div>
                            </div>
                            <button type="submit" class="btn-warning"
                                    style="width: 100%; height: 30px; flex-shrink: 0; border-radius: 5px; margin-top: 10px;
                                           background: linear-gradient(90deg, #FBC250 0%, #DEA143 24.48%, #F5AE5D 50%, #DE8C49 77.08%, #E0793F 100%); border: none;">
                                <span style="color: #FFF; font-size: 16px; font-family: 'Lato', sans-serif; font-style: normal; font-weight: 700; line-height: 22.4px;">Đăng ký</span>
                            </button>


                            <div class="mb-0" style="width: 100%; align-items: center; gap: 10px; margin-top: 20px; text-align: center;">
                                <p style="color: #333; font-size: 14px; font-family: 'Lato', sans-serif; font-style: normal; font-weight: 400; line-height: 22.4px;">
                                    Bạn đã có tài khoản <a href="{{ route('login.index') }}" style="color: #E0793F !important; text-decoration: none;"> Đăng nhập ngay!</a>
                                </p>
                            </div>
                        </x-form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- Start Footer -->
    <footer class="footer" style="border-top: none; width: 100%; background: #F3F3ED; position: fixed; bottom: 0;">
        @include('layout.include.footer')
    </footer>
    <!-- End Footer -->
    <!-- page-body-wrapper ends -->

</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{ asset('viewsCustom/assets/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('viewsCustom/assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('viewsCustom/assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('viewsCustom/assets/js/misc.js') }}"></script>
<!-- endinject -->
</body>
</html>
