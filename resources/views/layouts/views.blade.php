<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>35 Años Cory</title>

        <!-- Styles -->
        <link href="{{ asset('css/views.css') }}" rel="stylesheet">

    </head>
    <body>

        @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
