
@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="row w-100 max-w-4xl">
        <!-- Formulario de Login -->
        <div class="col-md-6" id="loginForm">
            <div class="card h-100">
                <div class="card-header">
                    <h3 class="text-center">Iniciar Sesión</h3>
                    <p class="text-center text-muted">Ingresa tus credenciales para acceder</p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="email">{{ __('Correo Electrónico') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">{{ __('Contraseña') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" 
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Recordarme') }}
                                </label>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Iniciar Sesión') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tarjeta de Bienvenida -->
        <div class="col-md-6" id="loginMessage">
            <div class="card h-100 bg-light">
                <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <h3>Bienvenido de nuevo</h3>
                    <p class="text-muted">Nos alegra verte otra vez</p>
                    <p>Accede a tu cuenta para disfrutar de todas nuestras funcionalidades.</p>
                    <div class="mt-4">
                        <p>¿No tienes una cuenta?</p>
                        <button class="btn btn-outline-primary" onclick="toggleForms()">Registrarse</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulario de Registro (inicialmente oculto) -->
        <div class="col-md-6" id="registerForm" style="display: none;">
            <div class="card h-100">
                <div class="card-header">
                    <h3 class="text-center">Registro</h3>
                    <p class="text-center text-muted">Crea tu nueva cuenta</p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">{{ __('Nombre') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="register_email">{{ __('Correo Electrónico') }}</label>
                            <input id="register_email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="register_password">{{ __('Contraseña') }}</label>
                            <input id="register_password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password-confirm">{{ __('Confirmar Contraseña') }}</label>
                            <input id="password-confirm" type="password" class="form-control" 
                                name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Registrarse') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Mensaje de Registro (inicialmente oculto) -->
        <div class="col-md-6" id="registerMessage" style="display: none;">
            <div class="card h-100 bg-light">
                <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <h3>¡Únete a nosotros!</h3>
                    <p class="text-muted">Crea tu cuenta en unos simples pasos</p>
                    <p>Regístrate para acceder a todas nuestras funcionalidades y servicios exclusivos.</p>
                    <div class="mt-4">
                        <p>¿Ya tienes una cuenta?</p>
                        <button class="btn btn-outline-primary" onclick="toggleForms()">Iniciar Sesión</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<script>
    function toggleForms() {
        const loginForm = document.getElementById('loginForm');
        const registerForm = document.getElementById('registerForm');
        const loginMessage = document.getElementById('loginMessage');
        const registerMessage = document.getElementById('registerMessage');

        loginForm.style.display = loginForm.style.display === 'none' ? 'block' : 'none';
        registerForm.style.display = registerForm.style.display === 'none' ? 'block' : 'none';
        loginMessage.style.display = loginMessage.style.display === 'none' ? 'block' : 'none';
        registerMessage.style.display = registerMessage.style.display === 'none' ? 'block' : 'none';
    }
</script>
<style>
.card {
    margin: 1rem;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
}

.min-vh-100 {
    min-height: 100vh;
}

.max-w-4xl {
    max-width: 1200px;
}
</style>