@extends('layouts.layout')
@section('public')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@section('location')
    Login
@endsection
@section('content')
    <section class="form-register">

        <form action="" method="POST" class="Card">
            <p class="font-white"> Log in</p>
            <!--<label for="email">Email
            </label>-->
            <input class="input-login" name="email" id="email" type="email" placeholder="Username" required autofocus>

            <!--<label for="password">Password

            </label>-->
            <input class="input-login" type="password" name="password" id="password" placeholder="Password" required>
            <button class="buttonCTA buttonCTA-Primary " type="submit">Ingresar</button>
            <a class="font-white" href="">¿Olvidaste tu contraseña?</a>
        </form>
    </section>
@endsection

