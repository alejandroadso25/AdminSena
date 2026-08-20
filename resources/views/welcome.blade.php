<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminSena | Inicio</title>
    @include('includes.dependencias')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="home-page">
    {{-- Encabezado institucional con logo y accesos a los módulos. --}}
    <header class="site-header">
        <div class="gov-bar">
            <div class="container d-flex align-items-center">
                <span class="gov-mark">✦</span><span>gov.co</span>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-0" aria-label="Navegación principal">
            <div class="container main-nav">
                <a class="navbar-brand sena-brand" href="{{ url('/') }}" aria-label="AdminSena inicio">
                    <span class="sena-logo" role="img" aria-label="Logo SENA"></span><span class="sena-word">AdminSena</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#homeNav" aria-controls="homeNav" aria-expanded="false" aria-label="Abrir menú">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="homeNav">
                    <ul class="navbar-nav ms-lg-4 me-auto align-items-lg-center">
                        <li class="nav-item"><a class="nav-link" href="{{ route('auth.access') }}">Inicio/Registro</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('areas.index') }}">Áreas</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('training-centers.index') }}">Centros</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('courses.index') }}">Formación</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('teachers.index') }}">Instructores</a></li>
                    </ul>
                    <a class="btn btn-sena" href="{{ route('apprentices.index') }}"><i class="fas fa-users me-2"></i>Aprendices</a>
                </div>
            </div>
        </nav>
    </header>

    {{-- Contenido principal: carrusel y tarjetas de acceso a los CRUD. --}}
    <main>
        @include('includes.carousel')

        <section class="quick-access container" aria-labelledby="quick-access-title">
            <div class="section-heading">
                <div><p class="eyebrow text-success mb-2">PANEL DE ACCESO</p><h2 id="quick-access-title">Administra tu centro</h2></div>
                <span class="section-line"></span>
            </div>
            <div class="row g-3 g-lg-4">
                <div class="col-12 col-sm-6 col-lg-3"><a class="access-card" href="{{ route('courses.index') }}"><span class="access-icon icon-green"><i class="fas fa-graduation-cap"></i></span><span><strong>Formación</strong><small>Cursos y áreas</small></span><i class="fas fa-arrow-right card-arrow"></i></a></div>
                <div class="col-12 col-sm-6 col-lg-3"><a class="access-card" href="{{ route('teachers.index') }}"><span class="access-icon icon-blue"><i class="fas fa-chalkboard-teacher"></i></span><span><strong>Instructores</strong><small>Equipo académico</small></span><i class="fas fa-arrow-right card-arrow"></i></a></div>
                <div class="col-12 col-sm-6 col-lg-3"><a class="access-card" href="{{ route('apprentices.index') }}"><span class="access-icon icon-yellow"><i class="fas fa-user-graduate"></i></span><span><strong>Aprendices</strong><small>Registro y seguimiento</small></span><i class="fas fa-arrow-right card-arrow"></i></a></div>
                <div class="col-12 col-sm-6 col-lg-3"><a class="access-card" href="{{ route('computers.index') }}"><span class="access-icon icon-purple"><i class="fas fa-laptop"></i></span><span><strong>Recursos</strong><small>Computadores y centros</small></span><i class="fas fa-arrow-right card-arrow"></i></a></div>
            </div>
        </section>

    </main>

    {{-- Footer compartido con contacto y redes oficiales. --}}
    @include('includes.footer')
    @include('includes.dependenciasbody')
</body>
</html>
