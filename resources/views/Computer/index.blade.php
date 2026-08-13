@extends('layouts.app')

@section('title', 'Computadores registrados')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4">Computadores registrados</h1>
        <a href="{{ route('computers.create') }}" class="btn btn-primary">Registrar nuevo</a>
    </div>

    <div class="card">
        <div class="card-body">
            @if ($computer->isNotEmpty())
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Número</th>
                            <th>Marca</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($computer as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->number }}</td>
                                <td>{{ $item->brand }}</td>
                                <td>
                                    <!-- Botón para visualizar detalles del computador -->
                                    <a href="{{ route('computers.show', $item) }}" class="btn btn-sm btn-outline-info">Visualizar</a>
                                    <!-- Botón para editar el computador -->
                                    <a href="{{ route('computers.edit', $item) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                                    <!-- Formulario para eliminar el computador -->
                                    <form action="{{ route('computers.destroy', $item) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Eliminar computador?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-muted">No hay computadores registrados.</p>
            @endif
        </div>
    </div>
@endsection
