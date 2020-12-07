@extends('layouts.layout')
@section('location')
    Reset Password
@endsection

@section('content')

    <form action="" method="POST">
        <label for="email">Correo Electrónico</label>
        <input id="email" type="email"   name="email"  required autocomplete="email" autofocus>

        <label for="password" >Contraseña</label>
        <input id="password" type="password" name="password" required autocomplete="new-password">

        <label for="password-confirm" >Confirmar Contraseña</label>
        <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">

    </form>

@endsection
