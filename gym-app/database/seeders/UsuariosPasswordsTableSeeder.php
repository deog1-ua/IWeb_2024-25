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
            // Admins
            [
                'usuario_id' => 1, 
                'password' => Hash::make('1234')
            ],
            [
                'usuario_id' => 2, 
                'password' => Hash::make('1234')
            ],
            // Monitors
            [
                'usuario_id' => 3, 
                'password' => Hash::make('1234')
            ],
            [
                'usuario_id' => 4, 
                'password' => Hash::make('1234')
            ],
            // Socios
            [
                'usuario_id' => 5, 
                'password' => Hash::make('1234')
            ],
            [
                'usuario_id' => 6, 
                'password' => Hash::make('1234')
            ],
        ];

        DB::table('usuarios_passwords')->insert($usuarios_passwords);
    }
}
