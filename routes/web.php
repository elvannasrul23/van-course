<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AssignmentController;

Route::get('/', function () {
    return view('welcome');
});

// Menambahkan Routing Resource untuk setiap entitas
Route::resource('students', StudentController::class);
Route::resource('courses', CourseController::class);
Route::resource('instructors', InstructorController::class);
Route::resource('enrollments', EnrollmentController::class);
Route::resource('assignments', AssignmentController::class);
