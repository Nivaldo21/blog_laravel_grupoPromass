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
        Schema::create('entries', function (Blueprint $table) {
            $table->id(); // Columna de clave primaria
            $table->string('title'); // Título de la entrada
            $table->string('author'); // Autor de la entrada
            $table->date('publication_date'); // Fecha de publicación
            $table->text('content'); // Contenido de la entrada
            $table->timestamps(); // Columnas created_at y updated_at para el seguimiento de tiempo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entries');
    }
};
