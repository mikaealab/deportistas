<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\DeportistaController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('paises', PaisController::class);

Route::resource('disciplina', DisciplinaController::class);

Route::resource('deportista', DeportistaController::class);