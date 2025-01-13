<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(DireccionesTableSeeder::class);
        // Mostramos información por consola 
        $this->command->info('Usuarios table seeded!');

        $this->call(UsuariosTableSeeder::class);
        // Mostramos información por consola 
        $this->command->info('Usuarios table seeded!');

        $this->call(UsuariosPasswordsTableSeeder::class);
        // Mostramos información por consola 
        $this->command->info('Usuarios table seeded!');

        $this->call(ActividadSeeder::class);
        // Mostramos información por consola
        $this->command->info('Actividades table seeded!');

        $this->call(HorarioSeeder::class);
        // Mostramos información por consola
        $this->command->info('Horarios table seeded!');

        $this->call(ReservaSeeder::class);
        // Mostramos información por consola
        $this->command->info('Reservas table seeded!');
    }
}
