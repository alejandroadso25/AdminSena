<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    // Campos permitidos en create() y update() mediante asignación masiva.
    protected $fillable = [
        'name'
    ];

    public function courses()
    {
        // Un área puede organizar varios cursos.
        return $this->hasMany(Course::class);
    }

    public function teachers()
    {
        // Un área puede tener varios instructores.
        return $this->hasMany(Teacher::class);
    }
}
