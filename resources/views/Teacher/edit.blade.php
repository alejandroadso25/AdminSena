@extends('layouts.app')

@section('title', 'Editar Instructor')

@section('content')
    <div class="card">
        <div class="card-body">
            {{-- El formulario permite conservar la imagen actual o reemplazarla. --}}
            <form action="{{ route('teachers.update', $teacher) }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf
                @method('PUT')

                <div class="col-md-6">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $teacher->name) }}" required>
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">Correo</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $teacher->email) }}" required>
                </div>

                <div class="col-md-6">
                    <label for="area_id" class="form-label">Área</label>
                    <select id="area_id" name="area_id" class="form-select" required>
                        <option value="">Seleccionar área</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}" {{ old('area_id', $teacher->area_id) == $area->id ? 'selected' : '' }}>{{ $area->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="training_center_id" class="form-label">Centro de Formación</label>
                    <select id="training_center_id" name="training_center_id" class="form-select" required>
                        <option value="">Seleccionar centro</option>
                        @foreach ($trainingCenters as $center)
                            <option value="{{ $center->id }}" {{ old('training_center_id', $teacher->training_center_id) == $center->id ? 'selected' : '' }}>{{ $center->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    {{-- La nueva imagen solo se procesa si el administrador selecciona un archivo. --}}
                    <label for="image" class="form-label">Reemplazar imagen</label>
                    <input type="file" id="image" name="image" class="form-control" accept="image/jpeg,image/png,image/webp">
                    @if ($teacher->image)
                        <img src="{{ asset('storage/'.$teacher->image->path) }}" alt="{{ $teacher->image->alt_text }}" class="img-thumbnail mt-2" style="max-width: 180px;">
                    @endif
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('teachers.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
