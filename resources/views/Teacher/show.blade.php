@extends('layouts.app')

@section('title', 'Detalles del Instructor')

@section('content')
    <!-- Encabezado con título y botón volver -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4">Detalles del Instructor</h1>
        <!-- Botón de volver habilitado -->
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Volver</a>
    </div>

    <!-- Tarjeta con información del instructor -->
    <div class="card">
        <div class="card-body">
            <!-- Datos básicos del instructor -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5>Nombre</h5>
                    <p>{{ $teacher->name }}</p>
                </div>
            </div>

            <!-- Datos de contacto: Correo y Área -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5>Correo</h5>
                    <p>{{ $teacher->email }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Área</h5>
                    <p>{{ $teacher->area->name ?? 'N/A' }}</p>
                </div>
            </div>

            <!-- Centro de Formación -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5>Centro de Formación</h5>
                    <p>{{ $teacher->trainingCenter->name ?? 'N/A' }}</p>
                </div>
            </div>

            <!-- Botones de acción: Editar y Cancelar -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <a href="{{ route('teachers.edit', $teacher) }}" class="btn btn-primary">Editar</a>
                    <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
