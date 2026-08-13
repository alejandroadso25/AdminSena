@extends('layouts.app')

@section('title', 'Áreas registradas')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4">Áreas registradas</h1>
        <a href="{{ route('areas.create') }}" class="btn btn-primary">Registrar nueva</a>
    </div>

    <div class="card">
        <div class="card-body">
            @if ($areas->isNotEmpty())
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($areas as $area)
                            <tr>
                                <td>{{ $area->id }}</td>
                                <td>{{ $area->name }}</td>
                                <td>
                                    <!-- Botón para visualizar detalles del área -->
                                    <a href="{{ route('areas.show', $area) }}" class="btn btn-sm btn-outline-info">Visualizar</a>
                                    <!-- Botón para editar el área -->
                                    <a href="{{ route('areas.edit', $area) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                                    <!-- Formulario para eliminar el área -->
                                    <form action="{{ route('areas.destroy', $area) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Eliminar área?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-muted">No hay áreas registradas.</p>
            @endif
        </div>
    </div>
@endsection
