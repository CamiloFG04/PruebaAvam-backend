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
        Schema::create('cotizacion_producto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cotizacion_id')->nullable();
            $table->unsignedBigInteger('producto_id')->nullable();
            $table->integer('cantidad')->nullable();
            $table->foreign('cotizacion_id')->references('cotizacion_id')->on('cotizaciones')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('producto_id')->references('producto_id')->on('productos')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizacion_producto');
    }
};
