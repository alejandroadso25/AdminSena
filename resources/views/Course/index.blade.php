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
                <ul class="list-group">
                    @foreach ($courses as $course)
                        <li class="list-group-item">
                            ID: {{ $course->id }} - Curso {{ $course->course_number }} - {{ $course->day }}
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">No hay cursos registrados.</p>
            @endif
        </div>
    </div>
@endsection
