<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicioUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('servicio_id');
            $table->unsignedBigInteger('user_id');
            // Accesible a través de ->pivot->tipo //TODO comprobar
            $table->string('tipo', 10);
            $table->timestamps();
            // Crear índice sobre la columna de la FK
            $table->index('servicio_id');
            $table->index('user_id');
            // Esta no hace falta internamente porque hemos seguido la convención de nomenclatura, pero está bien tenerla para dentro de la BBDD
            // 'cascade' | 'no action' | 'restrict' | 'set null'
            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicio_user');
    }
}