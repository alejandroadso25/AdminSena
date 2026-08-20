@extends('layouts.app')

@section('title', 'Cursos registrados')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4">Cursos registrados</h1>
        <a href="{{ route('courses.create') }}" class="btn btn-primary">Registrar nuevo</a>
    </div>

    <div class="card">
        <div class="card-body">
            @if ($courses->isNotEmpty())
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Número</th>
                            <th>Día</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td>{{ $course->course_number }}</td>
                                <td>{{ $course->day }}</td>
                                <td>
                                    <!-- Botón para visualizar detalles del curso -->
                                    <a href="{{ route('courses.show', $course) }}" class="btn btn-sm btn-outline-info">Visualizar</a>
                                    <!-- Botón para editar el curso -->
                                    <a href="{{ route('courses.edit', $course) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                                    <!-- Formulario para eliminar el curso -->
                                    <form action="{{ route('courses.destroy', $course) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Eliminar curso?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-muted">No hay cursos registrados.</p>
            @endif
        </div>
    </div>
@endsection
