<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Horario;
use App\Models\Actividad;

class CrearActividadController extends Controller
{
    public function create()
    {
        $monitores = Usuario::where('tipo_usuario', 'monitor')->get(); // Filtrar solo monitores
        $horarios = Horario::all(); // Obtén todos los horarios
        return view('CrearActividades', compact('monitores', 'horarios'));
    }

    public function store(Request $request)
{
    // Registrar datos recibidos
    $request->validate([
        'nombre' => 'required|unique:actividades',
        'descripcion' => 'required',
        'importe' => 'required|numeric',
        'aforo' => 'required|integer',
        'id_monitor' => 'required|exists:usuarios,id',
        'id_horario' => 'required|exists:horarios,id',
        'imagen' => 'required|image|max:2048',
    ]);

    // Subir Imagen
    $path = $request->file('imagen')->store('public/images');
    $filename = basename($path);

    // Crear Actividad
    Actividad::create([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'importe' => $request->importe,
        'aforo' => $request->aforo,
        'id_monitor' => $request->id_monitor,
        'id_horario' => $request->id_horario,
        'imagen' => $filename,
    ]);
    
    return redirect()->route('actividades.CrearActividades')->with('success', 'Actividad creada correctamente');

}

}
