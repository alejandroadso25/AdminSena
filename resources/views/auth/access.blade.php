@extends('layouts.app')

@section('title', 'Inicio y Registro')

@section('content')
    {{-- Esta pantalla solo presenta los formularios; no tiene autenticación implementada. --}}
    <div class="access-page-header text-center">
        <p class="eyebrow text-success mb-2">PORTAL ADMINISTRATIVO</p>
        <h1>Inicio / Registro</h1>
        <p>Estos formularios son demostrativos y todavía no procesan información.</p>
    </div>

    <div class="row g-4 access-section pb-5">
        <div class="col-12 col-lg-6">
            <div class="access-panel">
                <span class="access-panel-icon"><i class="fas fa-lock"></i></span>
                <h2>Iniciar sesión</h2>
                <p>Accede a tu espacio de gestión.</p>
                <form action="#" method="get" onsubmit="return false;">
                    <label for="login-email">Correo electrónico</label>
                    <input id="login-email" type="email" class="form-control" placeholder="correo@ejemplo.com">
                    <label for="login-password">Contraseña</label>
                    <input id="login-password" type="password" class="form-control" placeholder="Contraseña">
                    <button type="submit" class="btn btn-sena w-100 mt-3">Iniciar sesión</button>
                </form>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="access-panel access-panel-register">
                <span class="access-panel-icon"><i class="fas fa-user-plus"></i></span>
                <h2>Registrarse</h2>
                <p>Crea tu cuenta para comenzar.</p>
                <form action="#" method="get" onsubmit="return false;">
                    <label for="register-name">Nombre completo</label>
                    <input id="register-name" type="text" class="form-control" placeholder="Nombre completo">
                    <label for="register-email">Correo electrónico</label>
                    <input id="register-email" type="email" class="form-control" placeholder="correo@ejemplo.com">
                    <label for="register-password">Contraseña</label>
                    <input id="register-password" type="password" class="form-control" placeholder="Contraseña">
                    <button type="submit" class="btn btn-outline-sena w-100 mt-3">Crear cuenta</button>
                </form>
            </div>
        </div>
    </div>
@endsection
