<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;
use App\Models\Horario;
use App\Models\User;

class ActividadController extends Controller
{
    public function listActividades()
    {
        $actividades = Actividad::all();
        return view('listar.listarActividades', compact('actividades'));
    }

    public function listbyMonitor(){
        $actividades = Actividad::where('usuario_id', auth()->user()->id)->get();
        $actividad1 = Actividad::with('horario')->first();
        return view('listar.listarMisActividades', compact('actividades', 'actividad1'));
    }

    public function show($id)
    {
        $actividad = Actividad::with('user', 'horario')->findOrFail($id);

        // Verificar que el monitor solo pueda acceder a actividades asignadas a él
        if (auth()->user()->tipo_usuario === 'monitor' && $actividad->usuario_id !== auth()->user()->id) {
            abort(403, 'No tienes permiso para ver esta actividad.');
        }

        return view('mostrar.detalleActividad', compact('actividad'));
    }

    public function showReservas($actividadId)
    {
        // Verificar que la actividad existe
        $actividad = Actividad::findOrFail($actividadId);

        // Obtener usuarios que han reservado esta actividad
        $usuarios = User::whereHas('reserva', function ($query) use ($actividadId) {
            $query->whereHas('horario', function ($q) use ($actividadId) {
                $q->where('actividad_id', $actividadId);
            });
        })->get();

        return view('mostrar.mostrarReservas', compact('actividad', 'usuarios'));
    }

}
