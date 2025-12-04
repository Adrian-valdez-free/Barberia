<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ServiceController;
use App\Models\Service;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){
  return view('staff.dashboard');
})->name('dashboard');

//Gestion de roles


Route::resource('services', ServiceController::class);

