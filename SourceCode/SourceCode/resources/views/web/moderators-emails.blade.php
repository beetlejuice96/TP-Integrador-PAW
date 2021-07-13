@extends('layouts.layout')


@section('location')
    Moderación de emails
@endsection


@section("content")
    <h1>Moderacion de correos electronicos</h1>

    <h3>Correo pendiende de envio</h3>
    <table id="email-table">
        <thead>
            <tr>
                <th scope="col">Fecha estimada de aviso</th>
                <th scope="col">Promedio</th>
                <th scope="col">Fecha ultimo trabajo</th>
                <th scope="col">Modelo</th>
                <th scope="col">Marca</th>
                <th scope="col">Cliente</th>
                <th scope="col">Accion</th>
            </tr>
        </thead>
        <tbody>
        <!-- TODO esto deberia hacerse con un for de blade si se puede-->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <form action="" method="POST">
                    <button type="submit">Enviar</button>
                </form>
                <form action="" method="POST">
                    <!--TODO este botonn en la view original tiene un evento en el boton, creo que eso no esta tan bueno hacerlo asi-->
                    <button type="submit">Rechazar</button>
                </form>
            </td>
        </tr>
        </tbody>
    </table>

@endsection
