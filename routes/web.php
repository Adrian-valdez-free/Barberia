<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        /** @var \App\Models\User $user */ // <--- ESTO LE DICE AL EDITOR QUIÉN ES EL USUARIO
        $user = Auth::user();

        if (!$user) {
        return redirect()->route('login');
        }

        if ($user->hasRole('Administrador')) {
            return redirect()->route('admin.dashboard'); 
            }// Asegúrate que esta ruta exista en routes/admin.php
        if ($user->hasAnyRole(['Barberos', 'Recepcionista'])) {
            return redirect()->route('staff.dashboard');
        }
        
    })->name('dashboard');
    Route::get('/', function () {
    // Opción A: Mandarlos al Login
    return redirect()->route('login'); 
    
    // Opción B: Mostrar la vista de bienvenida (si la tienes)
    // return view('welcome');
});
});
