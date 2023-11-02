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
        Schema::create('doc_documentos', function (Blueprint $table) {
            $table->id('DOC_ID');
            $table->string('DOC_NOMBRE')->nullable();
            $table->string('DOC_CODIGO')->nullable();
            $table->text('DOC_CONTENIDO')->nullable();
            $table->unsignedBigInteger('DOC_ID_TIPO')->nullable();
            $table->unsignedBigInteger('DOC_ID_PROCESO')->nullable();
            $table->foreign('DOC_ID_TIPO')->references('TIP_ID')->on('tip_tipo_docs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('DOC_ID_PROCESO')->references('PRO_ID')->on('pro_procesos')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doc_documentos');
    }
};
