@extends('layouts.app')

@section('title', 'Historia del SENA')

@section('content')
    {{-- Página informativa dedicada a la historia institucional del SENA. --}}
    <div class="history-page">
        <div class="history-heading">
            <p class="eyebrow text-success mb-2">CONOCE NUESTRA INSTITUCIÓN</p>
            <h1>Historia del SENA</h1>
            <p>Una institución colombiana al servicio de la formación, el trabajo y el desarrollo social.</p>
        </div>

        <div class="history-content">
            <div class="history-media">
                {{-- Imagen histórica almacenada en la carpeta pública de assets. --}}
                <img src="{{ asset('assets/Sena 1957.jpg') }}" alt="SENA en 1957">
                <span class="history-year">1957</span>
            </div>
            <div>
                <h2>El comienzo de una gran misión</h2>
                <p>El Servicio Nacional de Aprendizaje nació el 21 de junio de 1957 con la misión de brindar formación profesional a los trabajadores, jóvenes y adultos del país.</p>
                <p>Desde entonces, el SENA ha crecido junto con Colombia y ha llevado conocimiento, tecnología y oportunidades a regiones urbanas y rurales.</p>
            </div>
        </div>

        <div class="history-content history-content-reverse">
            <div class="history-media">
                {{-- Imagen actual del SENA servida directamente desde public/assets. --}}
                <img src="{{ asset('assets/Sena hoy.jpg') }}" alt="SENA en la actualidad">
                <span class="history-year">HOY</span>
            </div>
            <div>
                <h2>Formación que transforma</h2>
                <p>Actualmente, el SENA ofrece formación técnica, tecnológica y complementaria, además de servicios para el empleo, el emprendimiento y el fortalecimiento empresarial.</p>
                <p>Su propósito continúa siendo aportar al desarrollo social y productivo de Colombia con una educación pública pertinente y de calidad.</p>
            </div>
        </div>
    </div>
@endsection