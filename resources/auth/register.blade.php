@extends('layouts.app')

@section('title', 'Registro')

@section('content')
    <div class="access-page-header text-center">
        <p class="eyebrow text-success mb-2">PORTAL ADMINISTRATIVO</p>
        <h1>Registro</h1>
        <p>Crea tu cuenta para comenzar.</p>
    </div>

    <div class="row g-4 access-section pb-5">
        <div class="col-12 col-lg-8 offset-lg-2">
            <div class="access-panel access-panel-register">
                <span class="access-panel-icon"><i class="fas fa-user-plus"></i></span>
                <h2>Registrarse</h2>
                <p>Completa tus datos para crear una cuenta.</p>
                <form action="{{ route('auth.register.store') }}" method="post">
                    @csrf
                    <label for="register-name">Nombre completo</label>
                    <input id="register-name" name="name" type="text" class="form-control" placeholder="Nombre completo" value="{{ old('name') }}" required>
                    <label for="register-email">Correo electrónico</label>
                    <input id="register-email" name="email" type="email" class="form-control" placeholder="correo@ejemplo.com" value="{{ old('email') }}" required>
                    <label for="register-password">Contraseña</label>
                    <input id="register-password" name="password" type="password" class="form-control" placeholder="Contraseña" required>
                    <label for="register-password-confirmation">Confirmar contraseña</label>
                    <input id="register-password-confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Confirmar contraseña" required>
                    <button type="submit" class="btn btn-outline-sena w-100 mt-3">Crear cuenta</button>
                </form>
                @if ($errors->any())
                    <div class="text-danger small mt-2">
                        {{ $errors->first() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
