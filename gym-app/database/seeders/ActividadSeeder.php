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
                'imagen' => 'zumba.jpg',
                'importe' => 5.0,
                'usuario_id' => 3,
            ],
            [
                'nombre' => 'Pilates',
                'descripcion' => 'Clase de estiramientos y fortalecimiento muscular',
                'imagen' => 'pilates.jpg',
                'importe' => 7.5,
                'usuario_id' => 4,
            ],
            [
                'nombre' => 'Spinning',
                'descripcion' => 'Clase de ciclismo indoor',
                'imagen' => 'spinning.jpg',
                'importe' => 6.0,
                'usuario_id' => 3,
            ],
            [
                'nombre' => 'Crossfit',
                'descripcion' => 'Clase de entrenamiento funcional',
                'imagen' => 'crossfit.jpg',
                'importe' => 10.0,
                'usuario_id' => 3,
            ],
            [
                'nombre' => 'Yoga',
                'descripcion' => 'Clase de relajación y meditación',
                'imagen' => 'yoga.jpg',
                'importe' => 8.0,
                'usuario_id' => 4,
            ],
            [
                'nombre' => 'Body Pump',
                'descripcion' => 'Clase de entrenamiento de fuerza',
                'imagen' => 'bodypump.jpg',
                'importe' => 7.0,
                'usuario_id' => 4,
            ],
            [
                'nombre' => 'Body Combat',
                'descripcion' => 'Clase de artes marciales',
                'imagen' => 'bodycombat.jpg',
                'importe' => 6.5,
                'usuario_id' => 3,
            ],
            [
                'nombre' => 'Body Balance',
                'descripcion' => 'Clase de equilibrio y flexibilidad',
                'imagen' => 'bodybalance.jpg',
                'importe' => 7.5,
                'usuario_id' => 3,
            ],
            [
                'nombre' => 'Aerobic',
                'descripcion' => 'Clase de baile y ejercicios aeróbicos',
                'imagen' => 'aerobic.jpg',
                'importe' => 5.5,
                'usuario_id' => 4,
            ],
            [
                'nombre' => 'Step',
                'descripcion' => 'Clase de ejercicios con escalón',
                'imagen' => 'step.jpg',
                'importe' => 6.5,
                'usuario_id' => 4,
            ],
        ];

        DB::table('actividades')->insert($actividades);
        
    }
}