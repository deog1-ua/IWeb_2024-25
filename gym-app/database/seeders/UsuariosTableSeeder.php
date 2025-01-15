<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = [
            // Admins
            [
                'tipo_usuario' => 'admin',
                'dni' => '12345678A',
                'nombre' => 'Aida',
                'apellidos' => 'Argente',
                'nombre_usuario' => 'admin1',
                'email' => 'admin1@example.com',
                'fecha_nacimiento' => '1980-01-01',
                'telefono' => '600111222',
                'genero' => 'mujer',
                'peso' => 75.5,
                'altura' => 175,
                'fecha_alta' => now(),
                'activo' => true,
                'fecha_baja' => null,
                'saldo' => 0.0,
                'direccion_id' => 1,
                'imagen' => 'images-profile/user-default.jpg',
            ],
            [
                'tipo_usuario' => 'admin',
                'dni' => '87654321B',
                'nombre' => 'Daniela',
                'apellidos' => 'Orellana',
                'nombre_usuario' => 'admin2',
                'email' => 'admin2@example.com',
                'fecha_nacimiento' => '1985-05-15',
                'telefono' => '600333444',
                'genero' => 'mujer',
                'peso' => 68.2,
                'altura' => 168,
                'fecha_alta' => now(),
                'activo' => true,
                'fecha_baja' => null,
                'saldo' => 0.0,
                'direccion_id' => 2,
                'imagen' => 'images-profile/user-default.jpg',
            ],
            // Monitors
            [
                'tipo_usuario' => 'monitor',
                'dni' => '23456789C',
                'nombre' => 'Monitor',
                'apellidos' => 'Uno',
                'nombre_usuario' => 'monitor1',
                'email' => 'monitor1@example.com',
                'fecha_nacimiento' => '1990-07-10',
                'telefono' => '600555666',
                'genero' => 'hombre',
                'peso' => 82.0,
                'altura' => 185,
                'fecha_alta' => now(),
                'activo' => true,
                'fecha_baja' => null,
                'saldo' => 0.0,
                'direccion_id' => 3,
                'imagen' => 'images-profile/user-default.jpg',
            ],
            [
                'tipo_usuario' => 'monitor',
                'dni' => '34567890D',
                'nombre' => 'Monitor',
                'apellidos' => 'Dos',
                'nombre_usuario' => 'monitor2',
                'email' => 'monitor2@example.com',
                'fecha_nacimiento' => '1992-09-20',
                'telefono' => '600777888',
                'genero' => 'mujer',
                'peso' => 70.5,
                'altura' => 170,
                'fecha_alta' => now(),
                'activo' => true,
                'fecha_baja' => null,
                'saldo' => 0.0,
                'direccion_id' => 4,
                'imagen' => 'images-profile/user-default.jpg',
            ],
            // Socios
            [
                'tipo_usuario' => 'socio',
                'dni' => '45678901E',
                'nombre' => 'Socio',
                'apellidos' => 'Uno',
                'nombre_usuario' => 'socio1',
                'email' => 'socio1@example.com',
                'fecha_nacimiento' => '2000-03-25',
                'telefono' => '600999000',
                'genero' => 'hombre',
                'peso' => 68.0,
                'altura' => 176,
                'fecha_alta' => now(),
                'activo' => true,
                'fecha_baja' => null,
                'saldo' => 0.0,
                'direccion_id' => 5,
                'imagen' => 'images-profile/user-default.jpg',
            ],
            [
                'tipo_usuario' => 'socio',
                'dni' => '56789012F',
                'nombre' => 'Socio',
                'apellidos' => 'Dos',
                'nombre_usuario' => 'socio2',
                'email' => 'socio2@example.com',
                'fecha_nacimiento' => '1998-12-15',
                'telefono' => '600111222',
                'genero' => 'mujer',
                'peso' => 65.0,
                'altura' => 165.9,
                'fecha_alta' => now(),
                'activo' => true,
                'fecha_baja' => null,
                'saldo' => 0.0,
                'direccion_id' => 6,
                'imagen' => 'images-profile/user-default.jpg',
            ],

            [
                'tipo_usuario' => 'socio',
                'dni' => '56789012M',
                'nombre' => 'Socio',
                'apellidos' => 'Tres',
                'nombre_usuario' => 'socio3',
                'email' => 'socio3@example.com',
                'fecha_nacimiento' => '1998-12-15',
                'telefono' => '600111222',
                'genero' => 'mujer',
                'peso' => 65.0,
                'altura' => 1.65,
                'fecha_alta' => now(),
                'activo' => true,
                'fecha_baja' => null,
                'saldo' => 0.0,
                'direccion_id' => 6,
                'imagen' => 'images-profile/user-default.jpg',
            ],
        ];

        DB::table('usuarios')->insert($usuarios);
    }
}
