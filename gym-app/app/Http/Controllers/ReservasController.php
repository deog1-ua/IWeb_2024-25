<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservasController extends Controller
{
    public function listReservas()
    {
        $reservas = Reserva::all();
        return view('listaReservas', compact('reservas'));
    }

    public function listReservasByUser($id)
    {
        $reservas = Reserva::where('usuario_id', $id)->get();
        return view('listaReservas', compact('reservas'));
    }
}
