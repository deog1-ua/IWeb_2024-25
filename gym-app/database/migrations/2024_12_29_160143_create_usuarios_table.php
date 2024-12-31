<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo_usuario', ['admin','monitor', 'user']);
            $table->string('DNI', 9)->unique();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('usuario')->unique();
            $table->string('email')->unique();
            $table->date('fecha_nacimiento');
            $table->string('telefono', 9);
            $table->string('genero');
            $table->float('peso')->nullable();
            $table->float('altura')->nullable();
            $table->date('fecha_alta')->default(now());
            $table->boolean('activo')->default(true);
            $table->date('fecha_baja')->nullable();
            $table->float('saldo')->default(0);
            $table->foreignId('id_direccion')->constrained('direcciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
