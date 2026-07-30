@extends('layouts.app')

@section('title', 'Editar Área')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('areas.update', $area) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')

                <div class="col-12">
                    <label for="name" class="form-label">Nombre del área</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $area->name) }}" required>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
                    <a href="{{ route('areas.index') }}" class="btn btn-secondary mt-2 ms-2">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
