<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;

// Rutas de Registro
// Route::middleware(['guest', 'adminRegistration'])->group(function () {
//     Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
//     Route::post('/register', [RegisterController::class, 'register']);
// });

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


/// Rutas Publicas
// Home
Route::get('/', [PublicController::class, 'index'])->name('home');

/// Rutas Privadas
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/panel', [AdminController::class, 'panel'])->name('admin.panel');
    
});

