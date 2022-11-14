<!doctype html>
<html class="no-js" lang="en">

<head>
     <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Specific Meta
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="glimmer is a modern presentation HTML5 Blog template.">
    <meta name="keywords" content="HTML5, Template, Design, Development, Blog" />
    <meta name="author" content="">

    <!-- Titles
    ================================================== -->
    <title>House Rent | Home 01</title>

    <!-- Favicons
    ================================================== -->
{{--
    <link rel="shortcut icon" href="{{asset('assets/images/house-logo.png')}}">
    <link rel="apple-touch-icon" href="{{asset ('assets/images/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" href="{{asset ('images/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" href="{{asset ('images/apple-touch-icon-114x114.png') }}"> --}}

    <!-- Custom Font
    ================================================== -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i%7cPoppins:300,400,500,600,700" rel="stylesheet"> --}}

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{asset ('assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{asset ('assets/css/colors.css') }}">
    <link rel="stylesheet" href="{{asset ('style.css') }}">
    <!-- Modernizr
    ================================================== -->
    {{-- <script src="{{asset ('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script> --}}
</head>
<body>
<!-- Registrar Or Sign In-content -->
<div class="">
    <div class="cd-user-modal-container">
        <ul class="cd-switcher">
            <li><a href="{{ route('login_coustomer') }}">Sign in</a></li>
            <li><a href="{{ route('signup_coustomer') }}">New account</a></li>
        </ul>
        @yield('form')
    </div>
</div>

{{-- <script src="{{asset ('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{asset ('assets/js/plugins.js') }}"></script>
    <script src="{{asset ('assets/js/main.js') }}"></script> <!-- main-js -->
</body> --}}
</html>
