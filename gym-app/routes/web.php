<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PerfilController;

Route::get('/', function () {
    return view('home');
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
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', function () {
    auth()->logout();
    return redirect('/');
})->name('logout');

Route::get('/registro', function () {
    return view('auth.registro');
});
Route::post('/registro', [LoginController::class, 'registro']);

Route::middleware(['role:admin'])->group(function () {
    // Poner aquí las rutas que solo puede ver el administrador
});

Route::middleware(['role:admin,monitor'])->group(function () {
    // Poner aquí las rutas que solo pueden ver el administrador y el monitor
});

Route::middleware(['role:admin,monitor,socio'])->group(function () {
    Route::get('/perfil', function () {
        return view('perfil');
    });
    Route::get('/perfil/modificar', [PerfilController::class, 'modificar']);
    Route::post('/perfil/modificar', [PerfilController::class, 'guardarModificacion']);
    Route::get('/perfil/dar-baja', function () {
        return view('darBaja');
    });
    Route::post('/perfil/dar-baja', [PerfilController::class, 'darBaja']);

    Route::get('/perfil/modificar-password', function () {
        return view('cambiarPassword');
    });
    Route::post('/perfil/modificar-password', [PerfilController::class, 'modificarPassword']);
});

