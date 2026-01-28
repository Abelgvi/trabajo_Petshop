<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Muestra el formulario de login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Procesa los datos del formulario
    public function login(Request $request)
    {
        // 1. Validamos que los campos no estén vacíos
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Intentamos loguear al usuario
        // (Laravel comprueba email y contraseña encriptada automáticamente)
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Si entra, lo mandamos a la tienda o al inicio
            return redirect()->intended('/');
        }

        // 3. Si falla, volvemos atrás con un error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}