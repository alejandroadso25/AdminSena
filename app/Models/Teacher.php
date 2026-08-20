<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    // Datos básicos y relaciones que puede enviar el formulario del CRUD.
    protected $fillable = [
        'name',
        'email',
        'area_id',
        'training_center_id'
    ];

    public function area()
    {
        // Área asignada al instructor.
        return $this->belongsTo(Area::class);
    }

    public function trainingCenter()
    {
        // Centro de formación asignado al instructor.
        return $this->belongsTo(Training_Center::class, 'training_center_id');
    }

    public function courses()
    {
        // Un instructor puede impartir varios cursos y viceversa.
        return $this->belongsToMany(Course::class, 'course__teachers');
    }
}
