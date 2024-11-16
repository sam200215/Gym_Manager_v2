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
        Schema::create('bitacoracambios', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->string('usuario', 100);
            $table->string('tabla', 100);
            $table->string('accion', 100);
            $table->text('datos_antiguos')->nullable(); // Datos antes del cambio
            $table->text('datos_nuevos')->nullable();   // Datos después del cambio
            $table->string('ip', 45)->nullable();       // IP del usuario
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bitacoracambios');
    }
};
