<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\User;
use App\Models\Horario;


class ReservasController extends Controller
{
    public function listReservas()
    {
        // Ordenar por usuario y luego por fecha de horario
        $reservas = Reserva::select('reservas.*')
        ->join('usuarios', 'reservas.usuario_id', '=', 'usuarios.id') // Asumiendo que 'usuario_id' es la clave foránea
        ->join('horarios', 'reservas.horario_id', '=', 'horarios.id') // Asumiendo que 'horario_id' es la clave foránea
        ->orderBy('usuarios.nombre_usuario') // Ordenar por nombre del usuario
        ->orderBy('horarios.fecha') // Ordenar por fecha del horario
        ->with(['user', 'horario']) // Cargar las relaciones
        ->get();

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
        
        $horario = Horario::find($id);
        if($horario->fecha < date('Y-m-d')){
            return redirect()->back()->with('error', 'No puedes cancelar una reserva de un horario pasado');
        }
        if ($reserva) {
            User::where('id', auth()->user()->id)->update([
                'saldo' => auth()->user()->saldo + $horario->actividad->importe,
            ]);
            $reserva->delete();

            return redirect()->back()->with('success', 'Reserva cancelada correctamente');
        }
        else{
            return redirect()->back()->with('error', 'Reserva no encontrada');
        }

    }

    public function reservar(Request $request)
    {
        if(auth()->user()->saldo <= $request->precio){
            return redirect()->back()->with('error', 'No tienes saldo suficiente para realizar la reserva');
        }
        else{
            $request->validate([
                'horario_id' => 'required|exists:horarios,id',
            ]);
    
            $reserva = Reserva::create([
                'usuario_id' => auth()->user()->id,
                'horario_id' => $request->horario_id,
            ]);

            User::where('id', auth()->user()->id)->update([
                'saldo' => auth()->user()->saldo - $request->precio,
            ]);
    
            return redirect()->back()->with('success', 'Reserva realizada correctamente');

        }

    }
}