<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DireccionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $addresses = [
            ['usuario_id' => 1, 'pais' => 'España', 'provincia' => 'Madrid', 'municipio' => 'Madrid', 'cp' => '28001', 'direccion_envio' => 'Calle de Admin 1'],
            ['usuario_id' => 2, 'pais' => 'España', 'provincia' => 'Barcelona', 'municipio' => 'Barcelona', 'cp' => '08001', 'direccion_envio' => 'Calle de Admin 2'],
            ['usuario_id' => 3, 'pais' => 'España', 'provincia' => 'Valencia', 'municipio' => 'Valencia', 'cp' => '46001', 'direccion_envio' => 'Calle de Monitor 1'],
            ['usuario_id' => 4, 'pais' => 'España', 'provincia' => 'Sevilla', 'municipio' => 'Sevilla', 'cp' => '41001', 'direccion_envio' => 'Calle de Monitor 2'],
            ['usuario_id' => 5, 'pais' => 'España', 'provincia' => 'Malaga', 'municipio' => 'Malaga', 'cp' => '29001', 'direccion_envio' => 'Calle de Socio 1'],
            ['usuario_id' => 6, 'pais' => 'España', 'provincia' => 'Bilbao', 'municipio' => 'Bilbao', 'cp' => '48001', 'direccion_envio' => 'Calle de Socio 2'],
        ];

        DB::table('direcciones')->insert($addresses);
    }
}