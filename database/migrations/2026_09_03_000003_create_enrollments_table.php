<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crea la tabla de inscripciones a las ofertas de formación.
     */
    public function up(): void
    {
        Schema::create('enrollments', function (Blueprint $table) {
            // Identificador único de la solicitud de inscripción.
            $table->id();

            // Usuario autenticado que solicita la oferta.
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            // Curso que funciona como oferta de formación.
            $table->foreignId('course_id')->constrained('courses')->cascadeOnDelete();

            // La solicitud inicia pendiente hasta la revisión administrativa.
            $table->string('status')->default('pendiente');

            // Fechas de creación y actualización de la solicitud.
            $table->timestamps();

            // Evita que una cuenta se inscriba dos veces a la misma oferta.
            $table->unique(['user_id', 'course_id']);
        });
    }

    /**
     * Elimina la tabla de inscripciones al revertir esta migración.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};