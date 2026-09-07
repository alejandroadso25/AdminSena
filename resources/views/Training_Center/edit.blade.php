@extends('layouts.app')

@section('title', 'Editar Centro de Formación')

@section('content')
    <div class="card">
        <div class="card-body">
            {{-- El formulario permite conservar la imagen actual o reemplazarla. --}}
            <form action="{{ route('training-centers.update', $training_center) }}" method="POST" enctype="multipart/form-data" class="row g-3">
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

                <div class="col-md-6">
                    {{-- Una imagen nueva reemplaza la imagen principal anterior. --}}
                    <label for="image" class="form-label">Reemplazar imagen</label>
                    <input type="file" id="image" name="image" class="form-control" accept="image/jpeg,image/png,image/webp">
                    @if ($training_center->image)
                        <img src="{{ asset('storage/'.$training_center->image->path) }}" alt="{{ $training_center->image->alt_text }}" class="img-thumbnail mt-2" style="max-width: 180px;">
                    @endif
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('training-centers.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
