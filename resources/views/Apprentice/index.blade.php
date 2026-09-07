@extends('layouts.app')

@section('title', 'Aprendices registrados')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4">Aprendices registrados</h1>
        <a href="{{ route('apprentices.create') }}" class="btn btn-primary">Registrar nuevo</a>
    </div>

    <div class="card">
        <div class="card-body">
            @if ($apprentices->isNotEmpty())
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Celular</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($apprentices as $apprentice)
                            <tr>
                                {{-- Muestra la imagen principal del aprendiz cuando existe. --}}
                                <td>
                                    @if ($apprentice->image)
                                        <img src="{{ asset('storage/'.$apprentice->image->path) }}" alt="{{ $apprentice->image->alt_text }}" class="img-thumbnail" style="width: 70px; height: 50px; object-fit: cover;">
                                    @else
                                        <span class="text-muted">Sin imagen</span>
                                    @endif
                                </td>
                                <td>{{ $apprentice->name }}</td>
                                <td>{{ $apprentice->email }}</td>
                                <td>{{ $apprentice->cell_number }}</td>
                                <td>
                                    <!-- Botón para visualizar detalles del aprendiz -->
                                    <a href="{{ route('apprentices.show', $apprentice) }}" class="btn btn-sm btn-outline-info">Visualizar</a>
                                    <!-- Botón para editar el aprendiz -->
                                    <a href="{{ route('apprentices.edit', $apprentice) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                                    <!-- Formulario para eliminar el aprendiz -->
                                    <form action="{{ route('apprentices.destroy', $apprentice) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Eliminar aprendiz?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-muted">No hay aprendices registrados.</p>
            @endif
        </div>
    </div>
@endsection
