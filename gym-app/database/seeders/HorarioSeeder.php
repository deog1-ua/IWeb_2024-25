<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            
            // $table->time('hora_inicio');
            // $table->time('hora_fin');
            // $table->date('fecha');
            // $table->string('sala')->unique();
            // $table->integer('aforo');
            // $table->foreignId('actividad_id')->constrained('actividades')->onDelete('cascade'); 

            $horarios = [
                [
                    'hora_inicio' => '10:00:00',
                    'hora_fin' => '11:00:00',
                    'fecha' => '2025-02-01',
                    'sala_id' => 1,
                    'aforo' => 20,
                    'actividad_id' => 1,
                ],
                [
                    'hora_inicio' => '11:00:00',
                    'hora_fin' => '12:00:00',
                    'fecha' => '2025-12-01',
                    'sala_id' => 2,
                    'aforo' => 20,
                    'actividad_id' => 1,
                ],
                [
                    'hora_inicio' => '12:00:00',
                    'hora_fin' => '13:00:00',
                    'fecha' => '2025-10-01',
                    'sala_id' => 3,
                    'aforo' => 20,
                    'actividad_id' => 2,
                ],
                [
                    'hora_inicio' => '13:00:00',
                    'hora_fin' => '14:00:00',
                    'fecha' => '2025-02-01',
                    'sala_id' => 4,
                    'aforo' => 20,
                    'actividad_id' => 2,
                ],
                [
                    'hora_inicio' => '15:00:00',
                    'hora_fin' => '16:00:00',
                    'fecha' => '2025-09-01',
                    'sala_id' => 5,
                    'aforo' => 20,
                    'actividad_id' => null,
                ],
                [
                    'hora_inicio' => '11:00:00',
                    'hora_fin' => '12:00:00',
                    'fecha' => '2025-03-01',
                    'sala_id' => 3,
                    'aforo' => 20,
                    'actividad_id' => null,
                ],
            ];
            DB::table('horarios')->insert($horarios);

    }
}
