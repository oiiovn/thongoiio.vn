<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đăng nhập - Web đặt đơn</title>
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
</head>
<body>
<div class="container-scroller" style="overflow-y: hidden !important;">
    <div class="container-fluid page-body-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <style>
                @media only screen and (min-width: 200px) {
                    .content-wrapper.auth {
                        align-items: start;
                        margin-top: 0px;
                    }
                }
                @media only screen and (min-width: 400px) {
                    .content-wrapper.auth {
                        align-items: start;
                    }
                }
            </style>
            <div class="row flex-grow">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-4" style="border-radius: 10px">
                        <div class="brand-logo">
                            <img src="{{ asset('icon/logoPagesAuth.png') }}" alt="logo">
                        </div>
                        <h4 style="margin-top: 24px; display: flex; width: 100%; align-items: center; gap: 10px; font-family: 'Lato', sans-serif; font-weight: bold;">
                            Đăng nhập để đặt đơn
                        </h4>

                        <x-form type="post" :validate="true" style="font-family: 'Lato', sans-serif">
                            <div class="mb-3" style="margin-top: 20px;">
                                <input class="form-control form-control-lg" type="email" name="email" :required="true" placeholder="Nhập Email"
                                       style="height: 55px; flex-shrink: 0; border-radius: 5px; border: 1px solid #C7C6C1; font-family: 'Lato', sans-serif;"/>
                            </div>
                            <div class="mb-3" style="margin-top: 22px">
                                <input class="form-control form-control-lg" type="password" name="password" :required="true" placeholder="Nhập Password"
                                       style="height: 55px; flex-shrink: 0; border-radius: 5px; border: 1px solid #C7C6C1; font-family: 'Lato', sans-serif;"/>
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center"
                                 style="display: flex; width: 100%; height: 10px; justify-content: center; align-items: center; margin-top: 12px">
                                <label class="remember" style="display: flex; justify-content: left; align-items: center;gap: 10px;">
                                    <input type="checkbox" class="checkbox" />
                                    <span style="color: #AEAEAE; font-size: 14px; font-family: 'Lato', sans-serif; font-weight: 400; line-height: 22.40px; word-wrap: break-word">Ghi nhớ tôi</span>
                                </label>
                                <a href="{{ route('password.get') }}" class="auth-link text-black"
                                   style="color: #333; font-size: 14px; font-family: 'Lato', sans-serif; font-style: normal; font-weight: 400; line-height: 22.4px; text-decoration: none;">
                                    Quên mật khẩu?
                                </a>
                            </div>
                            <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn"
                                    style="width: 100%; height: 55px; flex-shrink: 0; border-radius: 5px; margin-top: 22px; font-family: 'Lato', sans-serif; font-weight: bold;
                                          background: linear-gradient(90deg, #FBC250 0%, #DEA143 24.48%, #F5AE5D 50%, #DE8C49 77.08%, #E0793F 100%)">
                                Đăng nhập
                            </button>
                            <div class="form-check" style="color: #333333; font-size: 14px; font-family: 'Lato', sans-serif; font-style: normal; font-weight: 400; line-height: 22.4px; text-align: center;">
                                <span class="desktop-text">Chưa có tài khoản?
                                    <a href="{{ route('register.index') }}" class="text-primary" style="color: #E0793F !important; text-decoration: none;">Đăng ký ngay</a>
                                </span>
                                <span class="mobile-text">Chưa có tài khoản?
                                    <a href="{{ route('register.index') }}" class="text-primary" style="color: #E0793F !important; text-decoration: none; margin-bottom: 10px"><br>Đăng ký ngay</a>
                                </span>
                            </div>
                            <style>
                                @media only screen and (max-width: 767px) {
                                    .desktop-text {
                                        display: none;
                                    }
                                    .mobile-text {
                                        display: inline-block;
                                    }
                                }

                                @media only screen and (min-width: 600px) {
                                    .desktop-text {
                                        display: inline-block;
                                    }
                                    .mobile-text {
                                        display: none;
                                    }
                                }
                            </style>
                        </x-form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- Start Footer -->
    <footer class="footer" style="border-top: none; width: 100%; background: #F3F3ED; position: fixed; bottom: 0;">
        @include('viewsCustom.layout.include.footer')
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
