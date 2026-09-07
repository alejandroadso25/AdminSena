@extends('layouts.app')

@section('title', 'Registrar Computador')

@section('content')
    <div class="card">
        <div class="card-body">
            {{-- El formulario usa multipart para enviar datos y la imagen al servidor. --}}
            <form action="{{ route('computers.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf

                <div class="col-md-6">
                    <label for="number" class="form-label">Número de computador</label>
                    <input type="text" id="number" name="number" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label for="brand" class="form-label">Marca</label>
                    <input type="text" id="brand" name="brand" class="form-control" required>
                </div>

                <div class="col-md-6">
                    {{-- La imagen del computador es opcional y se guarda en storage local. --}}
                    <label for="image" class="form-label">Imagen del computador</label>
                    <input type="file" id="image" name="image" class="form-control" accept="image/jpeg,image/png,image/webp">
                    <small class="text-muted">Formatos permitidos: JPG, PNG o WebP. Máximo 4 MB.</small>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                    <a href="{{ route('computers.index') }}" class="btn btn-outline-primary ms-2">Ver registros</a>
                </div>
            </form>
        </div>
    </div>

    <pre class="mt-3 bg-light p-3">{{ session('record') }}</pre>
@endsection