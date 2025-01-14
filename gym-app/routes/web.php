<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrearActividadController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\ActividadController;


Route::get('/', function () {
    return view('home');
});


Route::get('/sobre-nosotros', function () {
    return view('sobre_nosotros');
});
Route::get('/contacto', function () {
    return view('contacto'); // El nombre de tu vista Blade
})->name('contacto');


//Route::get('/actividades', [ActividadController::class, 'listActividades']);


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
    Route::get('/listado-reservas', [ReservasController::class, 'listReservas']);
});

Route::middleware(['role:admin,monitor'])->group(function () {
    // Poner aquí las rutas que solo pueden ver el administrador y el monitor
});

Route::middleware(['role:socio'])->group(function () {
    // Poner aquí las rutas que solo puede ver el socio
    Route::get('/mis-reservas', [ReservasController::class, 'listReservasByUser']);
    Route::get('/mis-reservas/cancelar/{id}', [ReservasController::class, 'deleteReserva']);
});

Route::middleware(['role:monitor'])->group(function () {
    // Poner aquí las rutas que pueden ver el administrador, el monitor y el socio
    Route::get('/mis-actividades', [ActividadController::class, 'listbyMonitor']);
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

