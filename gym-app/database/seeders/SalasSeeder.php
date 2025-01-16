<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear 5 salas
        $salas = [
            ['nombre' => 'Sala 1'],
            ['nombre' => 'Sala 2'],
            ['nombre' => 'Sala 3'],
            ['nombre' => 'Sala 4'],
            ['nombre' => 'Sala 5'],
        ];

        DB::table('salas')->insert($salas);
    }
}
