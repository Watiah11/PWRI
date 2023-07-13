<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets_landing/logo.png' ) }}" rel="icon">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') PWRI</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_landing/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_landing/css/register.css') }}">
    <link href="{{ asset('assets_landing/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_landing/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets_landing/css/hero.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_landing/css/otp.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_landing/css/loaders.css') }}">
    <link href="{{ asset('assets_landing/vendor/jquery-toast-plugin/dist/jquery.toast.min.css') }}" rel="stylesheet"
        type="text/css">

        <style>
        * {
            font-family: 'Roboto', sans-serif !important;
        }
    </style>
</head>
<body>
    
   
    @yield('contents')
    
    <script src="{{ asset('assets_landing/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets_landing/vendor/sweetalert/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets_landing/vendor/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>
    @if (session()->has('success'))
        <script>
            $.toast({
                heading: 'Berhasil',
                text: '{{ session()->get('success') }}',
                position: 'top-right',
                loaderBg: '#88c241',
                class: 'jq-toast-primary',
                hideAfter: 9500,
                stack: 6,
                showHideTransition: 'fade'
            });
        </script>
    @endif
    @if (session()->has('failed'))
        <script>
            $.toast({
                heading: 'Gagal',
                text: '{{ session()->get('failed') }}',
                position: 'top-right',
                loaderBg: '#b91c1c',
                class: 'jq-toast-warning',
                hideAfter: 9500,
                stack: 6,
                showHideTransition: 'fade'
            });
        </script>
    @endif
    @yield('script-js')
</body>
</html>
    <!-- Sweetalert JS -->