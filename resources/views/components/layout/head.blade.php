<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="X-TOKEN" content="{{ csrf_token() }}">
<meta name="currency" content="{{ config('custom.currency.unit') }}">
<meta name="position_currency" content="{{ config('custom.currency.position') }}">
<title>@yield('title', $settings['site_name'])</title>
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/logo.png') }}" />
<link rel="stylesheet" href="{{ asset('libs/bootstrap/css/bootstrap.min.css') }}"/>
<link href="{{ asset('libs/jquery-toast-plugin/jquery.toast.min.css') }}" rel="stylesheet"type="text/css">

@stack('libs-css')
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/css/header.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/css/home.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/css/user_info.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/css/rating.css') }}"/>

@stack('custom-css')
