@extends('layouts.app')

@section('title', 'Detalles del Curso')

@section('content')
    <!-- Encabezado con título y botón volver -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4">Detalles del Curso</h1>
        <!-- Botón de volver habilitado -->
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Volver</a>
    </div>

    <!-- Tarjeta con información del curso -->
    <div class="card">
        <div class="card-body">
            <!-- Datos básicos: ID y Número del Curso -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5>ID</h5>
                    <p>{{ $course->id }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Número del Curso</h5>
                    <p>{{ $course->course_number }}</p>
                </div>
            </div>

            <!-- Datos del curso: Día y Área -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5>Día</h5>
                    <p>{{ $course->day }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Área</h5>
                    <p>{{ $course->area->name ?? 'N/A' }}</p>
                </div>
            </div>

            <!-- Centro de Formación -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5>Centro de Formación</h5>
                    <p>{{ $course->trainingCenter->name ?? 'N/A' }}</p>
                </div>
            </div>

            <!-- Botones de acción: Editar y Cancelar -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <a href="{{ route('courses.edit', $course) }}" class="btn btn-primary">Editar</a>
                    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
