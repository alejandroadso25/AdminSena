<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apprentice;
use App\Models\Area;
use App\Models\Computer;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Training_Center;

class ResourceController extends Controller
{
    /**
     * Verifica que la API esté disponible.
     */
    public function health()
    {
        return response()->json([
            'status' => 'ok',
            'app' => config('app.name'),
            'environment' => config('app.env'),
        ]);
    }

    /**
     * Devuelve todos los computadores registrados.
     */
    public function computers()
    {
        return response()->json(
            Computer::with('image')->get()
        );
    }

    /**
     * Devuelve todas las áreas registradas.
     */
    public function areas()
    {
        return response()->json(
            Area::all()
        );
    }

    /**
     * Devuelve todos los cursos con sus relaciones.
     */
    public function courses()
    {
        return response()->json(
            Course::with(['area', 'trainingCenter', 'images'])->get()
        );
    }

    /**
     * Devuelve todos los instructores con sus relaciones.
     */
    public function teachers()
    {
        return response()->json(
            Teacher::with(['area', 'trainingCenter', 'image'])->get()
        );
    }

    /**
     * Devuelve todos los aprendices con sus relaciones.
     */
    public function apprentices()
    {
        return response()->json(
            Apprentice::with(['course', 'computer', 'image'])->get()
        );
    }

    /**
     * Devuelve todos los centros de formación con sus relaciones.
     */
    public function trainingCenters()
    {
        return response()->json(
            Training_Center::with('image')->get()
        );
    }

    /**
     * Devuelve un resumen general basado en el contenido actual de la base de datos.
     */
    public function summary()
    {
        return response()->json([
            'areas' => Area::count(),
            'computers' => Computer::count(),
            'courses' => Course::count(),
            'teachers' => Teacher::count(),
            'apprentices' => Apprentice::count(),
            'training_centers' => Training_Center::count(),
        ]);
    }
}
