<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Valida las credenciales e inicia la sesión del usuario.
     */
    public function login(Request $request)
    {
        // Comprueba que el correo y la contraseña tengan el formato esperado.
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Busca un usuario con esas credenciales y procesa la opción "recordarme".
        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            // Devuelve el formulario con el error y conserva únicamente el correo.
            return back()->withErrors([
                'email' => 'Las credenciales no coinciden con nuestros registros.',
            ])->withInput($request->only('email'));
        }

        // Genera un nuevo identificador de sesión para evitar fijación de sesión.
        $request->session()->regenerate();

        // Regresa a la página solicitada o a la página principal por defecto.
        return redirect()->intended(route('home'));
    }

    /**
     * Valida y almacena una nueva cuenta en la tabla users.
     */
    public function register(Request $request)
    {
        // Verifica los datos del formulario y que el correo no esté registrado.
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'address' => ['nullable', 'string', 'max:255'],
            'gender' => ['nullable', 'string', 'in:masculino,femenino,prefiero_no_decirlo'],
            'phone' => ['required', 'string', 'max:30'],
            'password' => ['required', 'string', 'min:7', 'confirmed'],
        ]);

        // El registro público nunca puede elegir privilegios; comienza como aspirante.
        $data['role'] = 'aspirante';

        // El modelo User aplica el hash configurado para la contraseña.
        User::create($data);

        // Informa el resultado y envía al formulario de inicio de sesión.
        return redirect()->route('auth.access')
            ->with('status', 'Registro exitoso. Ahora puedes iniciar sesión.');
    }

    /**
     * Actualiza el rol público elegido por el usuario desde el home.
     */
    public function updateRole(Request $request)
    {
        // Solo se aceptan roles públicos; admin no puede asignarse desde este formulario.
        $data = $request->validate([
            'role' => ['required', 'string', 'in:usuario,aspirante,aprendiz'],
        ]);

        // Guarda el rol seleccionado en la cuenta autenticada.
        $request->user()->update(['role' => $data['role']]);

        // Regresa al home mostrando el resultado de la actualización.
        return redirect()->route('home')->with('status', 'Rol actualizado correctamente.');
    }

    /**
     * Finaliza la sesión activa y limpia sus datos asociados.
     */
    public function logout(Request $request)
    {
        // Desconecta al usuario autenticado.
        Auth::logout();

        // Invalida la sesión actual y genera un nuevo token CSRF.
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Regresa a la página principal después del cierre de sesión.
        return redirect()->route('home');
    }
}