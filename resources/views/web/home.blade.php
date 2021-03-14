@extends('layouts.layout')

<!--location-->
@section('location')
    Home
@endsection

@section('public')
    <script src="js/Carousel.js"></script>
@endsection

@section('content')

    @if (session('user-logueado'))
        <div class="alert-login">
            {{ session('user-logueado') }}
            <button type="button">
                <span>x</span>
            </button>
        </div>
    @endif
    <!--FALTA CAROUSEL-->


    <!--Three columns of text below the carousel-->
    <ul>
        <li class="home-card">
            <!--fALTA IMAGEN-->
            <p class="home-card-title">Saca tu turno!</p>
            <p class="home-card-text">No esperes más. Vení con nosotros</p>
            <a href="" class="buttonCTA buttonCTA-Primary home-card-link">Solicitar</a>
        </li>

        <li class="home-card">
            <!--fALTA IMAGEN-->
            <p class="home-card-title">Service Oficial</p>
            <p class="home-card-text">Consultar servicios ofrecidos</p>
            <a href="" class="buttonCTA buttonCTA-Secondary home-card-link">Ver servicios</a>
        </li>

        <li class="home-card">
            <p class="home-card-title">Contactanos</p>
            <p class="home-card-text">Elegí el medio que prefieras y despejá tus dudas</p>
            <a  href="" class="buttonCTA buttonCTA-Secondary home-card-link"> Enviar mensaje</a>
        </li>
    </ul>

    <!-- START THE FEATURETTES -->
    <!--NO SE SI SON ARTICLE PERO SE ME HIZO LO MAS FAMILIAR PARA ESTO-->

    <article class="home-article home-article-first">
        <h2>Consecionario oficial Renault.</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio veniam iusto distinctio exercitationem est incidunt architecto sint! Nulla atque hic quod</p>
        <img src="{{asset("/images/Article1.jpg")}}" alt="">
    </article>

    <article class="home-article home-article-second">
        <h2>Servicio de post venta garantizado.</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio veniam iusto distinctio exercitationem est incidunt architecto sint! Nulla atque hic quod</p>
        <img src="{{asset("/images/Article1.jpg")}}" alt="">
    </article>

@endsection
