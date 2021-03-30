@extends('layouts.layout')
@section('public')
    <link href="{{ asset('css/contact.css') }}" rel="stylesheet">
@endsection
@section('location')
    Contacto
@endsection

@section('content')

    <form action="" method="POST">
        <label for="fname">Nombre</label>
        <input type="text" name="nombre" class="espacio-inputs input-default" id="fname" required>

        <label for="lname">Apellido</label>
        <input type="text" name="apellido" class="espacio-inputs input-default" id="lname" required>

        <label for="email">Correo Electrónico</label>
        <input type="email" name="email" class="espacio-inputs input-default" id="email" required>

        <!--TODO definir un pattern en el futuro para poder filtrar bien el numero de telefono-->
        <label for="phoneNumber">Numero de celular</label>
        <input type="tel" id="phoneNumber" name="phone" class="espacio-inputs input-default" placeholder="1198786554" required>

        <label for="textConsult">Escriba aquí su consulta</label>
        <textarea  name="mensaje" id="textConsult" rows="4" class="espacio-inputs" required></textarea>

        <button type="submit" class="buttonCTA buttonCTA-Primary" >Enviar</button>
    </form>

@endsection
