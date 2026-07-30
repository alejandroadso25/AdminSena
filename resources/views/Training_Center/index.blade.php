@extends('layouts.app')

@section('title', 'Centros de formación')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4">Centros de formación registrados</h1>
        <a href="{{ route('training-centers.create') }}" class="btn btn-primary">Registrar nuevo</a>
    </div>

    <div class="card">
        <div class="card-body">
            @if ($trainingCenters->isNotEmpty())
                <ul class="list-group">
                    @foreach ($trainingCenters as $center)
                        <li class="list-group-item">
                            ID: {{ $center->id }} - <strong>{{ $center->name }}</strong> - {{ $center->location }}
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">No hay centros de formación registrados.</p>
            @endif
        </div>
    </div>
@endsection
