<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/scss.css') }}" rel="stylesheet">
</head>

<body class="font-lato bg-blue-100 h-screen">
    <div id="base-app" class="h-full">
        @yield('content')
    </div>

    <!-- Site Scripts -->
    <script src="{{ asset('js/js.js') }}"></script>
</body>

</html>