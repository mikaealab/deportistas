<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaisController;

Route::get('/', [PaisController::class, 'index']);

Route::resource('paises', PaisController::class);