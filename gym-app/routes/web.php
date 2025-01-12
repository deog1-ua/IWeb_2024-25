<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/contacto', function () {
    return view('contacto'); // El nombre de tu vista Blade
})->name('contacto');

use App\Http\Controllers\CrearActividadController;

Route::get('/actividades/create', [CrearActividadController::class, 'create'])->name('actividades.CrearActividades');
Route::post('/actividades', [CrearActividadController::class, 'store'])->name('actividades.store');
Route::get('/actividades', [ActividadController::class, 'index'])->name('actividades.index');

use App\Http\Controllers\HorarioController;

Route::get('/horarios-por-fecha', [HorarioController::class, 'getHorariosPorFecha']);


Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/registro', function () {
    return view('auth.registro');
});

