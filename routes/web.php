<?php

use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseTeacherController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TrainingCenterController;
use Illuminate\Support\Facades\Route;

// Página principal con carrusel, accesos rápidos y navegación institucional.
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Pantalla demostrativa de inicio de sesión y registro; todavía no procesa datos.
Route::get('inicio/registro', function () {
    return view('auth.access');
})->name('auth.access');
Route::post('inicio/registro', [AuthController::class, 'login'])->name('auth.login');

// Formulario independiente para crear una cuenta.
Route::get('registro', function () {
    return view('auth.register');
})->name('auth.register');
Route::post('registro', [AuthController::class, 'register'])->name('auth.register.store');
// Solo un usuario autenticado puede cerrar su sesión.
Route::post('cerrar-sesion', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('auth.logout');

// Permite al usuario autenticado actualizar únicamente un rol público.
Route::patch('mi-rol', [AuthController::class, 'updateRole'])
    ->middleware('auth')
    ->name('user.role.update');

// Convocatorias cargadas desde los cursos existentes.
Route::get('convocatorias', [CourseController::class, 'offers'])->name('news.convocatorias');
Route::view('ofertas', 'ofertas.index')->name('news.ofertas');

// Solo usuarios autenticados pueden inscribirse a un curso.
Route::post('courses/{course}/enroll', [EnrollmentController::class, 'store'])
    ->middleware('auth')
    ->name('courses.enroll');

// Página informativa independiente con una reseña histórica del SENA.
Route::get('sena/historia', function () {
    return view('sena.history');
})->name('sena.history');

// Los CRUD de gestión solo pueden ser usados por administradores.
Route::middleware(['auth', 'role:admin'])->group(function () {
    // CRUD de áreas.
    Route::resource('areas', AreaController::class);

    // CRUD de centros de formación.
    Route::resource('training-centers', TrainingCenterController::class);

    // CRUD de computadores.
    Route::resource('computers', ComputerController::class);

    // CRUD de cursos y sus relaciones con áreas y centros.
    Route::resource('courses', CourseController::class);

    // CRUD de instructores.
    Route::resource('teachers', TeacherController::class);

    // CRUD de aprendices y sus relaciones con cursos y computadores.
    Route::resource('apprentices', ApprenticeController::class);

    // CRUD de asignaciones entre instructores y cursos.
    Route::resource('course-teachers', CourseTeacherController::class)
        ->parameters(['course-teachers' => 'courseTeacher']);
});