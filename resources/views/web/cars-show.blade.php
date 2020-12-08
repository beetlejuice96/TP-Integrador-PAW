@extends('layouts.layout')
@section('location')
    index Cars
@endsection

@section('content')
    <label for="patente">Patente</label>
    <input type="text" class="" id="patente" disabled value="">
    <label for="VIN">VIN</label>
    <input type="text" class="form-control" id="VIN" value="">
    <label for="anio">Año</label>
    <input type="text" class="" id="anio" value="">
    <label for="nro_motor">Número de motor</label>
    <input type="text" class="" id="nro_motor" value="">
    <label for="modelo">Modelo</label>
    <input type="text" class="" id="modelo" value="">
    <label for="marca">Marca</label>
    <input type="text" class="" id="marca" value="">
  <button type="submit" class="">Guardar</button>
    <a href="" role="button"> <button type="submit" class="">Ver trabajos</button> </a>
@endsection
