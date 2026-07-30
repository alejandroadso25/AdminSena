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
                    <label for="day" class="form-label">Día</label>
                    <input type="text" id="day" name="day" class="form-control" value="{{ old('day', $course->day) }}" required>
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
