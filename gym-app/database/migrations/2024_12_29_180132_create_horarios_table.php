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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->date('fecha');
            $table->string('sala');
            $table->integer('aforo');
            $table->foreignId('actividad_id')->nullable()->constrained('actividades')->onDelete('cascade');    
            $table->foreignId('sala_id')->nullable()->constrained('salas')->onDelete('set null'); 
            $table->timestamps();

            $table->unique(['fecha', 'hora_inicio', 'sala_id'], 'unique_sala_horario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};