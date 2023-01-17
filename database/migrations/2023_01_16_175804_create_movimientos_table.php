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
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');

            $table->unsignedBigInteger('id_activo')->nullable();
            $table->foreign('id_activo')
                ->references('id')->on('activos')
                ->onDelete('set null');

            $table->date('fecha_movimiento');
            
            $table->unsignedBigInteger('id_ambienteo')->nullable();
            $table->foreign('id_ambienteo')
                ->references('id')->on('ambientes')
                ->onDelete('set null');

            $table->unsignedBigInteger('id_ambiented')->nullable();
            $table->foreign('id_ambiented')
                ->references('id')->on('ambientes')
                ->onDelete('set null');
            
            $table->unsignedBigInteger('id_persona')->nullable();
            $table->foreign('id_persona')
                ->references('id')->on('personas')
                ->onDelete('set null');

            $table->string('descripcion');

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
        Schema::dropIfExists('movimientos');
    }
};
