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
            $table->enum('tipo_usuario', ['admin', 'monitor', 'socio'])->required();
            $table->string('dni')->unique();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('nombre_usuario')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->date('fecha_nacimiento');
            $table->string('telefono');
            $table->string('genero');
            $table->float('peso');
            $table->float('altura');
            $table->date('fecha_alta');
            $table->boolean('activo');
            $table->boolean('bloqueado') -> default(0);
            $table->date('fecha_baja')->nullable();
            $table->float('saldo');
            $table->foreignId('direccion_id')->constrained('direcciones')->onDelete('cascade');
            
            $table->rememberToken();
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
