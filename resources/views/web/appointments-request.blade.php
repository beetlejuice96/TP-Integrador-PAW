@extends('layouts.layout')
@section('location')
    Appointment
@endsection

@section('content')
    <h1>Solicitud de turno</h1>

    <form action="" method="POST">
        <label for="myCar">Seleccione un vehículo</label>
        <select name="select_vehiculo" class="" id="myCar" required>

            <!--aca adentro va  un for each-->
        </select>

        <label for="service">Seleccione un servicio</label>
        <select name="select_servicios" class="" id="service" required>

        </select>

        <!--
            no se para que esta esto pero esta en e codigo y en la pagina no
        <label for="problem">Cual es el problema en su auto?</label>
        <textarea name="problem" class="" id="problem" rows="1"></textarea>
        -->

        <label for="time-preference">Seleccione una preferencia horaria *</label>

        <p>aca va una tabla con los horarios, esta armado de una forma rara</p>

        <button type="button" class="" id="buttonAny">Cualquier dia y horario</button>

        <label for="additional_comments">Comentarios/Aclaraciones adicionales</label>
        <textarea name="additional_comments" class="" id="additional_comments" rows="3"></textarea>

        <button type="submit">Solicitar</button>
        <a href="" role="button"> <button type="button" class="">Cancelar</button> </a>

        <hr class="">
        <p>
            *Aclaración: La preferencia que usted seleccione aquí implica que su turno podría ser asignado la fecha más próxima disponible que encontremos
            en alguno de los días y horarios seleccionados.
        </p>

        <p>
            *Podrá cancelar su turno sin penalización hasta 48 hs previas al mismo.
        </p>

    </form>

@endsection
