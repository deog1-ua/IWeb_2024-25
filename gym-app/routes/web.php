<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrearActividadController;
use App\Http\Controllers\HorarioController;

Route::get('/', function () {
    return view('dashboard');
});


Route::get('/sobre-nosotros', function () {
    return view('sobre_nosotros');
});
Route::get('/contacto', function () {
    return view('contacto'); // El nombre de tu vista Blade
})->name('contacto');



Route::get('/actividades/create', [CrearActividadController::class, 'create'])->name('actividades.CrearActividades');
Route::post('/actividades', [CrearActividadController::class, 'store'])->name('actividades.store');
Route::get('/actividades', [ActividadController::class, 'index'])->name('actividades.index');

Route::get('/horarios-por-fecha', [HorarioController::class, 'getHorariosPorFecha']);


Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/registro', function () {
    return view('auth.registro');
});
