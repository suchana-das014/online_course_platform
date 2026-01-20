<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\InstructorDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Instructor\CourseController;

/*
|--------------------------------------------------------------------------
| Public Route
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Role-Based Dashboards
|--------------------------------------------------------------------------
*/
Route::middleware(['auth','role:student'])->group(function () {
    Route::get('/my-courses', [StudentDashboardController::class, 'index']);
});

Route::middleware(['auth','role:instructor'])->group(function () {
    Route::get('/instructor/dashboard', [InstructorDashboardController::class, 'index']);
});

Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index']);
});

/*
|--------------------------------------------------------------------------
| Breeze Default Routes
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','role:instructor'])->prefix('instructor')->name('instructor.')->group(function () {
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');

    
    Route::delete('/courses/{course}', [CourseController::class, 'destroy'])
        ->name('courses.destroy');
});


Route::middleware(['auth', 'role:student'])->group(function () {

    Route::get('/courses', [\App\Http\Controllers\Student\CourseController::class, 'index'])
        ->name('student.courses.index');

    Route::post('/courses/{course}/enroll', [\App\Http\Controllers\Student\CourseController::class, 'enroll'])
        ->name('student.courses.enroll');
});

Route::middleware(['auth', 'role:instructor'])->group(function () {

    Route::get(
        '/instructor/courses/{course}/lessons/create',
        [\App\Http\Controllers\Instructor\LessonController::class, 'create']
    )->name('instructor.lessons.create');

    Route::post(
        '/instructor/courses/{course}/lessons',
        [\App\Http\Controllers\Instructor\LessonController::class, 'store']
    )->name('instructor.lessons.store');
});


require __DIR__.'/auth.php';