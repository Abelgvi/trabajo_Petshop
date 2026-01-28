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
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // --- NUEVO: RECUPERAR EL CARRITO DE LA BBDD ---
            /** @var \App\Models\User $user */
            $user = Auth::user();

            // Si el usuario tiene un carrito guardado de la última vez...
            if ($user->carrito_data) {
                $dbCart = json_decode($user->carrito_data, true);
                
                // ... lo volvemos a poner en la sesión actual
                session()->put('cart', $dbCart);
            }
            // ----------------------------------------------

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