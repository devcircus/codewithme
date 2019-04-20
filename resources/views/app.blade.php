<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/scss.css') }}" rel="stylesheet">

    <!-- Include Laravel routes via JS -->
    @routes
</head>

<body class="font-sans leading-none text-grey-900 antialiased">
    <div id="app" data-component="{{ $page['component'] }}" data-props="{{ json_encode((object) $page['props']) }}" data-page="{{ json_encode((object) $page) }}"></div>

    <!-- Site Scripts -->
    <script src="{{ asset('js/js.js') }}"></script>
</body>

</html>