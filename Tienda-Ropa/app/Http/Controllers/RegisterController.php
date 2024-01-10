<?php


namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use App\Models\Role;

class RegisterController extends Controller
{
        public function showRegistrationForm()
        {
            return view('layouts.view_public.register');
        }
    
        public function register(RegistrationRequest $request)
        {
            // Manejar los errores de validación
            $validator = Validator::make($request->all(), $request->rules());
    
            if ($validator->fails()) {
                return redirect('register')
                    ->withErrors($validator)
                    ->withInput();
            }
    
            // Crear y guardar el usuario
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
    
            // Asignar automáticamente el rol "usuario"
            $user->roles()->attach(Role::where('name', 'usuario')->first());
    
            // Autenticar al usuario después de registrarse
            auth()->login($user);
    
            // Redirigir después del registro
            return redirect()->route('home');
        }
}