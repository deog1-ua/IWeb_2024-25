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
            ['pais' => 'España', 'provincia' => 'Madrid', 'municipio' => 'Madrid', 'cp' => '28013', 'direccion_envio' => 'Gran Vía, 28'],
            ['pais' => 'España', 'provincia' => 'Madrid', 'municipio' => 'Madrid', 'cp' => '28014', 'direccion_envio' => 'Calle de Alcalá, 45'],
            ['pais' => 'España', 'provincia' => 'Madrid', 'municipio' => 'Madrid', 'cp' => '28015', 'direccion_envio' => 'Calle de Fuencarral, 105'],
            
            ['pais' => 'España', 'provincia' => 'Barcelona', 'municipio' => 'Barcelona', 'cp' => '08002', 'direccion_envio' => 'La Rambla, 120'],
            ['pais' => 'España', 'provincia' => 'Barcelona', 'municipio' => 'Barcelona', 'cp' => '08003', 'direccion_envio' => 'Carrer de Balmes, 200'],
            ['pais' => 'España', 'provincia' => 'Barcelona', 'municipio' => 'Barcelona', 'cp' => '08004', 'direccion_envio' => 'Avenida Diagonal, 520'],
            
            ['pais' => 'España', 'provincia' => 'Valencia', 'municipio' => 'Valencia', 'cp' => '46002', 'direccion_envio' => 'Calle Colón, 34'],
            ['pais' => 'España', 'provincia' => 'Valencia', 'municipio' => 'Valencia', 'cp' => '46003', 'direccion_envio' => 'Plaza del Ayuntamiento, 10'],
            ['pais' => 'España', 'provincia' => 'Valencia', 'municipio' => 'Valencia', 'cp' => '46004', 'direccion_envio' => 'Calle de la Paz, 19'],
            
            ['pais' => 'España', 'provincia' => 'Sevilla', 'municipio' => 'Sevilla', 'cp' => '41001', 'direccion_envio' => 'Calle Sierpes, 15'],
            ['pais' => 'España', 'provincia' => 'Sevilla', 'municipio' => 'Sevilla', 'cp' => '41002', 'direccion_envio' => 'Avenida de la Constitución, 20'],
            ['pais' => 'España', 'provincia' => 'Sevilla', 'municipio' => 'Sevilla', 'cp' => '41003', 'direccion_envio' => 'Calle Feria, 12'],

            ['pais' => 'España', 'provincia' => 'Málaga', 'municipio' => 'Málaga', 'cp' => '29005', 'direccion_envio' => 'Calle Larios, 4'],
            ['pais' => 'España', 'provincia' => 'Málaga', 'municipio' => 'Málaga', 'cp' => '29006', 'direccion_envio' => 'Avenida Andalucía, 14'],
            ['pais' => 'España', 'provincia' => 'Málaga', 'municipio' => 'Málaga', 'cp' => '29007', 'direccion_envio' => 'Paseo del Parque, 22'],

            ['pais' => 'España', 'provincia' => 'Bizkaia', 'municipio' => 'Bilbao', 'cp' => '48001', 'direccion_envio' => 'Calle Gran Vía, 25'],
            ['pais' => 'España', 'provincia' => 'Bizkaia', 'municipio' => 'Bilbao', 'cp' => '48002', 'direccion_envio' => 'Plaza Moyúa, 3'],
            ['pais' => 'España', 'provincia' => 'Bizkaia', 'municipio' => 'Bilbao', 'cp' => '48003', 'direccion_envio' => 'Calle Diputación, 15'],

            ['pais' => 'España', 'provincia' => 'Zaragoza', 'municipio' => 'Zaragoza', 'cp' => '50001', 'direccion_envio' => 'Paseo Independencia, 30'],
            ['pais' => 'España', 'provincia' => 'Zaragoza', 'municipio' => 'Zaragoza', 'cp' => '50002', 'direccion_envio' => 'Calle Don Jaime I, 14'],
            ['pais' => 'España', 'provincia' => 'Zaragoza', 'municipio' => 'Zaragoza', 'cp' => '50003', 'direccion_envio' => 'Avenida Goya, 10'],

            ['pais' => 'España', 'provincia' => 'Alicante', 'municipio' => 'Alicante', 'cp' => '03001', 'direccion_envio' => 'Explanada de España, 1'],
            ['pais' => 'España', 'provincia' => 'Alicante', 'municipio' => 'Alicante', 'cp' => '03002', 'direccion_envio' => 'Calle San Fernando, 7'],
            ['pais' => 'España', 'provincia' => 'Alicante', 'municipio' => 'Alicante', 'cp' => '03003', 'direccion_envio' => 'Avenida Alfonso El Sabio, 15'],
        ];

        DB::table('direcciones')->insert($addresses);
    }
}
