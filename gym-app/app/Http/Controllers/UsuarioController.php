<?php

namespace App\Http\Controllers;

use App\Models\User; // Modelo del usuario
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    public function buscar(Request $request)
    {
        $search = $request->get('search');

        $usuarios = User::where('activo', true)
                        ->where(function($query) use ($search) {
                            $query->where('nombre', 'like', "%$search%")
                                ->orWhere('apellidos', 'like', "%$search%")
                                ->orWhere('email', 'like', "%$search%")
                                ->orWhere('telefono', 'like', "%$search%");
                        })
                        ->get();

        $pendientes = User::where('activo', false)
                        ->where(function($query) use ($search) {
                            $query->where('nombre', 'like', "%$search%")
                                    ->orWhere('apellidos', 'like', "%$search%")
                                    ->orWhere('email', 'like', "%$search%")
                                    ->orWhere('telefono', 'like', "%$search%");
                        })
                        ->get();

        return view('filtrados', compact('usuarios', 'pendientes', 'search'));
    }


    public function index(Request $request)
    {
        $search = $request->get('search');

        // Filtrar usuarios activos según el término de búsqueda
        $usuarios = User::where('activo', true)
                        ->where(function($query) use ($search) {
                            $query->where('nombre', 'like', "%$search%")
                                ->orWhere('apellidos', 'like', "%$search%")
                                ->orWhere('email', 'like', "%$search%")
                                ->orWhere('telefono', 'like', "%$search%");
                        })
                        ->get();

        return view('filtrados', compact('usuarios', 'search'));
    }


    public function pendientes(Request $request)
    {
        $search = $request->get('search');

        // Filtrar usuarios pendientes según el término de búsqueda
        $pendientes = User::where('activo', false)
                        ->where(function($query) use ($search) {
                            $query->where('nombre', 'like', "%$search%")
                                    ->orWhere('apellidos', 'like', "%$search%")
                                    ->orWhere('email', 'like', "%$search%")
                                    ->orWhere('telefono', 'like', "%$search%");
                        })
                        ->get();

        return view('filtrados', compact('pendientes', 'search'));
    }




    public function bloquear($id)
    {
        $user = User::find($id);
        $user->bloqueado = 1;
        $user->save();

        return redirect()->route('usuarios.index')->with('message', 'Usuario bloqueado correctamente.');
    }

    public function desbloquear($id)
    {
        $user = User::find($id);
        $user->bloqueado = 0;
        $user->save();

        return redirect()->route('usuarios.index');
    }

    public function aprobar($id)
    {
        $user = User::find($id);
        $user->fecha_alta = now();
        $user->activo = 1;
        $user->save();

        return redirect()->route('usuarios.index')->with('message', 'Usuario aprobado correctamente.');
    }

    public function rechazar($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();  // Elimina al usuario de la base de datos
        }

        return redirect()->route('usuarios.index')->with('message', 'Usuario rechazado correctamente.');
    }

}