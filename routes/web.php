<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ProfessorController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resources([
    'students' => StudentController::class,
    'courses' => CourseController::class,
    'schedules' => ScheduleController::class,
    'subjects' => SubjectController::class,
    'professors' => ProfessorController::class
]);

Route::get('/export-students', [StudentController::class, 'export'])->name('students.export');

Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'index')->name('myprofile');
    Route::post('/profile', 'store')->name('profile.store');
});
