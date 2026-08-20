<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course_Teacher extends Model
{
    use HasFactory;

    // Tabla intermedia que almacena las asignaciones instructor-curso.
    protected $table = 'course__teachers';

    // Únicas claves que acepta la asignación masiva.
    protected $fillable = ['course_id', 'teacher_id'];

    public function course()
    {
        // Curso asociado a esta asignación.
        return $this->belongsTo(Course::class);
    }

    public function teacher()
    {
        // Instructor asociado a esta asignación.
        return $this->belongsTo(Teacher::class);
    }
}
