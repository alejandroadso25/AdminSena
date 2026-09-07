@extends('layouts.app')

@section('title', 'Registrar Centro de Formación')

@section('content')
    <div class="card">
        <div class="card-body">
            {{-- El formulario usa multipart para enviar también la imagen del centro. --}}
            <form action="{{ route('training-centers.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                <h1 class="h4">Registrar Centro de Formación</h1>
                @csrf

                <div class="col-md-6">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label for="location" class="form-label">Ubicación</label>
                    <input type="text" id="location" name="location" class="form-control" required>
                </div>

                <div class="col-md-6">
                    {{-- La imagen del centro es opcional y se guarda en storage local. --}}
                    <label for="image" class="form-label">Imagen del centro</label>
                    <input type="file" id="image" name="image" class="form-control" accept="image/jpeg,image/png,image/webp">
                    <small class="text-muted">Formatos permitidos: JPG, PNG o WebP. Máximo 4 MB.</small>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('training-centers.index') }}" class="btn btn-outline-primary ms-2">Ver registros</a>
                    <a href="{{ url('/') }}" class="btn btn-secondary ms-2">Volver</a>
                </div>
            </form>
        </div>
    </div>
@endsection