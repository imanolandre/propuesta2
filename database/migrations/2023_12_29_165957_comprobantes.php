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
        Schema::create('comprobantes', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cotizacion_id')->unsigned();
            $table->String('documento');
            $table->String('servicio');
            $table->string('total');
            $table->string('anticipo');
            $table->text('descripcion');
            $table->string('cuentaorigen');
            $table->string('conceptopago');
            $table->string('metodopago');
            $table->string('foliooperacion');
            $table->string('fechaoperacion');
            $table->string('adjunto')->nullable();;
            $table->timestamps();
            $table->foreign('cotizacion_id')->references('id')->on('cotizaciones')->onDelete("cascade");
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
