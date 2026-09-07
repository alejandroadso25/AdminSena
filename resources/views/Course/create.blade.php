@extends('layouts.app')

@section('title', 'Registrar Curso')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('courses.store') }}" method="POST" class="row g-3">
                <h1 class="h4">Registrar Curso</h1>
                @csrf

                <div class="col-md-6">
                    <label for="course_number" class="form-label">Número de curso</label>
                    <input type="text" id="course_number" name="course_number" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label for="program_name" class="form-label">Nombre del programa</label>
                    <input type="text" id="program_name" name="program_name" class="form-control" placeholder="Ejemplo: ADSO" required>
                </div>

                <div class="col-md-6">
                    <label for="training_type" class="form-label">Tipo de formación</label>
                    <select id="training_type" name="training_type" class="form-select" required>
                        <option value="">Seleccionar tipo</option>
                        <option value="técnico">Técnico</option>
                        <option value="tecnólogo">Tecnólogo</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="location" class="form-label">Ubicación</label>
                    <input type="text" id="location" name="location" class="form-control" placeholder="Ejemplo: Regional Cauca" required>
                </div>

                <div class="col-md-6">
                    <label for="day" class="form-label">Día</label>
                    <input type="text" id="day" name="day" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label for="duration" class="form-label">Duración</label>
                    <input type="text" id="duration" name="duration" class="form-control" placeholder="Ejemplo: 24 meses">
                </div>

                <div class="col-md-6">
                    <label for="capacity" class="form-label">Cupos</label>
                    <input type="number" id="capacity" name="capacity" class="form-control" min="1">
                </div>

                <div class="col-12">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea id="description" name="description" class="form-control" rows="3"></textarea>
                </div>

                <div class="col-12 form-check ms-2">
                    <input type="checkbox" id="is_open" name="is_open" value="1" class="form-check-input" checked>
                    <label for="is_open" class="form-check-label">Convocatoria abierta</label>
                </div>

                <div class="col-md-6">
                    <label for="area_id" class="form-label">Área</label>
                    <select id="area_id" name="area_id" class="form-select">
                        <option value="">Seleccionar área</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="training_center_id" class="form-label">Centro de Formación</label>
                    <select id="training_center_id" name="training_center_id" class="form-select">
                        <option value="">Seleccionar centro</option>
                        @foreach ($training_centers as $center)
                            <option value="{{ $center->id }}">{{ $center->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('courses.index') }}" class="btn btn-outline-primary ms-2">Ver registros</a>
                    <a href="{{ url('/') }}" class="btn btn-secondary ms-2">Volver</a>
                </div>
            </form>
        </div>
    </div>
@endsection
