<div class="container-fluid d-flex justify-content-between">
    <!-- <span class="text-muted col-8 d-block text-center text-sm-start d-sm-inline-block" style="text-align: left !important;background-color: #f3f3ED;"> -->

        <!-- <a href="#" style="color: #A6A4A4; display: inline-flex; align-items: center; gap: 12px;margin-right: 12px; text-decoration: none;z-index: 999;">Điều khoản và điều kiện giao dịch</a> -->
        <!-- <a href="#" style="color: #A6A4A4; display: inline-flex; align-items: center; gap: 12px; text-decoration: none;z-index: 999;">Chính sách thanh toán</a> -->

    <span class="text-muted col-8 d-block text-center text-sm-start d-sm-inline-block " id="title-footer"
          style="text-align: left !important;">
        <a href="{{ route('privacy.index') }}"
           style="color: #A6A4A4; display: inline-flex; align-items: center; gap: 12px; margin-right: 12px; text-decoration: none;">
            Trợ giúp
        </a>
{{--        <a href="{{ route('privacy.index') }}"--}}
{{--           style="color: #A6A4A4; display: inline-flex; align-items: center; gap: 12px; text-decoration: none;">--}}
{{--            Chính sách & Điều khoản--}}
{{--        </a>--}}
    </span>

    {{-- Logo --}}
    <span class="float-none float-sm-end mt-1 mt-sm-0 text-end repon"
          style="color: #A6A4A4; display: inline-flex; align-items: flex-start; gap: 15px; padding-right: 8%">
        <a href="https://www.facebook.com/groups/shopee.tittok.facebcok">
            <img src="{{ asset('icon/facebook.svg') }}" alt="facebook"/>
        </a>
        <a href="mailto:oiio@gmail.com">
            <img src="{{ asset('icon/mail.svg') }}" alt="mail"/>
        </a>
        <a href="mailto:oiio@gmail.com">
            <img src="{{ asset('icon/zalo.svg') }}" alt="mail"/>
        </a>
        <a href="tel:0934584939">
            <img src="{{ asset('icon/phone.svg') }}" alt="phone"/>
        </a>
        <a href="https://goo.gl/maps/QtHyGd3ui5J9fPTr7">
            <img src="{{ asset('icon/compass.svg') }}" alt="compass"/>
        </a>
    </span>
</div>
<style>
    @media (max-width:391px){
        #title-footer{
           display:block;
        }
        .repon{
            margin:auto;
            padding:auto;
        }
    }
</style>
