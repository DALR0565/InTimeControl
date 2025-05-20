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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('id_compuesto', 5)->unique();
            $table->string("nombre", 255);
            $table->string("registro_patronal", 12);
            $table->string("categoria", 120);
            $table->string("direccion", 255);
            $table->date("fecha_inicio");
            $table->date("fecha_fin");
            $table->decimal("monto_contrato", 10,2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};
