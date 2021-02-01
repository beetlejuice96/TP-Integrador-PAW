<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }} - @yield('location')</title>

    <!--PREGUNTAR PA QUE MIERDA ESTA-->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}?v2" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


    @yield('publics')

</head>

<body>
<header>
    <h1><img src="" alt="Enterprise Logo" > Enterprise Name</h1>
    <nav>
        <ul>
            <!--cargar-->
        </ul>
    </nav>
</header>

<main>
    <header>
        <h1>
            @yield('location')
        </h1>
    </header>
    @yield('content')
</main>

</body>
<hr >
<footer>
    <address>
        <h5>About us</h5>
        <P>Tel : XXX-XXX-XXX </P>
        <P>Email : <a href="mailto:webmaster@example.com">webmaster@example.com</a>.</P>
        <P>Calle no se me ocurre al 1983, Luján</P>

    </address>

    <ul>
        <li><a href="https://www.instagram.com">Instagram</a></li>
        <li><a href="https://www.facebook.com">Facebook</a></li>
        <li><a href="https://www.whatsapp.com">Whatsapp</a></li>
    </ul>

</footer>
</html>
