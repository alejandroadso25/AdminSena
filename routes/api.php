<?php

use App\Http\Controllers\Api\CatalogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API V1 - Backend orientado a JSON
|--------------------------------------------------------------------------
| Este archivo contiene únicamente las rutas de la API. No incluye vistas
| ni formularios Blade, porque la idea es que React o Postman consuman JSON.
| Las rutas GET representan los listados de registros para cada tabla del
| sistema. La escritura de datos se incorporará más adelante.
|
*/

// Verifica que la API esté disponible y responda correctamente.
Route::get('/health', [CatalogController::class, 'health'])->name('api.health');

// Grupo del catálogo: aquí van los listados GET de cada entidad.
Route::prefix('catalog')->group(function () {
    // GET /api/v1/catalog/computers -> index de computadores.
    Route::get('/computers', [CatalogController::class, 'computers'])->name('api.catalog.computers');

    // GET /api/v1/catalog/areas -> index de áreas.
    Route::get('/areas', [CatalogController::class, 'areas'])->name('api.catalog.areas');

    // GET /api/v1/catalog/courses -> index de cursos.
    Route::get('/courses', [CatalogController::class, 'courses'])->name('api.catalog.courses');

    // GET /api/v1/catalog/teachers -> index de instructores.
    Route::get('/teachers', [CatalogController::class, 'teachers'])->name('api.catalog.teachers');

    // GET /api/v1/catalog/apprentices -> index de aprendices.
    Route::get('/apprentices', [CatalogController::class, 'apprentices'])->name('api.catalog.apprentices');

    // GET /api/v1/catalog/training-centers -> index de centros de formación.
    Route::get('/training-centers', [CatalogController::class, 'trainingCenters'])->name('api.catalog.training_centers');

    // GET /api/v1/catalog/summary -> devuelve conteos rápidos del sistema.
    Route::get('/summary', [CatalogController::class, 'summary'])->name('api.catalog.summary');
});
