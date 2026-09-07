<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // Incluye las claves foráneas usadas por los selectores de los formularios.
    protected $fillable = [
        'course_number',
        'program_name',
        'day',
        'training_type',
        'location',
        'is_open',
        'description',
        'duration',
        'capacity',
        'area_id',
        'training_center_id'
    ];

    protected $casts = [
        // Convierte el estado de la convocatoria a booleano.
        'is_open' => 'boolean',
    ];

    public function area()
    {
        // Cada curso pertenece opcionalmente a un área.
        return $this->belongsTo(Area::class);
    }

    public function trainingCenter()
    {
        // Relación con la tabla de centros, cuyo nombre no sigue la convención estándar.
        return $this->belongsTo(Training_Center::class, 'training_center_id');
    }

    public function apprentices()
    {
        // Un curso puede tener varios aprendices inscritos.
        return $this->hasMany(Apprentice::class);
    }

    public function teachers()
    {
        // Relación muchos a muchos mediante la tabla course__teachers.
        return $this->belongsToMany(Teacher::class, 'course__teachers');
    }

    // Inscripciones recibidas por este curso.
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

}
