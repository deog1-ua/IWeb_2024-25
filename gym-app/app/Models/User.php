<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'usuarios';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tipo_usuario',
        'dni',
        'nombre',
        'apellidos',
        'nombre_usuario',
        'email',
        'email_verified_at',
        'fecha_nacimiento',
        'telefono',
        'genero',
        'peso',
        'altura',
        'fecha_alta',
        'activo',
        'fecha_baja',
        'saldo',
        'imagen',
        'direccion_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            //'fecha_alta' => 'datetime',
            //'fecha_baja' => 'datetime',
            //'fecha_nacimiento' => 'date'
        ];
    }

    public function direccion()
    {
        return $this->belongsTo(Direccion::class);
    }

    public function getPasswordAttribute()
    {
        return $this->passwords()->latest()->first()->password;
    }

    public function passwords()
    {
        return $this->hasMany(Password::class, 'usuario_id');
    }

    public function token()
    {
        return $this->hasOne(Token::class);
    }

    public function pago()
    {
        return $this->hasMany(Pago::class);
    }

    public function actividad()
    {
        return $this->hasMany(Actividad::class);
    }

    public function actividad_socio() {

        return $this->belongsToMany(Actividad::class);
    }

    public function reserva()
    {
        return $this->hasMany(Reserva::class);
    }
}
