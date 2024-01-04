@extends('layouts.archivos_base.base')

@section('title', 'Login')
    
@section('content')
<div class="content-ingreso">
 
    <form class="form-ingreso" method="POST" action="{{ route('login') }}">
        @csrf

        <h5>Inicio</h5>

        <input type="email" id="email" name="email" placeholder="Correo Electrónico" required>
    
        <input type="password" id="password" name="password" placeholder="Contraseña" required>
    
        <button type="submit">Iniciar sesion</button>

        <p>¿No estás registrado? <a href="{{ route('view.register') }}">Registrarse</a></p>
    
    </form>
</div>
@endsection