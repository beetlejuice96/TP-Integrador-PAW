@extends('layouts.layout')
@section('location')
    Appointments
@endsection

@section('content')
    <h1 class="">Mis turnos</h1>
    <table id="tableMisTurnos" class="table table-hover table-striped table-bordered tablaTurnos">
        <thead>
        <tr>
            <th scope="col">Fecha Solicitud</th>
            <th scope="col">Fecha Confirmada</th>
            <th scope="col">Estado</th>
            <th scope="col">Vehículo</th>
            <th scope="col">Servicio</th>
            <th scope="col">Acción</th>
        </tr>
        </thead>
        <tbody class="text-center">
            <!--todo lo que esta aca adentro ta lleno de for eachs, creo que no da hacerlo ahora-->



        </tbody>
    </table>


@endsection
