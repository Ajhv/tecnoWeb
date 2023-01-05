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
        Schema::create('activos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('nombre');
            $table->date('fecha_ingreso');
            $table->integer('vida_util');
            $table->integer('valor');
            $table->integer('periodo_mantenimiento');
            $table->date('ultimo_mantenimiento');

            $table->unsignedBigInteger('id_categoria')->nullable();
            $table->foreign('id_categoria')
                ->references('id')->on('categorias')
                ->onDelete('set null');
            
            $table->unsignedBigInteger('id_ingreso')->nullable();
            $table->foreign('id_ingreso')
                ->references('id')->on('ingresos')
                ->onDelete('set null');
                    
            $table->unsignedBigInteger('id_estado')->nullable();
            $table->foreign('id_estado')
                ->references('id')->on('estados')
                ->onDelete('set null');

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
        Schema::dropIfExists('activos');
    }
};
