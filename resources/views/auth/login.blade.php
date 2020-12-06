@extends('layouts.layout')
@section('location')
    Login
@endsection
@section('content')
    <form action="" method="POST">
        <label for="email">Email</label>
        <input name="email" id="email" type="email" required autofocus>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Ingresar</button>
        <a href="">¿Olvidaste tu contraseña?</a>
    </form>
@endsection

