<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salidas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_activo')->unique();
            $table->foreign('id_activo')
                ->references('id')->on('activos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->date('fecha_ingreso');
            $table->date('fecha_salida');
            $table->string('tipo_ingreso');
            $table->integer('valor');
            $table->string('vida_util');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salidas');
    }
};
