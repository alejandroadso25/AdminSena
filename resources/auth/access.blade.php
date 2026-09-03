@extends('layouts.app')

@section('title', 'Inicio de sesión')

@section('content')
    <div class="access-page-header text-center">
        <p class="eyebrow text-success mb-2">PORTAL ADMINISTRATIVO</p>
        <h1>Inicio de sesión</h1>
        <p>Accede a tu espacio de gestión.</p>
    </div>

    @if (session('status'))
        <div class="alert alert-success" role="status">{{ session('status') }}</div>
    @endif

    <div class="row g-4 access-section pb-5">
        <div class="col-12 col-lg-8 offset-lg-2">
            <div id="login" class="access-panel">
                <span class="access-panel-icon"><i class="fas fa-lock"></i></span>
                <h2>Iniciar sesión</h2>
                <p>Accede a tu espacio de gestión.</p>
                {{-- Aviso visible para orientar al usuario cuando olvida su contraseña. --}}
                <div class="alert alert-info small" role="note">
                    ¿Olvidaste tu contraseña? Recuerda solicitar ayuda al administrador.
                </div>
                <form action="{{ route('auth.login') }}" method="post">
                    @csrf
                    <label for="login-email">Correo electrónico</label>
                    <input id="login-email" name="email" type="email" class="form-control" placeholder="correo@ejemplo.com" value="{{ old('email') }}" required>
                    <label for="login-password">Contraseña</label>
                    <input id="login-password" name="password" type="password" class="form-control" placeholder="Contraseña" required>
                    {{-- Permite revisar la contraseña escrita sin enviarla en texto visible. --}}
                    <div class="form-check mt-2">
                        <input id="show-login-password" type="checkbox" class="form-check-input" onchange="toggleLoginPassword(this)">
                        <label for="show-login-password" class="form-check-label">Mostrar contraseña</label>
                    </div>
                    <button type="submit" class="btn btn-sena w-100 mt-3">Iniciar sesión</button>
                </form>
                @error('email')
                    <div class="text-danger small mt-2">{{ $message }}</div>
                @enderror
                <p class="auth-switch text-center mt-3 mb-0">¿No tienes cuenta? <a href="{{ route('auth.register') }}">Regístrate aquí</a></p>
            </div>
        </div>
    </div>

    <script>
        // Cambia el campo entre contraseña oculta y texto visible al marcar la casilla.
        function toggleLoginPassword(toggle) {
            document.getElementById('login-password').type = toggle.checked ? 'text' : 'password';
        }
    </script>
@endsection
