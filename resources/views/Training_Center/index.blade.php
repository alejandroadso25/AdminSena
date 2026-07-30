@extends('layouts.app')

@section('title', 'Centros de formación')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4">Centros de formación registrados</h1>
        <a href="{{ route('training-centers.create') }}" class="btn btn-primary">Registrar nuevo</a>
    </div>

    <div class="card">
        <div class="card-body">
            @if ($trainingCenters->isNotEmpty())
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Ubicación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trainingCenters as $center)
                            <tr>
                                <td>{{ $center->id }}</td>
                                <td>{{ $center->name }}</td>
                                <td>{{ $center->location }}</td>
                                <td>
                                    <a href="{{ route('training-centers.edit', $center) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                                    <form action="{{ route('training-centers.destroy', $center) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Eliminar centro de formación?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-muted">No hay centros de formación registrados.</p>
            @endif
        </div>
    </div>
@endsection
