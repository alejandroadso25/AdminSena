@extends('layouts.app')

@section('title', 'Editar Curso')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('courses.update', $course) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')

                <div class="col-md-6">
                    <label for="course_number" class="form-label">Número de curso</label>
                    <input type="text" id="course_number" name="course_number" class="form-control" value="{{ old('course_number', $course->course_number) }}" required>
                </div>

                <div class="col-md-6">
                    <label for="program_name" class="form-label">Nombre del programa</label>
                    <input type="text" id="program_name" name="program_name" class="form-control" value="{{ old('program_name', $course->program_name) }}" required>
                </div>

                <div class="col-md-6">
                    <label for="training_type" class="form-label">Tipo de formación</label>
                    <select id="training_type" name="training_type" class="form-select" required>
                        <option value="técnico" @selected(old('training_type', $course->training_type) === 'técnico')>Técnico</option>
                        <option value="tecnólogo" @selected(old('training_type', $course->training_type) === 'tecnólogo')>Tecnólogo</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="location" class="form-label">Ubicación</label>
                    <input type="text" id="location" name="location" class="form-control" value="{{ old('location', $course->location) }}" required>
                </div>

                <div class="col-md-6">
                    <label for="day" class="form-label">Día</label>
                    <input type="text" id="day" name="day" class="form-control" value="{{ old('day', $course->day) }}" required>
                </div>

                <div class="col-md-6">
                    <label for="duration" class="form-label">Duración</label>
                    <input type="text" id="duration" name="duration" class="form-control" value="{{ old('duration', $course->duration) }}">
                </div>

                <div class="col-md-6">
                    <label for="capacity" class="form-label">Cupos</label>
                    <input type="number" id="capacity" name="capacity" class="form-control" min="1" value="{{ old('capacity', $course->capacity) }}">
                </div>

                <div class="col-12">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea id="description" name="description" class="form-control" rows="3">{{ old('description', $course->description) }}</textarea>
                </div>

                <div class="col-12 form-check ms-2">
                    <input type="checkbox" id="is_open" name="is_open" value="1" class="form-check-input" @checked(old('is_open', $course->is_open))>
                    <label for="is_open" class="form-check-label">Convocatoria abierta</label>
                </div>

                <div class="col-md-6">
                    <label for="area_id" class="form-label">Área</label>
                    <select id="area_id" name="area_id" class="form-select">
                        <option value="">Seleccionar área</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}" {{ old('area_id', $course->area_id) == $area->id ? 'selected' : '' }}>{{ $area->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="training_center_id" class="form-label">Centro de Formación</label>
                    <select id="training_center_id" name="training_center_id" class="form-select">
                        <option value="">Seleccionar centro</option>
                        @foreach ($training_centers as $center)
                            <option value="{{ $center->id }}" {{ old('training_center_id', $course->training_center_id) == $center->id ? 'selected' : '' }}>{{ $center->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('courses.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
