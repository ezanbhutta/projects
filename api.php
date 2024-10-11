<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/all_courses',[CoursesController::class,"getAllCourses"]);
Route::get('/insturctors_all',[TeacherController::class,"getAllInstructors"]);
Route::get('/news_all',[BlogController::class,"getAllNews"]);
Route::get('/courses_all',[CoursesController::class,"getCoursesAll"]);
Route::get('/course_detail/{id}',[CoursesController::class,"getCourseDetails"]);
Route::get('/instructor_detail/{id}',[TeacherController::class,"getInstructorDetails"]);
Route::get('/news_detail/{id}',[BlogController::class,"getNewsDetails"]);
Route::post('/add_contacts',[ContactController::class,"addContact"]);
Route::post('/add_student',[StudentController::class,"addStudent"]);
