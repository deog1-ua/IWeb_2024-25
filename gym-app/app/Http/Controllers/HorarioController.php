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

    public function create()
    {
        // Solo el administrador puede acceder
        return view('crearHorario');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'sala' => 'required|string|unique:horarios,sala',
            'aforo' => 'required|integer|min:1',
        ]);

        // Crear el horario
        Horario::create([
            'fecha' => $request->fecha,
            'hora_inicio' => $request->hora_inicio,
            'hora_fin' => $request->hora_fin,
            'sala' => $request->sala,
            'aforo' => $request->aforo,
            'actividad_id' => null, // Inicialmente sin actividad asignada
        ]);

        return redirect()->route('horarios.create')->with('success', 'Horario creado correctamente.');
    }

}
