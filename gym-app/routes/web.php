<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrearActividadController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\PaymentController;

// VISTAS PÚBLICAS
Route::get('/', function () {
    return view('home');
});

Route::get('/actividades-publico', [ActividadController::class, 'listActividades']);

Route::get('/actividades-publico/{id}', [ActividadController::class, 'show']);
Route::get('/actividades/publico/{id}', [CrearActividadController::class, 'showpublico'])->name('actividades.showpublico');

Route::get('/centros', function () {
    return view('centros');
});

Route::get('/contacto', function () {
    return view('contacto'); // El nombre de tu vista Blade
})->name('contacto');

Route::get('/sobre-nosotros', function () {
    return view('sobre_nosotros');
});

Route::get('/login', function () {
    return view('auth.login');
});
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', function () {
    auth()->logout();
    return redirect('/')->with('message', 'Sesión cerrada correctamente');
})->name('logout');

Route::get('/registro', function () {
    return view('auth.registro');
});
Route::post('/registro', [LoginController::class, 'registro']);

Route::get('/horarios-por-fecha', [HorarioController::class, 'getHorariosPorFecha']);

// VISTAS VISIBLES SOLO PARA EL ADMIN
Route::middleware(['role:admin'])->group(function () {
    // Poner aquí las rutas que solo puede ver el administrador
    Route::get('/listado-reservas', [ReservasController::class, 'listReservas']);
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/pendientes', [UsuarioController::class, 'pendientes'])->name('usuarios.pendientes');
    Route::get('/usuarios/buscar', [UsuarioController::class, 'buscar'])->name('usuarios.buscar');
    Route::put('/usuarios/{id}/bloquear', [UsuarioController::class, 'bloquear'])->name('usuarios.bloquear');
    Route::put('/usuarios/{id}/desbloquear', [UsuarioController::class, 'desbloquear'])->name('usuarios.desbloquear');
    Route::put('/usuarios/{id}/aprobar', [UsuarioController::class, 'aprobar'])->name('usuarios.aprobar');
    Route::delete('/usuarios/{id}/rechazar', [UsuarioController::class, 'rechazar'])->name('usuarios.rechazar');

    Route::get('/horarios/create', [HorarioController::class, 'create'])->name('horarios.create');
    Route::post('/horarios', [HorarioController::class, 'store'])->name('horarios.store');
});

// VISTAS VISIBLES SOLO PARA EL SOCIO
Route::middleware(['role:socio'])->group(function () {
    // Poner aquí las rutas que solo puede ver el socio
    Route::get('/mis-reservas', [ReservasController::class, 'listReservasByUser'])->name('mis-reservas');
    Route::get('/mis-reservas/cancelar/{id}', [ReservasController::class, 'deleteReserva'])->name('cancelar');
    Route::post('/reservar', [ReservasController::class, 'reservar'])->name('reservar');
    Route::get('/wallet', [WalletController::class, 'index'])->name('wallet');
    Route::get('pagos', [WalletController::class, 'pagos'])->name('pagos.index');
    Route::get('/perfil/dar-baja', function () {
        return view('darBaja');
    });
    Route::post('/perfil/dar-baja', [PerfilController::class, 'darBaja']);
});

// VISTAS VISIBLES SOLO PARA EL MONITOR
Route::middleware(['role:monitor'])->group(function () {
    // Poner aquí las rutas que pueden ver el administrador, el monitor y el socio
    Route::get('/mis-actividades', [ActividadController::class, 'listbyMonitor']);
    Route::get('/mis-actividades/{id}', [ActividadController::class, 'show']);
    Route::get('/mis-actividades/{id}/reservas', [ActividadController::class, 'showReservas'])->name('actividades.reservas');

});

// VISTAS VISIBLES SOLO PARA EL ADMIN Y EL MONITOR
Route::middleware(['role:admin,monitor'])->group(function () {
    Route::get('/actividades/create', [CrearActividadController::class, 'create'])->name('actividades.create');
    Route::post('/actividades', [CrearActividadController::class, 'store'])->name('actividades.store');
    Route::get('/actividades/{id}/edit', [CrearActividadController::class, 'edit'])->name('actividades.edit');
    Route::put('/actividades/{id}', [CrearActividadController::class, 'update'])->name('actividades.update');
    Route::delete('/actividades/{id}', [CrearActividadController::class, 'destroy'])->name('actividades.destroy');
    Route::get('/actividades', [CrearActividadController::class, 'index'])->name('actividades.index');
    Route::get('/actividades/{id}', [CrearActividadController::class, 'show'])->name('actividades.show');
});

// VISTAS VISIBLES PARA EL ADMIN, EL MONITOR Y EL SOCIO
Route::middleware(['role:admin,monitor,socio'])->group(function () {
    Route::get('/perfil',[PerfilController::class, 'verPerfil']);
    Route::get('/perfil/modificar', [PerfilController::class, 'modificar']);
    Route::post('/perfil/modificar', [PerfilController::class, 'guardarModificacion']);    

    Route::get('/perfil/modificar-password', function () {
        return view('cambiarPassword');
    });
    Route::post('/perfil/modificar-password', [PerfilController::class, 'modificarPassword']);

    Route::get('/pago', function () {
        return view('formulariopago');
    })->name('payment.form');

    Route::post('/recargar', [PaymentController::class, 'recargar'])->name('recargar');    
    Route::get('/callback', [PaymentController::class, 'callback'])->name('callback');

});
