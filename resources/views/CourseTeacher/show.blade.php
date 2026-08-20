@extends('layouts.app')

@section('title', 'Detalles de la Asignación Profesor-Curso')

@section('content')
    <!-- Encabezado con título y botón volver -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4">Detalles de la Asignación Profesor-Curso</h1>
        <!-- Botón de volver habilitado -->
        <a href="{{ route('course-teachers.index') }}" class="btn btn-secondary">Volver</a>
    </div>

    <!-- Tarjeta con información de la asignación -->
    <div class="card">
        <div class="card-body">
            <!-- Datos básicos de la asignación -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5>Curso</h5>
                    <p>{{ $courseTeacher->course->course_number ?? 'N/A' }}</p>
                </div>
            </div>

            <!-- Profesor asignado -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5>Profesor</h5>
                    <p>{{ $courseTeacher->teacher->name ?? 'N/A' }}</p>
                </div>
            </div>

            <!-- Botones de acción: Editar y Cancelar -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <a href="{{ route('course-teachers.edit', $courseTeacher) }}" class="btn btn-primary">Editar</a>
                    <a href="{{ route('course-teachers.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
