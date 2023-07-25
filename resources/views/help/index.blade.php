@extends('help.layout.help')

@section('content')

    <div class="card-body">
        <p class="card-description">Danh Mục </p>

        <div class="template-demo">
            <button type="button" class="btn btn-fw ">
                <div class="icons-center">
                    <i>
                        <img src="{{ asset('icon/indexPrivacyTutorial6.svg') }}" width="35px" height="35px"/>
                    </i>
                </div>
                <a>Giới thiệu</a><a></a>
            </button>

            <button type="button" class="btn btn-fw" id="privacyButton">
                <div>
                    <i>
                        <img src="{{ asset('icon/indexPrivacyTutorial5.svg') }}" width="35px" height="35px"/>
                    </i>
                </div>
                <a>Chính sách & Điều khoản</a><a></a>
            </button>

            <button type="button" class="btn btn-fw">
                <div>
                    <i>
                        <img src="{{ asset('icon/indexPrivacyTutorial4.svg') }}" width="35px" height="35px"/>
                    </i>
                </div>
                <a>Hướng dẫn sử dụng web</a><a></a>
            </button>

            <button type="button" class="btn btn-fw">
                <div>
                    <i>
                        <img src="{{ asset('icon/indexPrivacyTutorial3.svg') }}" width="35px" height="35px"/>
                    </i>
                </div>
                <a>Khuyến mãi & Ưu đãi</a><a></a>
            </button>

            <button type="button" class="btn btn-fw">
                <div>
                    <i>
                        <img src="{{ asset('icon/indexPrivacyTutorial2.svg') }}" width="35px" height="35px"/>
                    </i>
                </div>
                <a>Thanh toán</a><a></a>
            </button>

            <button type="button" class="btn btn-fw">
                <div>
                    <i>
                        <img src="{{ asset('icon/indexPrivacyTutorial1.svg') }}" width="35px" height="35px"/>
                    </i>
                </div>
                <a>Trả hàng & Hoàn Tiền</a><a></a>
            </button>
        </div>
    </div>

    <style>
        .btn-fw:hover {
            border: 1px solid red;
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            line-height: 1;
            color: #343a40;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid rgba(81, 81, 81, 0.5);
            padding: 0.875rem 2.5rem;
            font-size: 0.875rem;
            border-radius: 0.1875rem;
            -webkit-transition: color 0.15s ease-in-out,
            background-color 0.15s ease-in-out, border-color 0.15s ease-in-out,
            -webkit-box-shadow 0.15s ease-in-out;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out,
            border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out,
            border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out,
            border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out,
            -webkit-box-shadow 0.15s ease-in-out;
        }

        .template-demo i img {
            -webkit-flex-direction: column;
            flex-direction: column;
            float: left;
        }

        @media (max-width: 1990px) {


            .template-demo a {
                font-family: "Lato", sans-serif;
            }

            .template-demo {
                display: grid;
                grid-template-columns: 25% 25% 25% 25%;
                padding-left: 12%;
            }

            .card-body {
                padding-top: 3%;
                width: calc(100% - 260px);
            }

            .card-description {
                color: #303030;
                font-family: Lato;
                font-size: 24px;
                font-style: normal;
                font-weight: 700;
                line-height: normal;
                padding-left: 12%;
            }

            .template-demo a {
                color: #565656;
                font-size: 16px;
                font-style: normal;
                font-weight: 600;
                line-height: normal;
                padding-left: 13px;
                text-align: left;
                float: left;
            }

            .card-body {
                -webkit-box-flex: 1;
                -ms-flex: 1 1 auto;
                flex: 1 1 auto;
                padding: 1rem 1rem;
            }

            .btn.btn-fw {
                box-sizing: border-box;
                display: flex;
                align-items: center;
                float: left;
                overflow: hidden;
                padding: 15px 20px;
                margin-right: 10px;
                margin-bottom: 10px;
                cursor: pointer;
                width: 345px;
                height: 82px;
            }

            .content-wrapper {
                width: 104%;
            }
        }

        @media (max-width: 1290px) {

            .btn.btn-fw {
                width: 240px;
                height: 72px;
            }

            .content-wrapper {
                width: 115%;
            }
            .card-description {
                padding-left: 7%;
            }
            .template-demo {
                padding-left: 7%;
            }
        }

        @media (max-width: 1030px) {
            .content-wrapper {
                width: 168%;
            }

            .btn.btn-fw {
                width: 210px;
                height: 72px;
            }

            .template-demo {
                display: grid;
                grid-template-columns: 25% 25% 25% 25%;
                padding-left: 25px;
            }

            .card-body {
                width: calc(100% - 260px);
            }

            .card-description {
                padding-left: 25px;
            }
        }

        @media (max-width: 913px) {
            .content-wrapper {
                width: 128%;
            }

            .template-demo {
                display: grid;
                grid-template-columns: 33% 33% 33%;
                padding-left: 40px;
            }

            .btn.btn-fw {
                width: 240px;
                height: 70px;
            }

            .card-description {
                padding-left: 40px;
            }
        }

        @media (max-width: 821px) {
            .content-wrapper {
                width: 138%;
            }

            .template-demo {
                display: grid;
                grid-template-columns: 33% 33% 33%;
                padding-left: 0px;
            }

            .btn.btn-fw {
                width: 240px;
                height: 70px;
            }

            .card-description {
                padding-left: 0px;
            }
        }

        @media (max-width: 780px) {
            .content-wrapper {
                width: 128%;
            }

            .template-demo {
                display: grid;
                grid-template-columns: 33% 33% 33%;
                padding-left: 40px;
            }

            .card-body {
                width: calc(100% - 260px);
            }

            .card-description {
                padding-left: 40px;
            }
        }

        @media (max-width: 768px) {
            .content-wrapper {
                width: 138%;
            }

            .template-demo {
                display: grid;
                grid-template-columns: 33% 33% 33%;
                padding-left: 0px;
            }

            .btn.btn-fw {
                width: 220px;
                height: 70px;
            }

            .card-description {
                padding-left: 0px;
            }
        }

        @media (max-width: 541px) {
            .content-wrapper {
                width: 153%;
            }

            .template-demo {
                display: grid;
                grid-template-columns: 50% 50%;
                padding-left: 5px;
            }

            .btn.btn-fw {
                width: 225px;
                height: 70px;
            }

            .card-description {
                padding-left: 5px;
            }
        }

        @media (max-width: 420px) {

            .content-wrapper {
                width: 170%;
            }

            .template-demo {
                display: grid;
                grid-template-columns: 50% 50%;
                padding-left: 0px;
            }

            .template-demo a {
                font-size: 13px;
            }

            .btn.btn-fw {
                width: 180px;
                height: 50px;
            }

            .template-demo i img {
                width: 25px;
                height: 25px;
            }

            .btn.btn-fw {
                padding: 10px 10px;
            }

            .card-body {
                padding: 0px;
                width: calc(100% - 260px);
            }

            .card-description {
                font-size: 18px;
                padding-left: 0px;
            }
        }

        @media (max-width: 415px) {
            .nav-profile-text p {
                font-size: 14px;
            }

            .content-wrapper {
                width: 165%;
            }

            .template-demo {
                display: grid;
                grid-template-columns: 50% 50%;
                padding-left: 15px;
            }

            .template-demo a {
                font-size: 13px;
            }

            .btn.btn-fw {
                width: 165px;
                height: 50px;
            }

            .template-demo i img {
                width: 25px;
                height: 25px;
            }

            .btn.btn-fw {
                padding: 10px 10px;
            }

            .card-body {
                padding: 0px;
                width: calc(100% - 260px);
            }

            .card-description {
                font-size: 18px;
                padding-left: 15px;
            }
        }

        @media (max-width: 395px) {
            .nav-profile-text p {
                font-size: 14px;
            }

            .content-wrapper {
                width: 175%;
            }

            .template-demo {
                display: grid;
                grid-template-columns: 50% 50%;
                padding-left: 0px;
            }

            .template-demo a {
                font-size: 13px;
            }

            .btn.btn-fw {
                width: 170px;
                height: 50px;
            }

            .template-demo i img {
                width: 25px;
                height: 25px;
            }

            .btn.btn-fw {
                padding: 10px 10px;
            }

            .card-body {
                padding: 0px;
                width: calc(100% - 260px);
            }

            .card-description {
                font-size: 18px;
                padding-left: 0px;
            }
        }

        @media (max-width: 376px) {
            .content-wrapper {
                width: 176%;
            }

            .btn.btn-fw {
                width: 165px;
                height: 50px;
            }
        }

        @media (max-width: 361px) {
            .nav-profile-text p {
                font-size: 12px;
            }

            .content-wrapper {
                width: 178%;
            }

            .btn.btn-fw {
                width: 155px;
                height: 50px;
            }
        }

        @media (max-width: 281px) {
            .nav-profile-text p {
                font-size: 10px;
            }

            .content-wrapper {
                width: 150%;
            }

            .template-demo {
                display: grid;
                grid-template-columns: 100%;
                padding-left: 10px;
            }

            .btn.btn-fw {
                width: 240px;
                height: 50px;
            }

            .card-description {
                padding-left: 10px;
            }
        }
    </style>

    <script>
        document.getElementById("privacyButton").addEventListener("click", function() {
            var slug = "{{ $listPrivacy->first()->slug }}";
            window.location.href = "{{ route('privacy.detail', ['slug' => ':slug']) }}".replace(':slug', slug);
        });
    </script>

@endsection
