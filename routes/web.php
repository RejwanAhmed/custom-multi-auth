<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminStudentController;
use App\Http\Controllers\AdminTeacherController;
use App\Http\Controllers\TeacherLoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

// Admin Routes
Route::prefix( 'admin' )->name( 'admin.' )->group( function () {
    // if admin is not loggedin
    Route::middleware( 'guest:web' )->group( function () {
        Route::get( '', [AdminLoginController::class, 'index'] )->name( 'index' );
        Route::post( '', [AdminLoginController::class, 'loginCheck'] )->name( 'loginCheck' );
    } );

    // if admin is loogedin
    Route::middleware( 'auth:web' )->group( function () {
        Route::view( 'dashboard', 'admin.dashboard' )->name( 'dashboard' );

        // Student Controller
        Route::get( 'student/add', [AdminStudentController::class, 'index'] )->name( 'student.index' );
        Route::post( 'student/add', [AdminStudentController::class, 'store'] )->name( 'student.store' );
        Route::get( 'student/view', [AdminStudentController::class, 'show'] )->name( 'student.show' );
        Route::get( '/student/delete/{id}', [AdminStudentController::class, 'delete'] )->name( 'student.delete' );

        // Teacher Controller
        Route::get( 'teacer/add', [AdminTeacherController::class, 'index'] )->name( 'teacher.index' );
        Route::post( 'teacher/add', [AdminTeacherController::class, 'store'] )->name( 'teacher.store' );
        Route::get( 'teacher/view', [AdminTeacherController::class, 'show'] )->name( 'teacher.show' );
        Route::get( '/teacher/delete/{id}', [AdminTeacherController::class, 'delete'] )->name( 'teacher.delete' );
        Route::get( 'teacher/status/{id}', [AdminTeacherController::class, 'changeStatus'] )->name( 'teacher.changeStatus' );
        // logout route
        Route::get( '/logout', [AdminLoginController::class, 'logout'] )->name( 'logout' );
    } );
} );

// Teacher Routes
Route::prefix( 'teacher' )->name( 'teacher.' )->group( function () {
    // if teacher is not loggedin
    Route::middleware( 'teacherguest:teacher' )->group( function () {
        Route::get( '', [TeacherLoginController::class, 'index'] )->name( 'index' );
        Route::post( '', [TeacherLoginController::class, 'loginCheck'] )->name( 'loginCheck' );
    } );

    // if teacher is logged in
    Route::middleware( 'teacherauth:teacher' )->group( function () {
        Route::view( 'dashboard', 'teacher.dashboard' )->name( 'dashboard' );

        // logout route
        Route::get( '/logout', [TeacherLoginController::class, 'logout'] )->name( 'logout' );
    } );
} );
