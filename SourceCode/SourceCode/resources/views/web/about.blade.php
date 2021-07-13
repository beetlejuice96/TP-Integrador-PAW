@extends('layouts.layout')
@section('location')
    About
@endsection
@section('public')
    <link href="{{ asset('css/about.css') }}" rel="stylesheet">
@endsection
@section('content')

         <section class="card-about">
            <h2 class="card-titulo">¿Quiénes somos?</h2>
            <p id="description">
                Somos Agentes oficiales Renault hace más de 25 años, capacitados para asegurar el funcionamiento de tu vehículo y evitar posibles pérdidas de garantía.
            </p>
         </section>
          <section  class="card-about">
              <h2  class="card-titulo">Nuestra vision</h2>
              <p>
                  Nos interesa brindar a nuestros clientes toda la tranquilidad y seguridad necesaria a la hora de confiarnos el mantenimiento y reparación de su Renault.
              </p>
          </section>
          <section  class="card-about">
              <h2  class="card-titulo">Nuestro trabajo</h2>
              <p>
                  Trabajamos de manera rápida y eficiente, poniendo a tu disposición todas las facilidades que necesitás. No importa la tarea a realizar o la antigüedad de tu vehículo, nuestro equipo te aconsejará ofreciéndote repuestos originales de la más alta calidad y soluciones a tu medida.
              </p>
          </section>
        <hr class="">
        <img src="" alt="imagenMechanic1">
        <img src="" alt="imagenMechanic2">
        <img src="" alt="imagenMechanic3">

@endsection
