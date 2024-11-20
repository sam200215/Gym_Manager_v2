<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->string('nombre_completo', 100);
            $table->string('dni', 15)->unique();
            $table->string('telefono', 15);
            $table->string('direccion', 255)->nullable();
            $table->string('email', 100)->unique()->nullable();
            $table->date('fecha_nacimiento');
            $table->enum('genero', ['M', 'F']);
            $table->string('contacto_emergencia', 100)->nullable();
            $table->string('telefono_emergencia', 15)->nullable();
            $table->text('condiciones_medicas')->nullable();
            $table->date('fecha_registro')->useCurrent();
            $table->boolean('activo')->default(true);
            $table->timestamps();
            $table->softDeletes(); // Para eliminación suave
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};
