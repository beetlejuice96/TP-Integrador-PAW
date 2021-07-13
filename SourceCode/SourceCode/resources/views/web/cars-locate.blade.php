@extends('layouts.layout')
@section('location')
    Locate
@endsection

@section('content')
    <h1>Agregar/localizar vehículo</h1>

    <form class="" action="" method="post">
        <label for="PATENTE">Patente</label>
        <input name="PATENTE" type="text" class="" id="PATENTE" value='' required>

        <label for="ANIO">Año</label>
        <input name="ANIO" type="text" class="" id="ANIO" value=''>

        <label for="MARCA">Marca</label>
        <input name ="MARCA" type="text" class="" id="MARCA" value=''>

        <label for="MODELO">Modelo</label>
        <input name ="MODELO" type="text" class="" id="MODELO" value=''>

        <label for="VIN">VIN</label>
        <input name="VIN" type="text" class="" id="VIN" value=''>

        <label for="NUMERO_MOTOR">Número de motor</label>
        <input name="NUMERO_MOTOR" type="text" class="" id="NUMERO_MOTOR" value=''>
        
        <button type="submit"> Enviar</button>


    </form>
@endsection
