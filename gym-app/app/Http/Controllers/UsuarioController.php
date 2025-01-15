<?php

namespace App\Http\Controllers;

use App\Models\User; // Modelo del usuario
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::where('activo', true)->get();
        $pendientes = User::where('activo', false)->get();

        return view('filtrados', compact('usuarios', 'pendientes'));
    }

    public function bloquear($id)
    {
        $user = User::find($id);
        $user->bloqueado = 1;
        $user->save();

        return redirect()->route('usuarios.index');
    }

    public function aprobar($id)
    {
        $user = User::find($id);
        $user->fecha_alta = now();
        $user->activo = 1;
        $user->save();

        return redirect()->route('usuarios.index');
    }

    public function rechazar($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();  // Elimina al usuario de la base de datos
        }

        return redirect()->route('usuarios.index');
    }

}