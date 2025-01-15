<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Prueba extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $pagos = [
            [
                'fecha' => '2024-01-01',
                'cantidad' => 15.0,
                'usuario_id' => 5,
            ],
            [
                'fecha' => '2024-02-01',
                'cantidad' => 30.0,
                'usuario_id' => 5,
            ],
            [
                'fecha' => '2024-03-01',
                'cantidad' => 25.0,
                'usuario_id' => 5,
            ],
            [
                'fecha' => '2024-07-01',
                'cantidad' => 15.0,
                'usuario_id' => 6,
            ],
            [
                'fecha' => '2024-08-03',
                'cantidad' => 45.0,
                'usuario_id' => 6,
            ],
            [
                'fecha' => '2024-09-07',
                'cantidad' => 10.0,
                'usuario_id' => 6,
            ],
        ];
        DB::table('historico_pagos')->insert($pagos);
    }
}
