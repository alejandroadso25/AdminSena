@extends('layouts.app')

@section('title', 'Editar Computador')

@section('content')
    <div class="card">
        <div class="card-body">
            {{-- El formulario permite conservar la imagen actual o reemplazarla. --}}
            <form action="{{ route('computers.update', $computer) }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf
                @method('PUT')

                <div class="col-md-6">
                    <label for="number" class="form-label">Número de computador</label>
                    <input type="text" id="number" name="number" class="form-control" value="{{ old('number', $computer->number) }}" required>
                </div>

                <div class="col-md-6">
                    <label for="brand" class="form-label">Marca</label>
                    <input type="text" id="brand" name="brand" class="form-control" value="{{ old('brand', $computer->brand) }}" required>
                </div>

                <div class="col-md-6">
                    {{-- La nueva imagen solo se procesa si el administrador selecciona un archivo. --}}
                    <label for="image" class="form-label">Reemplazar imagen</label>
                    <input type="file" id="image" name="image" class="form-control" accept="image/jpeg,image/png,image/webp">
                    @if ($computer->image)
                        <img src="{{ asset('storage/'.$computer->image->path) }}" alt="{{ $computer->image->alt_text }}" class="img-thumbnail mt-2" style="max-width: 180px;">
                    @endif
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('computers.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
