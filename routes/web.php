<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\DeportistaController;


Route::resource('paises', PaisController::class);

Route::resource('disciplina', DisciplinaController::class);

Route::resource('deportista', DeportistaController::class);

// Rutas de login
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/registro', [AuthController::class, 'registro'])->name('registro');
Route::get('/verify', [AuthController::class, 'showVerifyForm'])->name('verify.form');
Route::post('/verify', [AuthController::class, 'verifyEmail'])->name('verify.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Ruta por defecto - muestra el login
Route::get('/', function () {
    return redirect()->route('login');  // Cambia esto
});