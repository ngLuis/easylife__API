<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColaboradorServicioPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaborador_servicio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('colaborador_id');
            $table->unsignedBigInteger('servicio_id');
            $table->timestamps();
            // Crear índice sobre la columna de la FK
            $table->index('servicio_id');
            $table->index('colaborador_id');
            // Esta no hace falta internamente porque hemos seguido la convención de nomenclatura, pero está bien tenerla para dentro de la BBDD
            // 'cascade' | 'no action' | 'restrict' | 'set null'
            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('colaborador_id')->references('id')->on('colaboradores')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colaborador_servicio');
    }
}