<?php

use App\Http\Controllers\AseoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AseoController::class, 'index'])->name('aseo.index');
Route::post('/aseo/actualizar', [AseoController::class, 'actualizar'])->name('aseo.actualizar');