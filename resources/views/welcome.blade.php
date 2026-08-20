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

        <section class="news-section container" aria-labelledby="news-title">
            {{-- Noticias informativas estáticas; no tienen navegación ni procesamiento dinámico. --}}
            <div class="section-heading">
                <div><p class="eyebrow text-success mb-2">ACTUALIDAD SENA</p><h2 id="news-title">Noticias</h2></div>
                <span class="section-line"></span>
            </div>
            <div class="row g-3 g-lg-4">
                <div class="col-12 col-md-4"><article class="news-card"><span class="news-date">FORMACIÓN</span><h3>Nuevas oportunidades para aprender</h3><p>Consulta y organiza la oferta académica disponible en tu centro de formación.</p></article></div>
                <div class="col-12 col-md-4"><article class="news-card"><span class="news-date">COMUNIDAD</span><h3>El talento que transforma</h3><p>Conoce la comunidad de instructores y aprendices que hace parte del SENA.</p></article></div>
                <div class="col-12 col-md-4"><article class="news-card"><span class="news-date">INSTITUCIONAL</span><h3>Construimos futuro juntos</h3><p>Una institución que conecta conocimiento, trabajo y oportunidades para todos.</p></article></div>
            </div>
        </section>

        <section class="sena-section container" aria-labelledby="sena-section-title">
            <div class="sena-section-content">
                <p class="eyebrow text-success mb-2">CONOCE EL SENA</p>
                <h2 id="sena-section-title">Una historia de oportunidades</h2>
                <p>Desde 1957, el SENA acompaña a los colombianos con formación profesional integral y herramientas para transformar sus proyectos de vida.</p>
                <a class="btn btn-sena" href="{{ route('sena.history') }}">Conocer nuestra historia <i class="fas fa-arrow-right ms-2"></i></a>
            </div>
        </section>

    </main>

    {{-- Footer compartido con contacto y redes oficiales. --}}
    @include('includes.footer')
    @include('includes.dependenciasbody')
</body>
</html>
