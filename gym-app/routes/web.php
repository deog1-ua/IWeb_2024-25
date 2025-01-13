<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/contacto', function () {
    return view('contacto'); // El nombre de tu vista Blade
})->name('contacto');

use App\Http\Controllers\CrearActividadController;
use App\Http\Controllers\HorarioController;

// Ruta para mostrar el formulario
Route::get('/actividades/create', [CrearActividadController::class, 'create'])->name('actividades.create');

// Ruta para almacenar la actividad
Route::post('/actividades', [CrearActividadController::class, 'store'])->name('actividades.store');

// Ruta para listar las actividades
Route::get('/actividades', [CrearActividadController::class, 'index'])->name('actividades.index');

Route::get('/actividades/{id}', [CrearActividadController::class, 'show'])->name('actividades.show');

// Ruta para obtener horarios por fecha
Route::get('/horarios-por-fecha', [HorarioController::class, 'getHorariosPorFecha']);

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/registro', function () {
    return view('auth.registro');
});

