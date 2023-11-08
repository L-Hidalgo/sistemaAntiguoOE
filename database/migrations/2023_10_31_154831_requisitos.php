<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('requisitos', function (Blueprint $table) {
            $table->id();
            $table->text('formacionRequerida')->nullable(); 
            $table->text('experienciaProfesionalSegunCargo')->nullable();
            $table->text('experienciaRelacionadoAlArea')->nullable();
            $table->text('experienciaEnFuncionesDeMando')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('requisitos');
    }
};