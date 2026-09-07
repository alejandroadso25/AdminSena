<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Agrega el horario elegido a cada inscripción.
     */
    public function up(): void
    {
        Schema::table('enrollments', function (Blueprint $table) {
            // Conserva la jornada seleccionada por el aspirante.
            $table->string('schedule')->after('course_id');
        });
    }

    /**
     * Elimina el horario guardado en las inscripciones.
     */
    public function down(): void
    {
        Schema::table('enrollments', function (Blueprint $table) {
            // Revierte únicamente el campo agregado por esta migración.
            $table->dropColumn('schedule');
        });
    }
};