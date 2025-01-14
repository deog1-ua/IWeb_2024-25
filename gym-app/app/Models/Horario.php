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
        'sala',
        'aforo',
        'actividad_id'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'fecha' => 'date',
        ];
    }

    public function reserva()
    {
        return $this->hasMany(Reserva::class);
    }

    public function actividad() {
        
        return $this->belongsTo(Actividad::class, 'actividad_id');
    }

}
