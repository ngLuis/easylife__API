<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 45);
            $table->unsignedBigInteger('categoria_id')->nullable(); //NOTE nomenclatura convención Eloquent
            $table->decimal('precio', 5, 2);
            $table->string('imagen', 255);
            $table->text('descripcion');
            $table->timestamps();
            // Crear índice sobre la columna de la FK
            $table->index('categoria_id');
            // Esta no hace falta internamente porque hemos seguido la convención de nomenclatura, pero está bien tenerla para dentro de la BBDD
            // 'cascade' | 'no action' | 'restrict' | 'set null'
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicios');
    }
}