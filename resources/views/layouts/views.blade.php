<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>35 Años Cory</title>

        <link rel="shortcut icon" type="image/png" href="{{ asset('Cory/favicon.ico') }}"/>

        <!-- Styles -->
        <link href="{{ asset('css/views.css') }}" rel="stylesheet">

    </head>
    <body>

        @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('js/views.js') }}" defer></script>

</body>
</html>
