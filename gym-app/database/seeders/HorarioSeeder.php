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
                    'fecha' => '2025-01-02',
                    'sala' => 'Sala 1',
                    'aforo' => 20,
                    'actividad_id' => 1,
                ],
                [
                    'hora_inicio' => '11:00:00',
                    'hora_fin' => '12:00:00',
                    'fecha' => '2025-01-12',
                    'sala' => 'Sala 2',
                    'aforo' => 15,
                    'actividad_id' => 1,
                ],
                [
                    'hora_inicio' => '12:00:00',
                    'hora_fin' => '13:00:00',
                    'fecha' => '2025-01-10',
                    'sala' => 'Sala 3',
                    'aforo' => 25,
                    'actividad_id' => 2,
                ],
                [
                    'hora_inicio' => '13:00:00',
                    'hora_fin' => '14:00:00',
                    'fecha' => '2025-01-02',
                    'sala' => 'Sala 4',
                    'aforo' => 12,
                    'actividad_id' => 2,
                ],
                [
                    'hora_inicio' => '09:00:00',
                    'hora_fin' => '10:00:00',
                    'fecha' => '2025-01-15',
                    'sala' => 'Sala 1',
                    'aforo' => 20,
                    'actividad_id' => 3,
                ],
                [
                    'hora_inicio' => '16:00:00',
                    'hora_fin' => '15:00:00',
                    'fecha' => '2025-01-15',
                    'sala' => 'Sala 2',
                    'aforo' => 15,
                    'actividad_id' => 3,
                ],
                [
                    'hora_inicio' => '11:00:00',
                    'hora_fin' => '12:00:00',
                    'fecha' => '2025-01-16',
                    'sala' => 'Sala 3',
                    'aforo' => 25,
                    'actividad_id' => 4,
                ],
                [
                    'hora_inicio' => '18:00:00',
                    'hora_fin' => '19:00:00',
                    'fecha' => '2025-01-16',
                    'sala' => 'Sala 4',
                    'aforo' => 12,
                    'actividad_id' => 4,
                ],
                [
                    'hora_inicio' => '13:00:00',
                    'hora_fin' => '14:00:00',
                    'fecha' => '2025-01-17',
                    'sala' => 'Sala 1',
                    'aforo' => 20,
                    'actividad_id' => 5,
                ],
                [
                    'hora_inicio' => '19:00:00',
                    'hora_fin' => '20:00:00',
                    'fecha' => '2025-01-17',
                    'sala' => 'Sala 2',
                    'aforo' => 15,
                    'actividad_id' => 5,
                ],
                [
                    'hora_inicio' => '13:00:00',
                    'hora_fin' => '14:00:00',
                    'fecha' => '2025-01-17',
                    'sala' => 'Sala 3',
                    'aforo' => 25,
                    'actividad_id' => 6,
                ],
                [
                    'hora_inicio' => '19:00:00',
                    'hora_fin' => '20:00:00',
                    'fecha' => '2025-01-17',
                    'sala' => 'Sala 4',
                    'aforo' => 12,
                    'actividad_id' => 6,
                ],
                [
                    'hora_inicio' => '08:00:00',
                    'hora_fin' => '09:00:00',
                    'fecha' => '2025-01-20',
                    'sala' => 'Sala 1',
                    'aforo' => 20,
                    'actividad_id' => 7,
                ],
                [
                    'hora_inicio' => '13:00:00',
                    'hora_fin' => '14:00:00',
                    'fecha' => '2025-01-20',
                    'sala' => 'Sala 1',
                    'aforo' => 20,
                    'actividad_id' => 7,
                ],
                [
                    'hora_inicio' => '10:00:00',
                    'hora_fin' => '11:00:00',
                    'fecha' => '2025-01-21',
                    'sala' => 'Sala 2',
                    'aforo' => 15,
                    'actividad_id' => 8,
                ],
                [
                    'hora_inicio' => '16:00:00',
                    'hora_fin' => '15:00:00',
                    'fecha' => '2025-01-21',
                    'sala' => 'Sala 2',
                    'aforo' => 15,
                    'actividad_id' => 8,
                ],
                [
                    'hora_inicio' => '10:00:00',
                    'hora_fin' => '11:00:00',
                    'fecha' => '2025-01-22',
                    'sala' => 'Sala 3',
                    'aforo' => 25,
                    'actividad_id' => 9,
                ],
                [
                    'hora_inicio' => '16:00:00',
                    'hora_fin' => '15:00:00',
                    'fecha' => '2025-01-22',
                    'sala' => 'Sala 3',
                    'aforo' => 25,
                    'actividad_id' => 9,
                ],
                [
                    'hora_inicio' => '12:00:00',
                    'hora_fin' => '13:00:00',
                    'fecha' => '2025-01-23',
                    'sala' => 'Sala 4',
                    'aforo' => 12,
                    'actividad_id' => 10,
                ],
                [
                    'hora_inicio' => '15:00:00',
                    'hora_fin' => '16:00:00',
                    'fecha' => '2025-01-23',
                    'sala' => 'Sala 4',
                    'aforo' => 12,
                    'actividad_id' => 10,
                ]
            ];
            DB::table('horarios')->insert($horarios);

    }
}
