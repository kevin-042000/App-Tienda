<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('layouts.view_public.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // El usuario ha sido autenticado
            return redirect()->route('home');
        }

        // Si la autenticación falla, redirige de nuevo al formulario de inicio de sesión con un mensaje de error.
        return redirect('login')->with('error', 'Credenciales incorrectas. Por favor, inténtalo de nuevo.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

}
