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
                    <label for="register-name">Nombres completos</label>
                    <input id="register-name" name="name" type="text" class="form-control" placeholder="Nombres completos" value="{{ old('name') }}" required>
                    <label for="register-last-name">Apellidos completos</label>
                    <input id="register-last-name" name="last_name" type="text" class="form-control" placeholder="Apellidos completos" value="{{ old('last_name') }}" required>
                    <label for="register-email">Correo electrónico</label>
                    <input id="register-email" name="email" type="email" class="form-control" placeholder="correo@ejemplo.com" value="{{ old('email') }}" required>
                    <label for="register-address">Dirección <span class="text-muted">(opcional)</span></label>
                    <input id="register-address" name="address" type="text" class="form-control" placeholder="Dirección de residencia" value="{{ old('address') }}">
                    <label for="register-gender">Género <span class="text-muted">(opcional)</span></label>
                    <select id="register-gender" name="gender" class="form-select">
                        <option value="">Seleccionar</option>
                        <option value="masculino" @selected(old('gender') === 'masculino')>Masculino</option>
                        <option value="femenino" @selected(old('gender') === 'femenino')>Femenino</option>
                        <option value="prefiero_no_decirlo" @selected(old('gender') === 'prefiero_no_decirlo')>Prefiero no decirlo</option>
                    </select>
                    <label for="register-phone">Número de teléfono</label>
                    <input id="register-phone" name="phone" type="tel" class="form-control" placeholder="Número de teléfono" value="{{ old('phone') }}" required>
                    <label for="register-password">Contraseña</label>
                    <input id="register-password" name="password" type="password" class="form-control" minlength="7" placeholder="Mínimo 7 caracteres" required>
                    <label for="register-password-confirmation">Confirmar contraseña</label>
                    <input id="register-password-confirmation" name="password_confirmation" type="password" class="form-control" minlength="7" placeholder="Repite la contraseña" required>
                    <div class="form-check mt-2">
                        <input id="show-passwords" type="checkbox" class="form-check-input" onchange="toggleRegistrationPasswords(this)">
                        <label for="show-passwords" class="form-check-label">Mostrar contraseñas</label>
                    </div>
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

    <script>
        // Alterna la visibilidad de los dos campos de contraseña mientras se escribe.
        function toggleRegistrationPasswords(toggle) {
            const type = toggle.checked ? 'text' : 'password';
            document.getElementById('register-password').type = type;
            document.getElementById('register-password-confirmation').type = type;
        }
    </script>
@endsection
