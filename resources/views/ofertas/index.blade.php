@extends('layouts.app')

@section('title', 'Ofertas')

@section('content')
    <div class="access-page-header text-center">
        <p class="eyebrow text-success mb-2">FORMACIÓN DISPONIBLE</p>
        <h1>Ofertas</h1>
        <p>Explora oportunidades de formación creadas para este portal.</p>
    </div>

    <section class="static-list-section" aria-labelledby="ofertas-title">
        <div class="section-heading">
            <div><p class="eyebrow text-success mb-2">CATÁLOGO DE EJEMPLO</p><h2 id="ofertas-title">Ofertas de formación</h2></div>
            <span class="section-line"></span>
        </div>
        <div class="row g-4">
            <div class="col-12 col-md-6 col-xl-4">
                <article class="static-opportunity-card">
                    <span class="news-date">OFERTA 01</span>
                    <h3>Auxiliar contable</h3>
                    <p>Aprende fundamentos de registro, control y organización de información financiera.</p>
                    <dl><div><dt>Duración</dt><dd>6 meses</dd></div><div><dt>Cupos</dt><dd class="opportunity-status">25 disponibles</dd></div></dl>
                    <button class="btn btn-outline-sena" type="button" disabled>Más información próximamente</button>
                </article>
            </div>
            <div class="col-12 col-md-6 col-xl-4">
                <article class="static-opportunity-card">
                    <span class="news-date">OFERTA 02</span>
                    <h3>Programación web</h3>
                    <p>Construye interfaces y aplicaciones web con buenas prácticas de desarrollo.</p>
                    <dl><div><dt>Duración</dt><dd>8 meses</dd></div><div><dt>Cupos</dt><dd class="opportunity-status">18 disponibles</dd></div></dl>
                    <button class="btn btn-outline-sena" type="button" disabled>Más información próximamente</button>
                </article>
            </div>
            <div class="col-12 col-md-6 col-xl-4">
                <article class="static-opportunity-card">
                    <span class="news-date">OFERTA 03</span>
                    <h3>Emprendimiento</h3>
                    <p>Fortalece tu idea de negocio con herramientas para planear y validar proyectos.</p>
                    <dl><div><dt>Duración</dt><dd>3 meses</dd></div><div><dt>Cupos</dt><dd class="opportunity-status">Próximamente</dd></div></dl>
                    <button class="btn btn-outline-sena" type="button" disabled>Más información próximamente</button>
                </article>
            </div>
        </div>
    </section>
@endsection
