@extends('layouts.layout')
@section('location')
    Registrarse
@endsection
@section('content')
    <form action="" method="POST">
        <label for="tipo_dni">Tipo DNI</label>
        <!--da que vaya un select?-->
        <!--capas jodan con autocompletado-->
        <select name="tipo_dni" id="tipo_dni" required autofocus>
            <!--aca se llena de forma dinamica.-->
        </select>

        <label for="dni">DNI</label>
        <input type="dni" id="dni" required autocomplete="dni" autofocus>

        <label for="name">Nombre</label>
        <input type="text" id="name" name="name" required autocomplete="nombre">

        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" name="apellido" required autocomplete="apellido">

        <label for="email" >Correo Electrónico</label>
        <input id="email"  name="email" value="email" required autocomplete="email">

        <label for="password" >Contraseña</label>
        <input id="password" type="password" name="password" required autocomplete="new-password">

        <label for="password-confirm" >Confirmar contraseña</label>
        <input id="password-confirm" type="password"  name="password_confirmation" required autocomplete="new-password">

        <button type="submit">Registrar</button>

    </form>
@endsection
