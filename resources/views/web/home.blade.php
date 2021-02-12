@extends('layouts.layout')

<!--location-->
@section('location')
    Home
@endsection

@section('public')
    <script src="js/Carousel.js"></script>
@endsection

@section('content')
    <!--FALTA CAROUSEL-->


    <!--Three columns of text below the carousel-->
    <ul>
        <li class="home-card">
            <!--fALTA IMAGEN-->
            <p class="home-card-title">Service Oficial</p>
            <p class="home-card-text">Consultar servicios ofrecidos</p>
            <a href="" class="buttonCTA buttonCTA-Secondary home-card-link">Ver servicios</a>
        </li>

        <li class="home-card">
            <!--fALTA IMAGEN-->
            <p class="home-card-title">Saca tu turno!</p>
            <p class="home-card-text">No esperes más. Vení con nosotros</p>
            <a href="" class="buttonCTA buttonCTA-Primary home-card-link">Solicitar</a>
        </li>

        <li class="home-card">
            <p class="home-card-title">Contactanos</p>
            <p class="home-card-text">Elegí el medio que prefieras y despejá tus dudas</p>
            <a  href="" class="buttonCTA buttonCTA-Secondary home-card-link"> Enviar mensaje</a>
        </li>
    </ul>

    <!-- START THE FEATURETTES -->

    <hr >
        <!--NO SE SI SON ARTICLE PERO SE ME HIZO LO MAS FAMILIAR PARA ESTO-->

    <article>
        <h2>El mejor servicio de post venta garantizado.</h2>
        <p>
            Contamos con un equipo de profesionales totalmente capacitado para brindarte la mejor atención.
            ¡El proceso es muy sencillo! Pedí tu turno y listo, ¡ya sos cliente! Luego nosotros nos encargamos de recordar
            las fechas de tus próximos services.
        </p>
        <img src="" alt="imagenDelArticulo">
    </article>


    <hr>

    <article>
        <h2>Concesionaria oficial Renault. Estamos en la ciudad de Luján, Buenos Aires, Argentina.</h2>
        <p>Además de realizar tus services oficiales con nosotros, ofrecemos presupuestos y servicios generales de mecánica.</p>
        <img src="" alt="imagenDelArticulo2">
    </article>

@endsection
