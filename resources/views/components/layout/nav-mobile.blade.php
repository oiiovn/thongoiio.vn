<button style="margin-left: auto;" class="navbar-toggler d-desktop-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenuMobile" aria-controls="offcanvasMenuMobile">
    <span style="width:25px;height:25px;" class="navbar-toggler-icon"></span>
</button>
<div class="offcanvas offcanvas-end d-desktop-none" style="width: 70%;" tabindex="-1" id="offcanvasMenuMobile" aria-labelledby="offcanvasMenuMobileLabel">
    <div class="offcanvas-header d-mobi-none">
        @if (auth()->check())
        <p class="offcanvas-title" id="offcanvasMenuMobileLabel">
            <!-- <span>
                <img class="rounded-circle shadow-sm bg-body-tertiary rounded" src="{{ asset(auth()->user()->getAvatar()) }}" width="35px" />
            </span>
            <span>{{ auth()->user()->fullname }}</span> -->
        </p>
        @endif
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body"></div>
</div>