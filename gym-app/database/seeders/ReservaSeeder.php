<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reservas = [
            [

                'usuario_id' => 5,
                'horario_id' => 2,
            ],
            [

                'usuario_id' => 5,
                'horario_id' => 1,
            ],
            [
                'usuario_id' => 6,
                'horario_id' => 1,
            ],
            [
                'usuario_id' => 6,
                'horario_id' => 2,
            ],
        ];
        DB::table('reservas')->insert($reservas);
    }
}
