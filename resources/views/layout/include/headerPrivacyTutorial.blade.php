<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center"
     style="background: #FFFFF0; ">
    {{-- Logo --}}
    <a class="navbar-brand brand-logo" href="{{ route('homepage') }}" style="background: #FFFDF6">
        <img src="{{ asset('icon/logoHeader.png') }}" alt="logo"
             style="display: flex; width: 140px; height: 60px; justify-content: center; align-items: center; flex-shrink: 0;"/>
    </a>
</div>

<div class="navbar-menu-wrapper d-flex align-items-center justify-content-center">
    {{-- Tìm kiếm --}}
    <h2 style="font-size: 22px; font-style: normal; font-weight: 700; line-height: 28.4px; padding-top: 10px;
               background: linear-gradient(
                    90deg,
                    #fbc250 0%,
                    #dea143 24.48%,
                    #f5ae5d 50%,
                    #de8c49 77.08%,
                    #e0793f 100%
                );
               -webkit-background-clip: text;
               -webkit-text-fill-color: transparent;" class="nav__text-supor">
        Trung tâm Hỗ trợ oiio.vn
    </h2>

    <ul class="navbar-nav navbar-nav-right">
        <div class="nav-profile-text">
            <p style="font-family: 'Lato', sans-serif !important;">
                Xin chào, oiio.vn có thể giúp gì cho bạn?
            </p>
        </div>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
    </ul>
</div>

<style>
       @media (max-width: 1980px) {
        .nav-profile-text p {
        font-family: 'Lato', sans-serif;
        font-size: 28px;
        font-style: normal;
        padding-top: 15px;
        font-weight: 700;
        line-height: 28.4px;
        background: linear-gradient(
            90deg,
            #fbc250 0%,
            #dea143 24.48%,
            #f5ae5d 50%,
            #de8c49 77.08%,
            #e0793f 100%
        );
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    }
    
    @media (max-width: 1290px) {
        .nav-profile-text p {
            font-size: 18px;
        }
    }
    @media (max-width: 1025px) {
        .nav-profile-text p {
            font-size: 20px;
        }
        .nav__text-supor {
            display: none;
        }
    }
    @media (max-width: 780px) {
        .nav__text-supor {
            display: none;
        }
    }
    @media (max-width: 540px) {
        .nav-profile-text p {
            font-size: 18px;
        }
    }
    @media (max-width: 420px) {
        .nav-profile-text p {
            font-size: 14px;
        }
    }
    @media (max-width: 361px) {
        .nav-profile-text p {
            font-size: 12px;
        }
    }
    @media (max-width: 281px) {
        .nav-profile-text p {
            font-size: 10px;
        }
       
    }
</style>

