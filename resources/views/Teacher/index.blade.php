@extends('layouts.app')

@section('title', 'Instructores registrados')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4">Instructores registrados</h1>
        <a href="{{ route('teachers.create') }}" class="btn btn-primary">Registrar nuevo</a>
    </div>

    <div class="card">
        <div class="card-body">
            @if ($teachers->isNotEmpty())
                <ul class="list-group">
                    @foreach ($teachers as $teacher)
                        <li class="list-group-item">
                            ID: {{ $teacher->id }} - {{ $teacher->name }} - {{ $teacher->email }}
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">No hay instructores registrados.</p>
            @endif
        </div>
    </div>
@endsection
