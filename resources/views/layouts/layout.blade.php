<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }} - @yield('location')</title>


    <!-- Scripts -->
    <script src="{{asset("js/Paw.js")}}"></script>
    <script src="{{ asset('js/Carga.js') }}" ></script>


    <!-- Styles -->
    <!-- <link href="{{ asset('css/style.css').'?'.time() }}" rel="stylesheet"> this disable cache-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


    @yield('public')

</head>

<body>
@include('header.header')

<main>
    <header class="header-main">
        <h1 class="titulo-header-main">
            @yield('location')
        </h1>
    </header>
    @yield('content')
</main>

</body>
<hr >
<footer>
    <address>
        <p class="footer-element">Teléfono: <a class="footer-telephone" href="tel:+542323422137">+52 2323 422137</a></p>
        <P class="footer-element footer-email-paragraph">Email : <a href="mailto:Renault@MechanicSheep.com.ar" class="footer-email">Renault@MechanicSheep.com.ar</a></P>
        <p class="footer-element"> Dirección: <a class="footer-adress" href="http://maps.google.com/?q=MechanicSheep, Lujan, Buenos Aires, Argentina" target="_blank">Santa Sofía 1673, Luján</a></p>
    </address>

    <a href="{{route("contact")}}" class="footer-element footer-link">Contactanos</a>

    <a href="https://www.renault.com.ar" target="_blank" class="footer-element footer-link">Renault Argentina</a>

    <ul class="footer-element social-media">
        <li><a href="https://www.instagram.com" class="instagram">Instagram</a></li>
        <li><a href="https://www.facebook.com" class="facebook">Facebook</a></li>
        <li><a href="https://www.whatsapp.com" class="whatsapp">Whatsapp</a></li>
    </ul>

    <p class="footer-element">Todos los derechos reservados.</p>
    <a href="{{route("terms-and-conditions")}}" class="footer-element footer-link">Términos y Condiciones</a>
    <p class="footer-element">© 2021 Renault MechanicSheep</p>

</footer>
</html>
