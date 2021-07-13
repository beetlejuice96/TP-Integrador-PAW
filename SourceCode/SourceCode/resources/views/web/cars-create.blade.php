@extends('layouts.layout')
@section('location')
    Create Car
@endsection

@section('content')

    <h1>Complete el siguente formulario para crear un vehiculo.</h1>
    <form action="" method="POST">

        <label for="PATENTE">
            Patente
            <input type="text" name="PATENTE" required>
        </label>

        <label for="VIN">
            VIN
            <input type="text" name="VIN" required>
        </label>

        <label for="ANIO">
            Anio
            <input type="text" name="ANIO" required>
        </label>

        <label for="NUMERO_MOTOR">
            Numero motor
            <input type="text" name="NUMERO_MOTOR" required>
        </label>

        <label for="MODELO">
            Modelo
            <input type="text" name="MODELO" required>
        </label>

        <button type="submit">Enviar</button>

    </form>
@endsection
