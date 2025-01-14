<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Horario;
use App\Models\Actividad;
use Carbon\Carbon;

class CrearActividadController extends Controller
{
    public function create()
    {
        // Obtener monitores para el desplegable
        $monitores = User::where('tipo_usuario', 'monitor')->get();

        return view('CrearActividades', compact('monitores'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|unique:actividades',
        'descripcion' => 'required',
        'importe' => 'required|numeric',
        'id_monitor' => 'required|exists:usuarios,id',
        'id_horario' => 'required|exists:horarios,id',
        'imagen' => 'required|image|max:2048',
    ]);

    // Subir la imagen con el nombre original
    $file = $request->file('imagen');
    $filename = $file->getClientOriginalName(); // Obtiene el nombre original
    $path = $file->storeAs('public/images', $filename); // Guarda el archivo con su nombre original

    // Crear actividad
    $actividad = Actividad::create([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'importe' => $request->importe,
        'imagen' => $filename, // Guarda solo el nombre del archivo en la base de datos
        'usuario_id' => $request->id_monitor,
    ]);

    // Actualizar el horario con la actividad creada
    Horario::where('id', $request->id_horario)->update(['actividad_id' => $actividad->id]);

    return redirect()->route('actividades.create')->with('success', 'Actividad creada correctamente');
}


    public function index()
    {
        // Obtener todas las actividades con horarios futuros y sus monitores
        $actividades = Actividad::with(['user', 'horario' => function($query) {
            $query->where('fecha', '>=', Carbon::now()->toDateString());
        }])->get();

        // Retornar solo las actividades que tienen horarios asociados
        $actividades = $actividades->filter(function($actividad) {
            return $actividad->horario->isNotEmpty();
        });

        return view('actividadindex', compact('actividades'));
    }

    public function show($id)
    {
        $actividad = Actividad::with('user', 'horario')->findOrFail($id);

        return view('actividadshow', compact('actividad'));
    }
}
