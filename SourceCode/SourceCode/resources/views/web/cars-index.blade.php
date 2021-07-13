@extends('layouts.layout')
@section('location')
cars
@endsection

@section('content')
    <h1>Mis vehiculos</h1>
    <table id="tableCars" >
        <thead>
        <tr>
            <th scope="col">Patente</th>
            <th scope="col">Año</th>
            <th scope="col">Opciones</th>
            <th scope="col">Turnos</th>
        </tr>
        </thead>
        <tbody>
        <!--ACA IRIA UN FOR EACH O ALGO POR EL ESTILO PARA RELLENAR LA TABLA-->
        </tbody>
    </table>

    <hr>

    <h3>Para agregar un nuevo vehículo presione aquí</h3>
    <!--no se pq ponen el button adentro de un A pero bueno-->
    <a href=""> <button type="button" class="">Agregar</button> </a>
@endsection
