@extends('layouts.layout')
@section('location')
    Reset Password
@endsection

@section('content')

    <form action="" method="POST" class="card-reset">

        <input id="email" type="email" placeholder="Email" class="input-default" name="email" required autocomplete="email" autofocus>

        <input id="password" type="password" class="input-default" placeholder="Contraseña" name="password" required autocomplete="new-password">

        <input id="password-confirm" type="password" class="input-default" placeholder="Confirmar contraseña" name="password_confirmation" required autocomplete="new-password">

        <button class="buttonCTA buttonCTA-Primary">Reset</button>
    </form>

@endsection
