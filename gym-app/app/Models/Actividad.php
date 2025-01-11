<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'importe',
        'aforo',
        'id_monitor',
        'id_horario'
    ];

    // Relación con el modelo Usuario (Monitor)
    public function monitor()
    {
        return $this->belongsTo(Usuario::class, 'id_monitor');
    }

    // Relación con Usuarios (Socios inscritos)
    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'actividad_usuario', 'id_actividad', 'id_usuario');
    }
}
