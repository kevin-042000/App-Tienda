<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;

class AdminRoleController extends Controller
{
    //vista menu roles
    public function showRoles()
    {
        return view('layouts.view_private.admin_roles');
    }
    
    // Mostrar la lista de usuarios
    public function userList()
    {
        $users = User::all();
        return view('layouts.view_private.admin.users.list', compact('users'));
    }

    // Mostrar la lista de administradores honorarios
    public function honoraryAdminList()
    {
        $honoraryAdmins = User::whereHas('roles', function ($query) {
            $query->where('name', 'administrador_honorario');
        })->get();

        return view('layouts.view_private.admin.honorary-admins.list', compact('honoraryAdmins'));
    }
     

    //mostrar lista de administradores
    public function adminList()
    {
        // Obtener el rol "Administrador" desde la base de datos
        $adminRole = Role::where('name', 'Administrador')->first();

        // Verificar si el rol existe
        if ($adminRole) {
            // Obtener la lista de usuarios con el rol de administrador
            $administradores = $adminRole->users;

            // Pasar la lista de administradores a la vista
            return view('layouts.view_private.admin.admin_list', compact('administradores'));
        }

        // Manejar el caso en que el rol no exista
        return view('admin.admin_list', ['administradores' => []]);
    }

    // Mostrar la lista de roles disponibles
    public function roleList()
    {
        $roles = Role::all();
        return view('layouts.view_private.admin.roles.list', compact('roles'));
    }

    // Asignar un rol a un usuario
    public function assignRole($userId, $roleId)
    {
        $user = User::findOrFail($userId);
        $role = Role::findOrFail($roleId);

        $user->roles()->attach($role);

        return redirect()->back();
    }

    // Quitar un rol a un usuario
    public function removeRole($userId, $roleId)
    {
        $user = User::findOrFail($userId);
        $role = Role::findOrFail($roleId);

        $user->roles()->detach($role);

        return redirect()->back();
    }
}
