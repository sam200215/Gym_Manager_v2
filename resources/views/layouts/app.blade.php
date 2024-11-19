<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gym Manager Pro') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Gym Manager Pro') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth
                            @if(auth()->user()->hasPermiso('gestionar-roles'))
                                <!-- Menú de Administración -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-cog"></i> Administración
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('rols.index') }}">
                                                <i class="fas fa-user-tag"></i> Roles</a></li>
                                        <li><a class="dropdown-item" href="{{ route('permisos.index') }}">
                                                <i class="fas fa-key"></i> Permisos</a></li>
                                        <li><a class="dropdown-item" href="{{ route('rolporpermisos.index') }}">
                                                <i class="fas fa-users-cog"></i> Roles y Permisos</a></li>
                                    </ul>
                                </li>
                            @endif

                            <!-- Menú de Clientes -->
                            @if(auth()->user()->hasPermiso('gestionar-clientes') || auth()->user()->hasPermiso('ver-clientes'))
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-users"></i> Clientes
                                    </a>
                                    <ul class="dropdown-menu">
                                        @if(auth()->user()->hasPermiso('gestionar-clientes'))
                                            <li><a class="dropdown-item" href="{{ route('clientes.index') }}">
                                                    <i class="fas fa-user"></i> Gestionar Clientes</a></li>
                                            <li><a class="dropdown-item" href="{{ route('membresias.index') }}">
                                                    <i class="fas fa-id-card"></i> Membresías</a></li>
                                        @endif
                                        @if(auth()->user()->hasPermiso('ver-clientes'))
                                            <li><a class="dropdown-item" href="{{ route('clientes.index') }}">
                                                    <i class="fas fa-list"></i> Ver Clientes</a></li>
                                        @endif
                                    </ul>
                                </li>
                            @endif

                            <!-- Menú de Empleados -->
                            @if(auth()->user()->hasPermiso('gestionar-empleados'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('empleados.index') }}">
                                        <i class="fas fa-user-tie"></i> Empleados</a>
                                </li>
                            @endif

                            <!-- Menú de Pagos -->
                            @if(auth()->user()->hasPermiso('gestionar-pagos') || auth()->user()->hasPermiso('ver-pagos'))
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-money-bill"></i> Pagos
                                    </a>
                                    <ul class="dropdown-menu">
                                        @if(auth()->user()->hasPermiso('gestionar-pagos'))
                                            <li><a class="dropdown-item" href="{{ route('pagos.index') }}">
                                                    <i class="fas fa-cash-register"></i> Gestionar Pagos</a></li>
                                        @endif
                                        @if(auth()->user()->hasPermiso('ver-pagos'))
                                            <li><a class="dropdown-item" href="{{ route('pagos.index') }}">
                                                    <i class="fas fa-list"></i> Ver Pagos</a></li>
                                        @endif
                                    </ul>
                                </li>
                            @endif

                            <!-- Bitácora -->
                            @if(auth()->user()->hasPermiso('ver-bitacora'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('bitacoracambios.index') }}">
                                        <i class="fas fa-history"></i> Bitácora</a>
                                </li>
                            @endif
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @auth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endauth
                    </ul>

                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @stack('scripts')
</body>

</html>