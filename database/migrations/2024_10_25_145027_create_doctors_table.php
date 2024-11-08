<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('especialidad', 100)->nullable();
            $table->string('numero_licencia', 50)->unique();
            $table->string('telefono', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('direccion_consultorio')->nullable();
            $table->date('fecha_contratacion')->nullable();
            $table->string('horario_atencion')->nullable();
            $table->timestamp('fecha_registro')->useCurrent();
            $table->text('notas_adicionales')->nullable();
            $table->string('foto_perfil')->nullable();
            $table->text('documentos_verificacion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('doctors');
    }
};
