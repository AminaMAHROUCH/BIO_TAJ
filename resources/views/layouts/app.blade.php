<!doctype html>
<html lang="rtl" class="no-js">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{ asset('files/css/normalize.css') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('files/css/main.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('files/css/bootstrap.min.css') }}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('files/css/all.min.css') }}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('files/fonts/flaticon.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('files/css/animate.min.css') }}">
    <!-- Custom CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('AdminLte3/style.css') }}"> --}}
    <!-- Modernize js -->
    <script src="{{ asset('files/js/modernizr-3.6.0.min.js') }}"></script>
    <title>CENTRE TAJ DES SOINS NATURELS </title>
</head>

<body style="direction: rtl; background: #e1e3f2;" >
    <div id="app">

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<script src="{{ asset('files/js/jquery-3.3.1.min.js') }}"></script>
<!-- Plugins js -->
<script src="{{ asset('files/js/plugins.js') }}"></script>
<!-- Popper js -->
<script src="{{ asset('files/js/popper.min.js') }}"></script>
<!-- Bootstrap js -->
<script src="{{ asset('files/js/bootstrap.min.js') }}"></script>
<!-- Scroll Up Js -->
<script src="{{ asset('files/js/jquery.scrollUp.min.js') }}"></script>
<!-- Custom Js -->
<script src="{{ asset('files/js/main.js') }}"></script>

</html>