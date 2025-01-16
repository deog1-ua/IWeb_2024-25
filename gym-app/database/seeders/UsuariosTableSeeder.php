<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = [
            [
                'tipo_usuario' => 'admin',
                'dni' => '11111111A',
                'nombre' => 'Carlos',
                'apellidos' => 'Pérez Gómez',
                'nombre_usuario' => 'carlos_admin',
                'email' => 'carlos@gmail.com',
                'fecha_nacimiento' => '1980-02-12',
                'telefono' => '600123456',
                'genero' => 'hombre',
                'peso' => 80.0,
                'altura' => 180,
                'fecha_alta' => now(),
                'activo' => true,
                'fecha_baja' => null,
                'saldo' => 50.00,
                'direccion_id' => 1,
                'imagen' => 'images-profile/user-default.jpg',
            ],
            [
                'tipo_usuario' => 'admin',
                'dni' => '22222222B',
                'nombre' => 'Lucía',
                'apellidos' => 'García López',
                'nombre_usuario' => 'lucia_admin',
                'email' => 'lucia@gmail.com',
                'fecha_nacimiento' => '1985-06-24',
                'telefono' => '600987654',
                'genero' => 'mujer',
                'peso' => 70.0,
                'altura' => 170,
                'fecha_alta' => now(),
                'activo' => false, // Usuario inactivo
                'fecha_baja' => now()->subDays(30),
                'saldo' => 0.00,
                'direccion_id' => 2,
                'imagen' => 'images-profile/user-default.jpg',
            ],
            // Monitors
            [
                'tipo_usuario' => 'monitor',
                'dni' => '33333333C',
                'nombre' => 'Pedro',
                'apellidos' => 'Martínez Ruiz',
                'nombre_usuario' => 'pedro_monitor',
                'email' => 'pedro@gmail.com',
                'fecha_nacimiento' => '1992-03-15',
                'telefono' => '600555111',
                'genero' => 'hombre',
                'peso' => 85.0,
                'altura' => 185,
                'fecha_alta' => now(),
                'activo' => true,
                'fecha_baja' => null,
                'saldo' => 25.00,
                'direccion_id' => 3,
                'imagen' => 'images-profile/user-default.jpg',
            ],
            [
                'tipo_usuario' => 'monitor',
                'dni' => '44444444D',
                'nombre' => 'Laura',
                'apellidos' => 'Sánchez Fernández',
                'nombre_usuario' => 'laura_monitor',
                'email' => 'laura@gmail.com',
                'fecha_nacimiento' => '1990-11-05',
                'telefono' => '600444222',
                'genero' => 'mujer',
                'peso' => 60.0,
                'altura' => 165,
                'fecha_alta' => now(),
                'activo' => true,
                'fecha_baja' => null,
                'saldo' => 40.00,
                'direccion_id' => 4,
                'imagen' => 'images-profile/user-default.jpg',
            ],
            // Socios
            [
                'tipo_usuario' => 'socio',
                'dni' => '55555555E',
                'nombre' => 'María',
                'apellidos' => 'López Martín',
                'nombre_usuario' => 'maria_socio',
                'email' => 'maria@gmail.com',
                'fecha_nacimiento' => '1995-07-10',
                'telefono' => '600333777',
                'genero' => 'mujer',
                'peso' => 55.0,
                'altura' => 160,
                'fecha_alta' => now(),
                'activo' => true,
                'fecha_baja' => null,
                'saldo' => 15.00,
                'direccion_id' => 5,
                'imagen' => 'images-profile/user-default.jpg',
            ],
            [
                'tipo_usuario' => 'socio',
                'dni' => '66666666F',
                'nombre' => 'Luis',
                'apellidos' => 'Fernández Gómez',
                'nombre_usuario' => 'luis_socio',
                'email' => 'luis@gmail.com',
                'fecha_nacimiento' => '1998-12-20',
                'telefono' => '600222888',
                'genero' => 'hombre',
                'peso' => 75.0,
                'altura' => 175,
                'fecha_alta' => now(),
                'activo' => false, // Usuario inactivo
                'fecha_baja' => now()->subDays(10),
                'saldo' => 0.00,
                'direccion_id' => 6,
                'imagen' => 'images-profile/user-default.jpg',
            ],
            // Admins
            [
                'tipo_usuario' => 'admin',
                'dni' => '77777777A',
                'nombre' => 'Ana',
                'apellidos' => 'Rodríguez Pérez',
                'nombre_usuario' => 'ana_admin',
                'email' => 'ana@gmail.com',
                'fecha_nacimiento' => '1983-01-20',
                'telefono' => '600111333',
                'genero' => 'mujer',
                'peso' => 68.0,
                'altura' => 165,
                'fecha_alta' => now(),
                'activo' => true,
                'fecha_baja' => null,
                'saldo' => 70.00,
                'direccion_id' => 7,
                'imagen' => 'images-profile/user-default.jpg',
            ],
            [
                'tipo_usuario' => 'admin',
                'dni' => '88888888B',
                'nombre' => 'Miguel',
                'apellidos' => 'Hernández Gómez',
                'nombre_usuario' => 'miguel_admin',
                'email' => 'miguel@gmail.com',
                'fecha_nacimiento' => '1980-09-10',
                'telefono' => '600444555',
                'genero' => 'hombre',
                'peso' => 80.0,
                'altura' => 180,
                'fecha_alta' => now(),
                'activo' => true,
                'fecha_baja' => null,
                'saldo' => 90.00,
                'direccion_id' => 8,
                'imagen' => 'images-profile/user-default.jpg',
            ],
            // Monitors
            [
                'tipo_usuario' => 'monitor',
                'dni' => '99999999C',
                'nombre' => 'Julia',
                'apellidos' => 'García López',
                'nombre_usuario' => 'julia_monitor',
                'email' => 'julia@gmail.com',
                'fecha_nacimiento' => '1991-04-05',
                'telefono' => '600666777',
                'genero' => 'mujer',
                'peso' => 62.0,
                'altura' => 170,
                'fecha_alta' => now(),
                'activo' => true,
                'fecha_baja' => null,
                'saldo' => 45.00,
                'direccion_id' => 9,
                'imagen' => 'images-profile/user-default.jpg',
            ],
            [
                'tipo_usuario' => 'monitor',
                'dni' => '12312312D',
                'nombre' => 'Roberto',
                'apellidos' => 'López Sánchez',
                'nombre_usuario' => 'roberto_monitor',
                'email' => 'roberto@gmail.com',
                'fecha_nacimiento' => '1993-06-15',
                'telefono' => '600888999',
                'genero' => 'hombre',
                'peso' => 85.0,
                'altura' => 182,
                'fecha_alta' => now(),
                'activo' => true,
                'fecha_baja' => null,
                'saldo' => 50.00,
                'direccion_id' => 10,
                'imagen' => 'images-profile/user-default.jpg',
            ],
            // Socios
            [
                'tipo_usuario' => 'socio',
                'dni' => '45645645E',
                'nombre' => 'Laura',
                'apellidos' => 'Martín Gómez',
                'nombre_usuario' => 'laura_socio',
                'email' => 'laura_socio@gmail.com',
                'fecha_nacimiento' => '1997-03-22',
                'telefono' => '600222333',
                'genero' => 'mujer',
                'peso' => 55.0,
                'altura' => 160,
                'fecha_alta' => now(),
                'activo' => true,
                'fecha_baja' => null,
                'saldo' => 20.00,
                'direccion_id' => 11,
                'imagen' => 'images-profile/user-default.jpg',
            ],
            [
                'tipo_usuario' => 'socio',
                'dni' => '78978978F',
                'nombre' => 'Carlos',
                'apellidos' => 'Pérez Hernández',
                'nombre_usuario' => 'carlos_socio',
                'email' => 'carlos_socio@gmail.com',
                'fecha_nacimiento' => '1999-05-10',
                'telefono' => '600555666',
                'genero' => 'hombre',
                'peso' => 78.0,
                'altura' => 175,
                'fecha_alta' => now(),
                'activo' => true,
                'fecha_baja' => null,
                'saldo' => 30.00,
                'direccion_id' => 12,
                'imagen' => 'images-profile/user-default.jpg',
            ],
            [
                'tipo_usuario' => 'socio',
                'dni' => '32132132G',
                'nombre' => 'Marta',
                'apellidos' => 'Sánchez Pérez',
                'nombre_usuario' => 'marta_socio',
                'email' => 'marta@gmail.com',
                'fecha_nacimiento' => '1998-10-15',
                'telefono' => '600111444',
                'genero' => 'mujer',
                'peso' => 60.0,
                'altura' => 165,
                'fecha_alta' => now(),
                'activo' => false, // Usuario inactivo
                'fecha_baja' => now()->subDays(15),
                'saldo' => 0.00,
                'direccion_id' => 13,
                'imagen' => 'images-profile/user-default.jpg',
            ],
        ];

        DB::table('usuarios')->insert($usuarios);
    }
}
