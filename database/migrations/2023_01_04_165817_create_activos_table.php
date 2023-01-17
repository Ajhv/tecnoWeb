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

            $table->unsignedBigInteger('id_categoria')->nullable();
            $table->foreign('id_categoria')
                ->references('id')->on('categorias')
                ->onDelete('set null');

            $table->string('descripcion');
                   

            $table->unsignedBigInteger('id_ambiente')->nullable();
            $table->foreign('id_ambiente')
                ->references('id')->on('ambientes')
                ->onDelete('set null');

            $table->string('estado');
            $table->string('foto');
            
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
