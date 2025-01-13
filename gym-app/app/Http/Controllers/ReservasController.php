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
        $reserva = Reserva::find($id);
        if ($reserva) {
            $reserva->delete();
            return redirect()->route('listar.listarReservas')->with('success', 'Reserva cancelada correctamente');
        }
        else{
            return redirect()->route('listar.listarReservas')->with('error', 'Reserva no encontrada');
        }

    }
}