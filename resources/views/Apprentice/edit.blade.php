@extends('layouts.app')

@section('title', 'Editar Aprendiz')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('apprentices.update', $apprentice) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')

                <div class="col-md-6">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $apprentice->name) }}" required>
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">Correo</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $apprentice->email) }}" required>
                </div>

                <div class="col-md-6">
                    <label for="cell_number" class="form-label">Número celular</label>
                    <input type="text" id="cell_number" name="cell_number" class="form-control" value="{{ old('cell_number', $apprentice->cell_number) }}" required>
                </div>

                <div class="col-md-6">
                    <label for="course_id" class="form-label">Curso</label>
                    <select id="course_id" name="course_id" class="form-select" required>
                        <option value="">Seleccionar curso</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" {{ old('course_id', $apprentice->course_id) == $course->id ? 'selected' : '' }}>{{ $course->course_number }} - {{ $course->day }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="computer_id" class="form-label">Computador</label>
                    <select id="computer_id" name="computer_id" class="form-select" required>
                        <option value="">Seleccionar computador</option>
                        @foreach ($computers as $computer)
                            <option value="{{ $computer->id }}" {{ old('computer_id', $apprentice->computer_id) == $computer->id ? 'selected' : '' }}>{{ $computer->number }} - {{ $computer->brand }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('apprentices.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
