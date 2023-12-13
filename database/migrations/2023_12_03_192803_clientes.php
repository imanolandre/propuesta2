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
        Schema::create('clientes', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->string('nombrecliente');
            $table->string('correo');
            $table->string('teléfono');
            $table->string('empresa');
            $table->string('sitioweb');
            $table->string('dirección');
            $table->string('razónsocial')->nullable(); // Campo opcional
            $table->string('rfc')->nullable(); // Campo opcional
            $table->string('direcciónfiscal')->nullable(); // Campo opcional
            $table->string('codigopostal')->nullable(); // Campo opcional
            $table->string('regimenincorporación')->nullable(); // Campo opcional
            $table->string('constanciasituaciónFiscal')->nullable(); // Campo opcional
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
