<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultadosTestTable extends Migration
{
    public function up()
    {
        Schema::create('resultados_test', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_paciente')->constrained('pacientes');
            $table->foreignId('id_test')->constrained('tests');
            $table->date('fecha_aplicacion');
            $table->string('resultado', 255);
            $table->text('observaciones')->nullable();
            $table->foreignId('id_doctor')->nullable()->constrained('doctors');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('resultados_test');
    }
};
