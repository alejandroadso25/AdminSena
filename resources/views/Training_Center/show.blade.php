@extends('layouts.app')

@section('title', 'Listar Centro de Formación')

@section('content')
    <!-- Encabezado con título y botón volver -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4">Listar Centro de Formación</h1>
        <!-- Botón de volver habilitado -->
        <a href="{{ route('training-centers.index') }}" class="btn btn-secondary">Volver</a>
    </div>

    <!-- Tarjeta con información del centro de formación -->
    <div class="card">
        <div class="card-body">
            <!-- Datos básicos: ID, Nombre y Ubicación -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5>ID</h5>
                    <p>{{ $training_center->id }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Nombre</h5>
                    <p>{{ $training_center->name }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <h5>Ubicación</h5>
                    <p>{{ $training_center->location }}</p>
                </div>
            </div>

            <!-- Botones de acción: Editar y Cancelar -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <a href="{{ route('training-centers.edit', $training_center) }}" class="btn btn-primary">Editar</a>
                    <a href="{{ route('training-centers.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
