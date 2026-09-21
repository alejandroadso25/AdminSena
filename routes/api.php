<?php

use App\Http\Controllers\Api\ResourceController;
use Illuminate\Support\Facades\Route;

// Verifica que la API esté disponible y responda correctamente.
Route::get('/health', [ResourceController::class, 'health'])->name('api.health');

// Endpoints REST según el recurso solicitado: computers, areas, courses, teachers, etc.

// GET /api/v1/computers -> devuelve la lista de computadores.
Route::get('/computers', [ResourceController::class, 'computers'])->name('api.computers');

// GET /api/v1/areas -> devuelve la lista de áreas.
Route::get('/areas', [ResourceController::class, 'areas'])->name('api.areas');

// GET /api/v1/courses -> devuelve la lista de cursos.
Route::get('/courses', [ResourceController::class, 'courses'])->name('api.courses');

// GET /api/v1/teachers -> devuelve la lista de instructores.
Route::get('/teachers', [ResourceController::class, 'teachers'])->name('api.teachers');

// GET /api/v1/apprentices -> devuelve la lista de aprendices.
Route::get('/apprentices', [ResourceController::class, 'apprentices'])->name('api.apprentices');

// GET /api/v1/training-centers -> devuelve la lista de centros de formación.
Route::get('/training-centers', [ResourceController::class, 'trainingCenters'])->name('api.training_centers');

// GET /api/v1/summary -> devuelve un resumen general del sistema.
Route::get('/summary', [ResourceController::class, 'summary'])->name('api.summary');