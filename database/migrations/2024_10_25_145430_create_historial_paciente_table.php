<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialPacienteTable extends Migration
{
    public function up()
    {
        Schema::create('historial_paciente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_paciente'); // Clave foránea a pacientes (singular)
            $table->unsignedBigInteger('id_doctor')->nullable(); // Clave foránea a doctores
            $table->string('tipo_registro');
            $table->text('descripcion');
            $table->date('fecha_registro');
            $table->text('observaciones')->nullable();
            $table->timestamps();
        
            // Clave foránea hacia `pacientes`
            $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
            
            // Clave foránea hacia `doctor`
            $table->foreign('id_doctor')->references('id')->on('doctors')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('historial_paciente');
    }
};
