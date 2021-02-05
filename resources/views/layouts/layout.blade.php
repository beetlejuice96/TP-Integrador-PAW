<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }} - @yield('location')</title>

    <!--PREGUNTAR PARA QUE SIRVE ESTE ARCHIVO-->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}?v2" defer></script>

    <!-- Styles -->
    <!-- <link href="{{ asset('css/style.css').'?'.time() }}" rel="stylesheet"> this disable cache-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


    @yield('publics')

</head>

<body>
@include('header.header')

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
        <P class="footer-element">Tel : XXX-XXX-XXX </P>
        <P class="footer-element">Email : <a href="mailto:Renault@MechanicSheep.com.ar" class="footer-email">Renault@MechanicSheep.com.ar</a>.</P>
        <P class="footer-element">Calle no se me ocurre al 1983, Luján</P>
    </address>

    <a class="footer-element footer-link">Contact us</a>

    <a class="footer-element footer-link">Renault Argentina</a>

    <ul class="footer-element social-media">
        <li><a href="https://www.instagram.com" class="instagram">Instagram</a></li>
        <li><a href="https://www.facebook.com" class="facebook">Facebook</a></li>
        <li><a href="https://www.whatsapp.com" class="whatsapp">Whatsapp</a></li>
    </ul>

    <p class="footer-element">Todos los derechos reservados.</p>
    <p class="footer-element footer-link">Términos y Condiciones</p>
    <p class="footer-element">© 2021 Renault MechanicSheep</p>

</footer>
</html>
