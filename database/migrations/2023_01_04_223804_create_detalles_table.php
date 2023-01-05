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
        Schema::create('detalles', function (Blueprint $table) {
            $table->id();
            $table->String('estado');
            $table->text('descripcion');
            $table->String('responsable');
            $table->date('fecha');
            $table->unsignedBigInteger('id_mantenimientos')->nullable();
            $table->foreign('id_mantenimientos')
                ->references('id')->on('mantenimientos')
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
        Schema::dropIfExists('detalles');
    }
};
