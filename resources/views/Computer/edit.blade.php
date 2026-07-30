@extends('layouts.app')

@section('title', 'Editar Computador')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('computers.update', $computer) }}" method="POST" class="row g-3">
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

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('computers.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
