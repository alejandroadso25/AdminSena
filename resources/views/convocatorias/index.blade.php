@extends('layouts.app')

@section('title', 'Convocatorias')

@section('content')
    <div class="access-page-header text-center">
        <p class="eyebrow text-success mb-2">OPORTUNIDADES DE FORMACIÓN</p>
        <h1>Convocatorias</h1>
        <p>Consulta las convocatorias disponibles en nuestra plataforma.</p>
    </div>

    <section class="static-list-section" aria-labelledby="convocatorias-title">
        <div class="section-heading">
            <div><p class="eyebrow text-success mb-2">LISTADO INFORMATIVO</p><h2 id="convocatorias-title">Convocatorias disponibles</h2></div>
            <span class="section-line"></span>
        </div>
        <div class="row g-4">
            <div class="col-12 col-md-6 col-xl-4">
                <article class="static-opportunity-card">
                    <span class="news-date">CONVOCATORIA 01</span>
                    <h3>Técnico en sistemas</h3>
                    <p>Formación enfocada en soporte, mantenimiento y herramientas digitales.</p>
                    <dl><div><dt>Modalidad</dt><dd>Presencial</dd></div><div><dt>Estado</dt><dd class="opportunity-status">Disponible</dd></div></dl>
                    <button class="btn btn-outline-sena" type="button" disabled>Inscripción próximamente</button>
                </article>
            </div>
            <div class="col-12 col-md-6 col-xl-4">
                <article class="static-opportunity-card">
                    <span class="news-date">CONVOCATORIA 02</span>
                    <h3>Gestión administrativa</h3>
                    <p>Programa de formación para procesos organizacionales y atención al usuario.</p>
                    <dl><div><dt>Modalidad</dt><dd>Mixta</dd></div><div><dt>Estado</dt><dd class="opportunity-status">Disponible</dd></div></dl>
                    <button class="btn btn-outline-sena" type="button" disabled>Inscripción próximamente</button>
                </article>
            </div>
            <div class="col-12 col-md-6 col-xl-4">
                <article class="static-opportunity-card">
                    <span class="news-date">CONVOCATORIA 03</span>
                    <h3>Diseño de contenidos</h3>
                    <p>Formación práctica en comunicación visual y creación de piezas digitales.</p>
                    <dl><div><dt>Modalidad</dt><dd>Virtual</dd></div><div><dt>Estado</dt><dd class="opportunity-status">Próximamente</dd></div></dl>
                    <button class="btn btn-outline-sena" type="button" disabled>Inscripción próximamente</button>
                </article>
            </div>
        </div>
    </section>
@endsection
