@extends('layouts.archivos_base.base')

@section('title', 'Registro')
    
@section('content')
    <div class="content-ingreso">

        
        <form class="form-ingreso" method="POST" action="{{ route('register') }}">
            @csrf

            <h5>Registro</h5>
            
            <input type="text" id="name" name="name" placeholder="Nombre" required>
    
            <input type="email" id="email" name="email" placeholder="Correo Electrónico" required>
        
            <input type="password" id="password" name="password" placeholder="Contraseña" required>
        
            <button type="submit">Registrarse</button>

        </form>
    </div>
@endsection