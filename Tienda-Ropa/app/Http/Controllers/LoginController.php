<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // Redirección después del inicio de sesión exitoso
    protected $redirectTo = 'home';

    public function __construct()
    {
        // Middleware: redirigir a 'home' si el usuario ya está autenticado
        $this->middleware('guest')->except('logout');
    }

    // Muestra el formulario de inicio de sesión
    public function showLoginForm()
    {
        return view('layouts.view_public.login');
    }

    // Método para manejar el inicio de sesión
    public function login(LoginRequest $request)
    {
        // El formulario ya está validado en este punto

        // Intentar autenticar al usuario
        if ($this->attemptLogin($request)) {
            // Autenticación exitosa

            // Puedes personalizar la lógica aquí si es necesario

            // Redirigir a la página deseada (en este caso, 'home')
            return redirect()->intended($this->redirectPath());
        }

        // Autenticación fallida

        // Puedes personalizar la lógica aquí si es necesario

        // Redirigir de vuelta al formulario de inicio de sesión con un mensaje de error
        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
            'email' => trans('auth.failed'),
        ]);
    }

    // Lógica para cerrar sesión
    public function logout(Request $request)
    {
        // Cierra la sesión del usuario
        $this->guard()->logout();

        // Invalida la sesión y regresa al inicio
        $request->session()->invalidate();

        return redirect('home');
    }
}
