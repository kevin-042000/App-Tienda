<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/resources/css/app.scss"/>
    @vite(['resources/css/app.scss'])
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-secondary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tienda Web</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown link
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li> --}}

                    {{-- Opcion para administradores solo cuando tienen el rol ADM --}}
                    @if(auth()->check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.panel') }}">Panel Administrador</a>
                        </li>
                    @endif
                    {{-- fin de la opcion de ADM --}}
                </ul>
            </div>
    
            <!-- Agregar ml-auto para empujar los elementos hacia la derecha -->
            <div class="ml-auto">
    
                <!-- Botón de cierre de sesión (puedes cambiar el enlace según tus necesidades) -->
                @if(auth()->check())
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-light">
                        Cerrar sesion {{ auth()->user()->name }}
                    </button>
                </form>
            @endif
            </div>
        </div>
    </nav>
    


    @vite('resources/js/app.js')
</body>
</html>