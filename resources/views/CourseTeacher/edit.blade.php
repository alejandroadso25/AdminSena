@extends('layouts.app')

@section('title', 'Editar Asignación Profesor-Curso')

@section('content')
    <!-- Encabezado con título y botón volver -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4">Editar Asignación Profesor-Curso</h1>
        <!-- Botón de volver habilitado -->
        <a href="{{ route('course-teachers.index') }}" class="btn btn-secondary">Volver</a>
    </div>

    <!-- Tarjeta con el formulario de edición -->
    <div class="card">
        <div class="card-body">
            <!-- Formulario para actualizar la asignación -->
            <form action="{{ route('course-teachers.update', $courseTeacher) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Campo para seleccionar el curso -->
                <div class="mb-3">
                    <label for="course_id" class="form-label">Curso</label>
                    <select name="course_id" id="course_id" class="form-control @error('course_id') is-invalid @enderror" required>
                        <option value="">Seleccionar curso</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" @if ($course->id == $courseTeacher->course_id) selected @endif>
                                {{ $course->course_number }}
                            </option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo para seleccionar el profesor -->
                <div class="mb-3">
                    <label for="teacher_id" class="form-label">Profesor</label>
                    <select name="teacher_id" id="teacher_id" class="form-control @error('teacher_id') is-invalid @enderror" required>
                        <option value="">Seleccionar profesor</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}" @if ($teacher->id == $courseTeacher->teacher_id) selected @endif>
                                {{ $teacher->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('teacher_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Botones de acción: Actualizar y Cancelar -->
                <div class="row mt-4">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a href="{{ route('course-teachers.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
