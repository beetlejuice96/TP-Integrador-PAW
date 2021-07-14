@extends('layouts.layout')

@section('location')
Administrador
@endsection

@section('content')
    <section>
        <h1>Parametros de configuracion</h1>
        <form action="" method="">
            <button id="send-button" type="submit">Guardar</button>
            <button id="upt-button" type="button" >Modificar</button>
            <button id="cancel-button" type="button">Cancelar</button>

            <!--aca deberia ir un for-->
            <label for="backup-extension">
                <input name="backup-extension" id="backup-extension" type="text" value="">
            </label>

            <label for="dbf-clientes-name">
                <input name="dbf-clientes-name" id="dbf-clientes-name" type="text" value="">
            </label>

            <label for="dbf-detalles-name">
                <input name="dbf-detalles-name" id="dbf-detalles-name" type="text" value="">
            </label>

            <label for="dbf-file-path">
                <input name="dbf-file-path" id="dbf-file-path" type="text" value="">
            </label>

            <label for="dbf-trabajos-name">
                <input name="dbf-trabajos-name" id="dbf-trabajos-name" type="text" value="">
            </label>

            <label for="dbf-vehiculos-name">
                <input name="dbf-vehiculos-name" id="dbf-vehiculos-name" type="text" value="">
            </label>

            <label for="log-level">
                <input name="log-level" id="log-level" type="text" value="">
            </label>

            <label for="log-path">
                <input name="log-path" id="log-path" type="text" value="">
            </label>

            <label for="moderated-emails">
                <input name="moderated-emails" id="moderated-emails" type="text" value="">
            </label>

            <label for="only-historical-record">
                <input name="only-historical-record" id="only-historical-record" type="text" value="">
            </label>

            <label for="rango-izq-clientes">
                <input name="rango-izq-clientes" id="rango-izq-clientes" type="text" value="">
            </label>

            <label for="rango-izq-detalles">
                <input name="rango-izq-detalles" id="rango-izq-detalles" type="text" value="">
            </label>

            <label for="rango-izq-trabajos">
                <input name="rango-izq-trabajos" id="rango-izq-trabajos" type="text" value="">
            </label>

            <label for="rango-izq-vehiculos">
                <input name="rango-izq-vehiculos" id="rango-izq-vehiculos" type="text" value="">
            </label>

            <label for="verify-modifications-timer">
                <input name="verify-modifications-timer" id="verify-modifications-timer" type="text" value="">
            </label>
        </form>
    </section>
@endsection
