@extends('layouts.app')

@section('title', 'Asignaciones Profesor-Curso')

@section('content')
    <!-- Encabezado con título y botón registrar nueva -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4">Asignaciones Profesor-Curso</h1>
        <!-- Botón para crear nueva asignación -->
        <a href="{{ route('course-teachers.create') }}" class="btn btn-primary">Registrar nueva</a>
    </div>

    <!-- Tarjeta que contiene la tabla de asignaciones -->
    <div class="card">
        <div class="card-body">
            <!-- Si hay asignaciones, mostrar tabla -->
            @if ($courseTeachers->isNotEmpty())
                <table class="table table-striped">
                    <!-- Encabezados de la tabla -->
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Curso</th>
                            <th>Profesor</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <!-- Cuerpo de la tabla con las asignaciones -->
                    <tbody>
                        @foreach ($courseTeachers as $courseTeacher)
                            <tr>
                                <td>{{ $courseTeacher->id }}</td>
                                <td>{{ $courseTeacher->course->course_number ?? 'N/A' }}</td>
                                <td>{{ $courseTeacher->teacher->name ?? 'N/A' }}</td>
                                <td>
                                    <!-- Botón para visualizar detalles -->
                                    <a href="{{ route('course-teachers.show', $courseTeacher) }}" class="btn btn-sm btn-outline-info">Visualizar</a>
                                    <!-- Botón para editar -->
                                    <a href="{{ route('course-teachers.edit', $courseTeacher) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                                    <!-- Formulario para eliminar -->
                                    <form action="{{ route('course-teachers.destroy', $courseTeacher) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Eliminar asignación?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <!-- Mensaje cuando no hay asignaciones -->
                <p class="text-muted">No hay asignaciones profesor-curso registradas.</p>
            @endif
        </div>
    </div>
@endsection
