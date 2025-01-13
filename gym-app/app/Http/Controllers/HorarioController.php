<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Horario;

class HorarioController extends Controller
{
    public function getHorariosPorFecha(Request $request)
    {
        $fecha = $request->input('fecha');

        // Obtiene los horarios disponibles para la fecha seleccionada
        $horarios = Horario::where('fecha', $fecha)->get();

        // Retorna los horarios en formato JSON
        return response()->json($horarios);
    }
}

