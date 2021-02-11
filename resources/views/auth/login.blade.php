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
            <label for="email">Email
                <input name="email" id="email" type="email" required autofocus>
            </label>

            <label for="password">Password
                <input type="password" name="password" id="password" required>
            </label>

            <button type="submit">Ingresar</button>
            <a href="">¿Olvidaste tu contraseña?</a>
        </form>
    </section>
@endsection

