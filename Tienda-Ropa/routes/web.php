<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminRoleController;


// Rutas de Registro
// Route::middleware(['guest', 'adminRegistration'])->group(function () {
//     Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
//     Route::post('/register', [RegisterController::class, 'register']);
// });

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('view.register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('view.login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



/// Rutas Publicas
// Home
Route::get('/', [PublicController::class, 'index'])->name('home');

/// Rutas Privadas
Route::get('/admin/panel', [AdminController::class, 'panel'])->name('admin.panel');

// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin/panel', [AdminController::class, 'panel'])->name('admin.panel');
    
// });

/// rutas para roles
// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin/users', [AdminRoleController::class, 'userList']);
//     Route::get('/admin/honorary-admins', [AdminRoleController::class, 'honoraryAdminList']);
//     Route::get('/admin/roles', [AdminRoleController::class, 'roleList']);
//     Route::post('/admin/assign-role/{userId}/{roleId}', [AdminRoleController::class, 'assignRole']);
//     Route::post('/admin/remove-role/{userId}/{roleId}', [AdminRoleController::class, 'removeRole']);
// });

//vista para el menu roles
    Route::get('/admin/panel/roles', [AdminRoleController::class, 'showRoles'])->name('view.roles');
    // Route::get('/admin/users', [AdminRoleController::class, 'userList'])->name('view.userList');
    // Route::get('/admin/honorary-admins', [AdminRoleController::class, 'honoraryAdminList'])->name('view.honoraryAdminList');
    // Route::get('/admin/roles', [AdminRoleController::class, 'roleList'])->name('view.roleList');
    // Route::post('/admin/assign-role/{userId}/{roleId}', [AdminRoleController::class, 'assignRole']);
    // Route::post('/admin/remove-role/{userId}/{roleId}', [AdminRoleController::class, 'removeRole']);