@extends('layouts.layout')
@section('public')
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
@endsection
@section('location')
    Registrarse
@endsection
@section('content')
    <form action="" method="POST" class="form-register">
        <section class="card-register">


            <!--<label for="dni">DNI</label>-->
            <input type="dni" id="dni" class="input-login" placeholder="NRO DNI" required autocomplete="dni" autofocus>

            <!-- <label for="name">Nombre</label>-->
             <input type="text" id="name" placeholder="Nombre" name="name" class="input-login"  required autocomplete="nombre">

            <!-- <label for="apellido">Apellido</label>-->
             <input type="text" id="apellido" name="apellido" placeholder="Apellido" class="input-login"   required autocomplete="apellido">

            <!-- <label for="email" >Correo Electrónico</label>-->
             <input id="email"  name="email" value="email" class="input-login" placeholder="example@gmail.com" required autocomplete="email">

             <!--<label for="password" >Contraseña</label>-->
             <input id="password" type="password" name="password" class="input-login" placeholder="Contraseña" required autocomplete="new-password">

             <!--<label for="password-confirm" >Confirmar contraseña</label>-->
             <input id="password-confirm" type="password"  class="input-login" placeholder="Confirmar contraseña" name="password_confirmation" required autocomplete="new-password">

             <!--<label for="tipo_dni">Tipo DNI</label>-->
             <!--da que vaya un select?-->
             <!--capas jodan con autocompletado-->
             <select name="tipo_dni" id="tipo_dni"  class="input-login" required autofocus>
                <!--aca se llena de forma dinamica.-->
                <option value="value1">DNI</option>

             </select>

             <button type="submit" class="buttonCTA buttonCTA-Primary">Registrar</button>
        </section>
     </form>
@endsection
