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
        Schema::create('trabajadores', function (Blueprint $table) {
            $table->id();
            $table->string('id_compuesto', 8)->unique();
            $table->string("nombre", 255);
            $table->string("nss", 11)->unique();
            $table->string("rfc", 13)->unique();
            $table->string("curp", 18)->unique();
            $table->string("telefono", 15);
            $table->string("email", 255)->unique();
            $table->string("direccion", 255);
            $table->foreignId("proyecto_id")->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamp("deleted_at")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabajadores');
    }
};
