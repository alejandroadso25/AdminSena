@extends('layouts.app')

@section('title', 'Detalles del Área')

@section('content')
    <!-- Encabezado con título y botón volver -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4">Detalles del Área</h1>
        <!-- Botón de volver habilitado -->
        <a href="{{ route('areas.index') }}" class="btn btn-secondary">Volver</a>
    </div>

    <!-- Tarjeta con información del área -->
    <div class="card">
        <div class="card-body">
            <!-- Datos básicos: ID y Nombre -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5>ID</h5>
                    <p>{{ $area->id }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Nombre</h5>
                    <p>{{ $area->name }}</p>
                </div>
            </div>

            <!-- Botones de acción: Editar y Cancelar -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <a href="{{ route('areas.edit', $area) }}" class="btn btn-primary">Editar</a>
                    <a href="{{ route('areas.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
