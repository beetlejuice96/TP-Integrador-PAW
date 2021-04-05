@extends('layouts.layout')
@section('public')
    <link href="{{ asset('css/login3.css') }}" rel="stylesheet">
@endsection

@section('location')
    Login
@endsection
@section('content')
    @if (session('error'))
        <div >
            {{ session('error') }}
            <button>
                <span>&times;</span>
            </button>
        </div>
    @endif
    <section class="form-register">
        <img src="{{asset("/css/black.jpeg")}}" alt="placeholder" class="logo">
        <form action="{{route('login')}}" method="POST" class="card-login">
            @csrf
            <p class="font-white"> Log in</p>
            <!--<label for="email">Email
                
            </label>-->
            <input class="input-default" name="email" id="email" type="text" placeholder="Username" required autofocus>

            <!--<label for="password">Password

            </label>-->
            <input class="input-default" type="password" name="password" id="password" placeholder="Password" required>
            <button class="buttonCTA buttonCTA-Primary " type="submit">Ingresar</button>
            <button class="button-google" type="submit">Ingresar con google</button>
            <a class="font-white" href="">¿Olvidaste tu contraseña?</a>
        </form>
    </section>
@endsection

