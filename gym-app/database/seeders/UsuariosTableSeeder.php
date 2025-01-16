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
                'nombre_usuario' => 'Aida',
                'email' => 'aida@gmail.com',
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
                'saldo' => 20.00,
                'imagen' => 'images-profile/user-default.jpg',
            ],
            [
                'tipo_usuario' => 'admin',
                'dni' => '87654321B',
                'nombre' => 'Daniela',
                'apellidos' => 'Orellana',
                'nombre_usuario' => 'Dani',
                'email' => 'dani@gmail.com',
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
                'saldo' => 30.00,
                'imagen' => 'images-profile/user-default.jpg',
            ],
            // Monitors
            [
                'tipo_usuario' => 'monitor',
                'dni' => '23456789C',
                'nombre' => 'Juan Antonio',
                'apellidos' => 'Gonzalez Ruiz',
                'nombre_usuario' => 'Juanan23',
                'email' => 'juananGonzalez@gmail.com',
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
                'saldo' => 45.00,
                'imagen' => 'images-profile/user-default.jpg',
            ],
            [
                'tipo_usuario' => 'monitor',
                'dni' => '34567890D',
                'nombre' => 'Melisa',
                'apellidos' => 'Rodiguez Lucas',
                'nombre_usuario' => 'MeliLu',
                'email' => 'melissaRo@gmail.com',
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
                'saldo' => 30.00,
                'imagen' => 'images-profile/user-default.jpg',
            ],
            // Socios
            [
                'tipo_usuario' => 'socio',
                'dni' => '45678901E',
                'nombre' => 'Fernando',
                'apellidos' => 'Alonso Díaz',
                'nombre_usuario' => 'Fernanito33',
                'email' => 'fernandito33@hotmail.com',
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
                'saldo' => 25.00,
                'imagen' => 'images-profile/user-default.jpg',
            ],
            [
                'tipo_usuario' => 'socio',
                'dni' => '56789012F',
                'nombre' => 'Stefani Joanne',
                'apellidos' => 'Angelina Germanotta',
                'nombre_usuario' => 'lady gaga',
                'email' => 'ladyGAGA@hotmail.com',
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
                'saldo' => 32.25,
                'imagen' => 'images-profile/user-default.jpg',
            ],

            [
                'tipo_usuario' => 'socio',
                'dni' => '56789012M',
                'nombre' => 'Paca María',
                'apellidos' => 'López García',
                'nombre_usuario' => 'paca33',
                'email' => 'laPaca@gmail.com',
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
                'saldo' => 16.85,
                'imagen' => 'images-profile/user-default.jpg',
            ],
        ];

        DB::table('usuarios')->insert($usuarios);
    }
}
