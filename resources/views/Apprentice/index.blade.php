@extends('layouts.app')

@section('title', 'Aprendices registrados')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4">Aprendices registrados</h1>
        <a href="{{ route('apprentices.create') }}" class="btn btn-primary">Registrar nuevo</a>
    </div>

    <div class="card">
        <div class="card-body">
            @if ($apprentices->isNotEmpty())
                <ul class="list-group">
                    @foreach ($apprentices as $apprentice)
                        <li class="list-group-item">
                            ID: {{ $apprentice->id }} - {{ $apprentice->name }} - {{ $apprentice->email }}
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">No hay aprendices registrados.</p>
            @endif
        </div>
    </div>
@endsection
