<?php


namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('layouts.view_public.register');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'correo' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Manejar los errores de validación
        if ($validator->fails()) {
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        }

        // Crear y guardar el usuario
        $user = new User;
        $user->nombre = $request->nombre;
        $user->email = $request->correo;
        $user->password = Hash::make($request->password);
        $user->save();

        // Autenticar al usuario después de registrarse
        auth()->login($user);

        // Redirigir después del registro
        return redirect()->route('home');
    }
}
