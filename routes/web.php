<?php

/*
|--------------------------------------------------------------------------
| Legacy web routes kept as reference for future migration to React
|--------------------------------------------------------------------------
| These routes are intentionally disabled to keep the project in backend/API
| mode for now. The views remain available as historical code, but they are
| not active while the frontend is being migrated.
|
*/

// use App\Http\Controllers\ApprenticeController;
// use App\Http\Controllers\AreaController;
// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\ComputerController;
// use App\Http\Controllers\CourseController;
// use App\Http\Controllers\CourseTeacherController;
// use App\Http\Controllers\EnrollmentController;
// use App\Http\Controllers\TeacherController;
// use App\Http\Controllers\TrainingCenterController;
// use Illuminate\Support\Facades\Route;

// // Página principal con carrusel, accesos rápidos y navegación institucional.
// Route::get('/', function () {
//     return view('welcome');
// })->name('home');
//
// // Pantalla demostrativa de inicio de sesión y registro; todavía no procesa datos.
// Route::get('inicio/registro', function () {
//     return view('auth.access');
// })->name('auth.access');
// Route::post('inicio/registro', [AuthController::class, 'login'])->name('auth.login');
//
// // Formulario independiente para crear una cuenta.
// Route::get('registro', function () {
//     return view('auth.register');
// })->name('auth.register');
// Route::post('registro', [AuthController::class, 'register'])->name('auth.register.store');
//
// // Solo un usuario autenticado puede cerrar su sesión.
// Route::post('cerrar-sesion', [AuthController::class, 'logout'])
//     ->middleware('auth')
//     ->name('auth.logout');
//
// // Permite al usuario autenticado actualizar únicamente un rol público.
// Route::patch('mi-rol', [AuthController::class, 'updateRole'])
//     ->middleware('auth')
//     ->name('user.role.update');
//
// // Convocatorias cargadas desde los cursos existentes.
// Route::get('convocatorias', [CourseController::class, 'offers'])->name('news.convocatorias');
// Route::view('ofertas', 'ofertas.index')->name('news.ofertas');
//
// // Solo los aspirantes, aprendices y administradores pueden inscribirse a una convocatoria.
// Route::post('courses/{course}/enroll', [EnrollmentController::class, 'store'])
//     ->middleware(['auth', 'role:aspirante,aprendiz,admin'])
//     ->name('courses.enroll');
//
// // Página informativa independiente con una reseña histórica del SENA.
// Route::get('sena/historia', function () {
//     return view('sena.history');
// })->name('sena.history');
//
// // Los CRUD de gestión solo pueden ser usados por administradores.
// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::resource('areas', AreaController::class);
//     Route::resource('training-centers', TrainingCenterController::class);
//     Route::resource('computers', ComputerController::class);
//     Route::resource('courses', CourseController::class);
//     Route::resource('teachers', TeacherController::class);
//     Route::resource('apprentices', ApprenticeController::class);
//     Route::resource('course-teachers', CourseTeacherController::class)
//         ->parameters(['course-teachers' => 'courseTeacher']);
// });

// Las vistas quedan listas para migrarlas a React después, pero por ahora la
// aplicación funciona en modo backend/API puro.
