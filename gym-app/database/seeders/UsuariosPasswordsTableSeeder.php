<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosPasswordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios_passwords = [
            // Nuevos usuarios añadidos
            [
                'usuario_id' => 1,
                'password' => Hash::make('1234'), // Contraseña para Miguel
            ],
            [
                'usuario_id' => 2,
                'password' => Hash::make('1234'), // Contraseña para Julia
            ],
            [
                'usuario_id' => 3,
                'password' => Hash::make('1234'), // Contraseña para Roberto
            ],
            [
                'usuario_id' => 4,
                'password' => Hash::make('1234'), // Contraseña para Laura (socio)
            ],
            [
                'usuario_id' => 5,
                'password' => Hash::make('1234'), // Contraseña para Carlos (socio)
            ],
            [
                'usuario_id' => 6,
                'password' => Hash::make('1234'), // Contraseña para Marta (inactiva)
            ],
            [
                'usuario_id' => 7,
                'password' => Hash::make('1234'), // Contraseña para Marta (inactiva)
            ],
            [
                'usuario_id' => 8,
                'password' => Hash::make('1234'), // Contraseña para Miguel
            ],
            [
                'usuario_id' => 9,
                'password' => Hash::make('1234'), // Contraseña para Julia
            ],
            [
                'usuario_id' => 10,
                'password' => Hash::make('1234'), // Contraseña para Roberto
            ],
            [
                'usuario_id' => 11,
                'password' => Hash::make('1234'), // Contraseña para Laura (socio)
            ],
            [
                'usuario_id' => 12,
                'password' => Hash::make('1234'), // Contraseña para Carlos (socio)
            ],
            [
                'usuario_id' => 13,
                'password' => Hash::make('1234'), // Contraseña para Marta (inactiva)
            ],
        ];

        DB::table('usuarios_passwords')->insert($usuarios_passwords);
    }
}
