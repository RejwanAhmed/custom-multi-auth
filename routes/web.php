<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminStudentController;
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
        Route::view( 'dashboard', 'admin.dashboard')->name('dashboard');
        Route::get( 'student/add', [AdminStudentController::class, 'index'] )->name( 'student.index' );
        Route::post( 'student/add', [AdminStudentController::class, 'store'] )->name( 'student.store' );
        Route::get( 'student/view', [AdminStudentController::class, 'show'] )->name( 'student.show' );

        // logout route
        Route::get('/logout', [AdminLoginController::class, 'logout'])->name('logout');
    } );
} );
