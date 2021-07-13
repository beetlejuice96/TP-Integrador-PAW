@extends('layouts.layout')

@section('location')
    Mi Perfil
@endsection

@section("content")
    <h1>Datos personales</h1>
    <button type="button" id="boton-modificar">Modificar</button>

    <form action="" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
        <fieldset disabled>
            <label for="name">
                <input type="text" id="name" name="name" placeholder="Nombre" required>
            </label>
            <label for="lastname">
                <input type="text" id="lastname" name="lastname" placeholder="Apellido" required>
            </label>
            <label for="tdoc">
                <select id="tdoc" name="tdoc" class="form-control" required>
                <!--TODO esto se genera con js o for de blade-->
                </select>
            </label>
            <label for="ndoc">
                <input type="number" id="ndoc" name="ndoc" placeholder="Nro Documento" required>
            </label>
            <label for="born">
                <input type="date" id="born" name="born" placeholder="yyyy-mm-dd" required>
            </label>
            <label for="email">
                <input type="email" id="email" name="email" placeholder="email" required >
            </label>
            <label for="direccion">
                <input type="text" id="direccion" name="direccion" placeholder="Direccion" required>
            </label>
            <label for="numero">
                <input type="number" name="numero" id="numero" placeholder="Numero" required>
            </label>
            <label for="localidad">
                <input type="text" name="localidad" id="localidad" placeholder="Localidad" required>
            </label>

            <label for="pais">
                <!--TODO cambiar esto por algo que le de a elegir paises-->
                <input type="text"  id="pais" name="pais" placeholder="Pais" required>
            </label>

            <label for="telefono">
                <input type="text" id="telefono" name="telefono"  placeholder="Telefono" required>
            </label>
            <label for="cp">
                <input type="text" id="cp" name="cp" required>
            </label>

            <button type="submit" >Guardar</button>
            <button type="button" id="boton-cancelar">Cancelar</button>

        </fieldset>

    </form>

@endsection
