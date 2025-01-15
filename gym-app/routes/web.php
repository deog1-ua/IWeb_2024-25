<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\CrearActividadController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\WalletController;

Route::get('/', function () {
    return view('home');
});

Route::get('/centros', function () {
    return view('centros');
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
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::put('/usuarios/{id}/bloquear', [UsuarioController::class, 'bloquear'])->name('usuarios.bloquear');
    Route::put('/usuarios/{id}/aprobar', [UsuarioController::class, 'aprobar'])->name('usuarios.aprobar');
    Route::delete('/usuarios/{id}/rechazar', [UsuarioController::class, 'rechazar'])->name('usuarios.rechazar');

});

Route::middleware(['role:admin,monitor'])->group(function () {
    // Poner aquí las rutas que solo pueden ver el administrador y el monitor
});

Route::middleware(['role:socio'])->group(function () {
    Route::get('/wallet', [WalletController::class, 'index'])->name('wallet');
    Route::get('pagos', [WalletController::class, 'pagos'])->name('pagos.index');
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
