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

    public function edit($id)
    {
        $actividad = Actividad::with('user', 'horario')->findOrFail($id);
        $monitores = User::where('tipo_usuario', 'monitor')->get();
        
        // Cargar horarios disponibles (aquellos que no tienen actividad asignada o tienen la actividad actual)
        $horarios = Horario::whereNull('actividad_id')
            ->orWhere('actividad_id', $actividad->id)
            ->get();
    
        return view('actividadedit', compact('actividad', 'monitores', 'horarios'));
    }

    public function update(Request $request, $id)
    {
        $actividad = Actividad::findOrFail($id);
    
        $request->validate([
            'nombre' => 'required|unique:actividades,nombre,' . $actividad->id,
            'descripcion' => 'required',
            'importe' => 'required|numeric',
            'id_monitor' => 'required|exists:usuarios,id',
            'id_horario' => 'nullable|exists:horarios,id',
            'imagen' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = $file->getClientOriginalName(); // Obtiene el nombre original
            $path = $file->storeAs('public/images', $filename); // Guarda con el nombre original
            $actividad->imagen = $filename; // Actualiza solo el nombre en la base de datos
        }
    

        // Actualiza los datos principales de la actividad
        $actividad->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'importe' => $request->importe,
            'usuario_id' => $request->id_monitor,
        ]);

        // Manejo del horario
        if ($request->id_horario) {
            // Limpia el horario anterior de la actividad
            Horario::where('actividad_id', $actividad->id)->update(['actividad_id' => null]);

            // Asigna el nuevo horario
            Horario::where('id', $request->id_horario)->update(['actividad_id' => $actividad->id]);
        }

        return redirect()->route('actividades.index')->with('success', 'Actividad actualizada correctamente');
    }  
    
        public function destroy($id)
    {
        $actividad = Actividad::findOrFail($id);

        // Liberar los horarios asociados
        Horario::where('actividad_id', $actividad->id)->update(['actividad_id' => null]);

        // Eliminar la actividad
        $actividad->delete();

        return redirect()->route('actividades.index')->with('success', 'Actividad eliminada correctamente');
    }


}
