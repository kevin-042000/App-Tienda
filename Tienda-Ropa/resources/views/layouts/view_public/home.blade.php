@extends('layouts.archivos_base.base')

@section('title', 'Home')
    
@section('content')
{{-- se importa el navbar --}}
@include('layouts._partials.navbar')

    <h1>Bienvenidos al home</h1>
@endsection