@extends('layouts.app')

@section('title', 'Detalles del Computador')

@section('content')
    <!-- Encabezado con título y botón volver -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4">Detalles del Computador</h1>
        <!-- Botón de volver habilitado -->
        <a href="{{ route('computers.index') }}" class="btn btn-secondary">Volver</a>
    </div>

    <!-- Tarjeta con información del computador -->
    <div class="card">
        <div class="card-body">
            <!-- Datos básicos del computador -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5>Número</h5>
                    <p>{{ $computer->number }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <h5>Marca</h5>
                    <p>{{ $computer->brand }}</p>
                </div>
            </div>

            <!-- Botones de acción: Editar y Cancelar -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <a href="{{ route('computers.edit', $computer) }}" class="btn btn-primary">Editar</a>
                    <a href="{{ route('computers.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
