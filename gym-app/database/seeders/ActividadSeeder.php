<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActividadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $actividades = [
            [
                'nombre' => 'Zumba',
                'descripcion' => 'Clase de baile con música latina',
                'imagen' => 'images/zumba.jpg',
                'importe' => 5.0,
                'usuario_id' => 3,
            ],
            [
                'nombre' => 'Pilates',
                'descripcion' => 'Clase de estiramientos y fortalecimiento muscular',
                'imagen' => 'images/pilates.jpg',
                'importe' => 7.5,
                'usuario_id' => 4,
            ],
            [
                'nombre' => 'Spinning',
                'descripcion' => 'Clase de ciclismo indoor',
                'imagen' => 'images/spinning.jpg',
                'importe' => 6.0,
                'usuario_id' => 3,
            ],
            [
                'nombre' => 'Crossfit',
                'descripcion' => 'Clase de entrenamiento funcional',
                'imagen' => 'images/crossfit.jpg',
                'importe' => 10.0,
                'usuario_id' => 3,
            ],
        ];

        DB::table('actividades')->insert($actividades);
        
    }
}
