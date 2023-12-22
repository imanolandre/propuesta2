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
        Schema::create('pagos', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('fecha');
            $table->unsignedBigInteger('proyecto_id')->unsigned();
            $table->String('cliente');
            $table->String('monto');
            $table->string('gastosingreso');
            $table->string('conceptogasto');
            $table->string('diezmo');
            $table->string('libre');
            $table->string('metodopago');
            $table->string('adjunto')->nullable();;
            $table->timestamps();
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete("cascade");
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
