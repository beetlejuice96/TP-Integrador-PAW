@extends('layouts.layout')
@section('location')
    Contacto
@endsection

@section('content')

    <form action="" method="POST">
        <label for="fname">Nombre</label>
        <input type="text" name="nombre" class="" id="fname" required>

        <label for="lname">Apellido</label>
        <input type="text" name="apellido" class="" id="lname" required>

        <label for="email">Correo Electrónico</label>
        <input type="email" name="email" class="" id="email" required>

        <label for="textConsult">Escriba aquí su consulta</label>
        <textarea class="" name="mensaje" id="textConsult" rows="3" required></textarea>

        <button type="submit" class="">Enviar</button>
    </form>

@endsection
