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
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->string('servicio');
            $table->string('importe');
            $table->string('descuento')->nullable();
            $table->string('planes');
            $table->string('cliente');
            $table->text('descripcion');
            $table->string('total')->nullable();
            $table->string('anticipo')->nullable();
            $table->string('anticipoadi')->nullable();
            $table->string('anticipototal')->nullable();
            $table->string('servicioadicional1')->nullable();
            $table->string('importeadicional1')->nullable();
            $table->string('servicioadicional2')->nullable();
            $table->string('importeadicional2')->nullable();
            $table->string('servicioadicional3')->nullable();
            $table->string('importeadicional3')->nullable();
            $table->string('servicioadicional4')->nullable();
            $table->string('importeadicional4')->nullable();
            $table->string('servicioadicional5')->nullable();
            $table->string('importeadicional5')->nullable();
            $table->string('documento')->nullable();
            $table->timestamps();
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
