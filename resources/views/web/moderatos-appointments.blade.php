@extends('layouts.layout')


@section('location')
    Moderación de turnos
@endsection

@section('content')
    <!--TODO podria ser otra cosa en vez de un select-->
    <select name="select-tabla" id="select-tabla">
        <option value="ap-approved">Turnos Confirmados</option>
        <option value="ap-pending" >Turnos Pendientes</option>
        <option value="ap-approved-cancel">Turnos Confirmados - Cancelados</option>
        <option value="ap-pending-cancel"> Turnos pendientes -cancelados</option>
    </select>

    <!--TODO las tablas deberian generarse con js, son muchas-->




@endsection
