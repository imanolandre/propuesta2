<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->String('tipo');
            $table->string('cotización');
            $table->unsignedBigInteger('cliente_id')->unsigned();
            $table->string('fechainicio');
            $table->string('fechafin');
            $table->string('prototipo');
            $table->string('requerimientos');
            $table->text('descripción');
            $table->timestamps();
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
