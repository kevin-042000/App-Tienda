@extends('layouts.archivos_base.base')

@section('title', 'Adm Panel')
    
@section('content')
{{-- Navbar --}}
@include('layouts._partials.navbar')
<div class="content-fondo-panel-adm">
    <div class="content-panel-adm">
        <a href="{{ route('view.roles') }}">Roles</a>
        <a href="">Registro Usuarios</a>
        <a href="">Subir Producto</a>
        <a href="">Opcion</a>
        <a href="">Opcion</a>
        <a href="">Opcion</a>
        <a href="">Opcion</a>
        <a href="">Opcion</a>
        <a href="">Opcion</a>
    </div>
</div>
@endsection