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
            $table->string('descuento');
            $table->string('planes');
            $table->string('cliente');
            $table->string('descripcion');
            $table->string('total')->nullable();
            $table->string('anticipo')->nullable();
            $table->string('anticipoadi')->nullable();
            $table->string('anticipototal')->nullable(); // Campo opcional
            $table->string('servicioadicional')->nullable(); // Campo opcional
            $table->string('importeadicional')->nullable(); // Campo opcional
            $table->string('documento')->nullable(); // Campo opcional
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
