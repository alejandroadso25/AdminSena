@extends('layouts.app')

@section('title', 'Detalles del Aprendiz')

@section('content')
    <!-- Encabezado con título y botón volver -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4">Detalles del Aprendiz</h1>
        <!-- Botón de volver habilitado -->
        <a href="{{ route('apprentices.index') }}" class="btn btn-secondary">Volver</a>
    </div>

    <!-- Tarjeta con información del aprendiz -->
    <div class="card">
        <div class="card-body">
            <!-- Datos básicos: ID y Nombre -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5>ID</h5>
                    <p>{{ $apprentice->id }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Nombre</h5>
                    <p>{{ $apprentice->name }}</p>
                </div>
            </div>

            <!-- Datos de contacto: Correo y Celular -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5>Correo</h5>
                    <p>{{ $apprentice->email }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Celular</h5>
                    <p>{{ $apprentice->cell_number }}</p>
                </div>
            </div>

            <!-- Datos de relación: Curso y Computador -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5>Curso</h5>
                    <p>{{ $apprentice->course->course_number ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Computador</h5>
                    <p>{{ $apprentice->computer->number ?? 'N/A' }}</p>
                </div>
            </div>

            <!-- Botones de acción: Editar y Cancelar -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <a href="{{ route('apprentices.edit', $apprentice) }}" class="btn btn-primary">Editar</a>
                    <a href="{{ route('apprentices.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
