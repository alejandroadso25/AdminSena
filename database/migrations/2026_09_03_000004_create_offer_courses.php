<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Agrega la información de los programas que funcionan como ofertas.
     */
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            // Nombre que verá el aspirante en la convocatoria.
            $table->string('program_name')->nullable()->after('course_number');

            // Tipo de formación ofrecida por el programa.
            $table->string('training_type')->nullable()->after('program_name');

            // Ubicación o regional donde se desarrolla la formación.
            $table->string('location')->nullable()->after('training_type');

            // Estado de la convocatoria: abierta o cerrada.
            $table->boolean('is_open')->default(true)->after('location');

            // Información complementaria visible para el aspirante.
            $table->text('description')->nullable()->after('is_open');
            $table->string('duration')->nullable()->after('description');
            $table->unsignedInteger('capacity')->nullable()->after('duration');
        });
    }

    /**
     * Elimina los campos de oferta agregados a courses.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            // Revierte únicamente las columnas creadas por esta migración.
            $table->dropColumn([
                'program_name',
                'training_type',
                'location',
                'is_open',
                'description',
                'duration',
                'capacity',
            ]);
        });
    }
};