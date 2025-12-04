<?php


use App\Http\Controllers\Staff\ServiceController;
use App\Models\Service;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){
  return view('staff.dashboard');
})->name('dashboard');




Route::resource('services', ServiceController::class);

