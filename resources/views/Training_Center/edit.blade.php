@extends('layouts.app')

@section('title', 'Editar Centro de Formación')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('training-centers.update', $training_center) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')

                <div class="col-md-6">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $training_center->name) }}" required>
                </div>

                <div class="col-md-6">
                    <label for="location" class="form-label">Ubicación</label>
                    <input type="text" id="location" name="location" class="form-control" value="{{ old('location', $training_center->location) }}" required>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('training-centers.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
