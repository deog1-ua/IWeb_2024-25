<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;

class HorarioController extends Controller
{
    public function getHorariosPorFecha(Request $request)
    {
        $fecha = $request->input('fecha');

        // Filtrar horarios por fecha y que no tengan actividad asociada
        $horarios = Horario::where('fecha', $fecha)
            ->whereNull('actividad_id') // Horarios sin actividad asociada
            ->get();

        return response()->json($horarios);
    }
}
