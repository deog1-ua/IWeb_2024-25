<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;
use App\Models\Horario;

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

}
