<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $table = 'horarios';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'hora_inicio',
        'hora_fin',
        'fecha',
        'aforo',
        'actividad_id',
        'sala_id',
    ];


    public function reserva()
    {
        return $this->hasMany(Reserva::class);
    }

    public function actividad() {
        
        return $this->belongsTo(Actividad::class, 'actividad_id');
    }

    public function sala() {
        
        return $this->belongsTo(Sala::class, 'sala_id');
    }

}
