<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\Sala;
use Illuminate\Validation\Validator;

class HorarioController extends Controller
{
    public function getHorariosPorFecha(Request $request)
    {
        $fecha = $request->input('fecha');

        // Filtrar horarios por fecha y que no tengan actividad asociada
        $horarios = Horario::where('fecha', $fecha)
            ->whereNull('actividad_id') // Horarios sin actividad asociada
            ->with('sala:id,nombre') // Cargar solo el campo 'nombre' de la sala relacionada
            ->get()
            ->map(function ($horario) {
                return [
                    'id' => $horario->id,
                    'hora_inicio' => $horario->hora_inicio,
                    'hora_fin' => $horario->hora_fin,
                    'sala' => $horario->sala->nombre, // Devuelve solo el nombre de la sala
                    'aforo' => $horario->aforo,
                ];
            });

        return response()->json($horarios);
    }

    public function create()
    {
        // Obtener las salas disponibles
        $salas = Sala::all();
        // Solo el administrador puede acceder
        return view('crearHorario', compact('salas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'sala_id' => 'required|exists:salas,id',
            'aforo' => 'required|integer|min:1',
        ]);

        // Crear el horario
        Horario::create([
            'fecha' => $request->fecha,
            'hora_inicio' => $request->hora_inicio,
            'hora_fin' => $request->hora_fin,
            'sala_id' => $request->sala_id,
            'aforo' => $request->aforo,
            'actividad_id' => null, // Inicialmente sin actividad asignada
        ]);

        return redirect()->route('horarios.create')->with('message', 'Horario creado correctamente.');
    }

}
