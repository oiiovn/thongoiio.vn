<script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
    integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
    crossorigin="anonymous"></script> --}}
<script src="{{ asset('libs/jquery-toast-plugin/jquery.toast.min.js') }}"></script>

@stack('libs-js')

<script src="{{ asset('admin/assets/js/setup.js') }}"></script>
<script src="{{ asset('assets/js/setup.js') }}"></script>
<script src="{{ asset('assets/js/province.js') }}"></script>
@stack('custom-js')
