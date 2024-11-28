<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gym Manager Pro</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar-brand i {
            color: #FF2D20;
        }
        .feature-card {
            min-height: 200px; /* Aumenta la altura de las tarjetas */
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        .footer-text {
            color: #6c757d;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <i class="fas fa-dumbbell fa-2x me-2"></i>
                <span class="h4 mb-0">Gym Manager Pro</span>
            </a>
            @if (Route::has('login'))
                <div class="ms-auto">
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-outline-primary">
                            <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">
                            <i class="fas fa-sign-in-alt me-2"></i> Iniciar Sesión / Registrarse
                        </a>
                    @endauth
                </div>
            @endif
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container my-5">
        <!-- Hero Section -->
        <div class="text-center mb-5">
            <h1 class="display-4 text-primary fw-bold mb-3">Bienvenido a Gym Manager Pro</h1>
            <p class="lead text-secondary">Tu solución completa para la gestión de gimnasios</p>
        </div>

        <!-- Feature Cards -->
        <div class="row g-4">
            <!-- Características Principales -->
            <div class="col-md-6">
                <div class="card feature-card h-100 shadow-sm border-0">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex">
                            <div class="me-3">
                                <div class="icon-shape bg-primary text-white rounded-circle">
                                    <i class="fas fa-clipboard-list fa-2x p-3"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="card-title">Características Principales</h5>
                            </div>
                        </div>
                        <p class="card-text text-muted mt-3">
                            Control de membresías, gestión de pagos, planificación de clases y más funcionalidades diseñadas específicamente para tu gimnasio.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Beneficios -->
            <div class="col-md-6">
                <div class="card feature-card h-100 shadow-sm border-0">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex">
                            <div class="me-3">
                                <div class="icon-shape bg-primary text-white rounded-circle">
                                    <i class="fas fa-chart-line fa-2x p-3"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="card-title">Beneficios</h5>
                            </div>
                        </div>
                        <p class="card-text text-muted mt-3">
                            Optimiza tus operaciones, aumenta la retención de clientes y maximiza tus ingresos con nuestras herramientas de gestión.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Control de Acceso -->
            <div class="col-md-6">
                <div class="card feature-card h-100 shadow-sm border-0">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex">
                            <div class="me-3">
                                <div class="icon-shape bg-primary text-white rounded-circle">
                                    <i class="fas fa-id-card fa-2x p-3"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="card-title">Control de Acceso</h5>
                            </div>
                        </div>
                        <p class="card-text text-muted mt-3">
                            Sistema de registro de entrada y salida, control de membresías activas y gestión de accesos a áreas específicas.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Gestión de Personal -->
            <div class="col-md-6">
                <div class="card feature-card h-100 shadow-sm border-0">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex">
                            <div class="me-3">
                                <div class="icon-shape bg-primary text-white rounded-circle">
                                    <i class="fas fa-users-cog fa-2x p-3"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="card-title">Gestión de Personal</h5>
                            </div>
                        </div>
                        <p class="card-text text-muted mt-3">
                            Administración de empleados y roles. Mejora la organización interna de tu gimnasio para brindar un mejor servicio.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Reportes y Análisis -->
            <div class="col-md-6">
                <div class="card feature-card h-100 shadow-sm border-0">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex">
                            <div class="me-3">
                                <div class="icon-shape bg-primary text-white rounded-circle">
                                    <i class="fas fa-chart-bar fa-2x p-3"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="card-title">Reportes y Análisis</h5>
                            </div>
                        </div>
                        <p class="card-text text-muted mt-3">
                            Informes detallados de ingresos. Obtén una visión clara de tus finanzas y toma decisiones informadas para hacer crecer tu negocio.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Control Financiero -->
            <div class="col-md-6">
                <div class="card feature-card h-100 shadow-sm border-0">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex">
                            <div class="me-3">
                                <div class="icon-shape bg-primary text-white rounded-circle">
                                    <i class="fas fa-money-bill-wave fa-2x p-3"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="card-title">Control Financiero</h5>
                            </div>
                        </div>
                        <p class="card-text text-muted mt-3">
                            Gestión de pagos y seguimiento de ingresos. Simplifica tus procesos financieros y mantén un registro actualizado de tus ingresos.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white py-4 mt-auto">
        <div class="container text-center">
            <p class="mb-0 footer-text">Gym Manager Pro &copy; 2024 - Todos los derechos reservados</p>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies (Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
