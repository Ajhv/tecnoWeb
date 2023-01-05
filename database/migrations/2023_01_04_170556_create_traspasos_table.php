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
        Schema::create('traspasos', function (Blueprint $table) {
            $table->id();
            $table->String('descripcion');
            $table->date('fecha_traslado');

            $table->unsignedBigInteger('id_ambiente')->nullable();
            $table->foreign('id_ambiente')
                ->references('id')->on('ambientes')
                ->onDelete('set null');

            $table->unsignedBigInteger('id_persona')->nullable();
            $table->foreign('id_persona')
                ->references('id')->on('personas')
                ->onDelete('set null');

            $table->unsignedBigInteger('id_activo')->nullable();
            $table->foreign('id_activo')
                ->references('id')->on('activos')
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
        Schema::dropIfExists('traspasos');
    }
};
