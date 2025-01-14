<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;

class ReservasController extends Controller
{
    public function listReservas()
    {
        /// ordenalos de mas pronto a mas tarde por fecha de horario
        $reservas = Reserva::with('horario')
                    ->get()
                    ->sortBy('horario.fecha'); 
        return view('listar.listarReservas', compact('reservas'));
    }


    public function listReservasByUser()
    {
        $id = auth()->user()->id;
        $reservas = Reserva::with('horario')
                    ->where('usuario_id', $id) // Filtrar por usuario_id
                    ->get()
                    ->sortBy('horario.fecha');
        return view('listar.listarReservas', compact('reservas'));
    }

    public function deleteReserva($id)
    {
        $reserva = Reserva::where('usuario_id', auth()->user()->id)
                    ->where('horario_id', $id)
                    ->first();
        if ($reserva) {
            $reserva->delete();

            return redirect()->back()->with('success', 'Reserva cancelada correctamente');
        }
        else{
            return redirect()->back()->with('error', 'Reserva no encontrada');
        }

    }

    public function reservar(Request $request)
    {
        $request->validate([
            'horario_id' => 'required|exists:horarios,id',
        ]);

        $reserva = Reserva::create([
            'usuario_id' => auth()->user()->id,
            'horario_id' => $request->horario_id,
        ]);

        return redirect()->back()->with('success', 'Reserva realizada correctamente');
    }
}