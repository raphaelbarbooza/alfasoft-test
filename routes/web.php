<?php

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

Route::get('/',[\App\Http\Controllers\ContactController::class,'index'])->name('contact.index');

Route::post('/auth',[\App\Http\Controllers\AuthController::class, 'authenticate'])->name('auth.login');
Route::get('/login',[\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/logout',[\App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');

Route::middleware('auth:web')->group(function(){
    Route::prefix('contact')->group(function(){
        // Create Form Route
        Route::get('/create',[\App\Http\Controllers\ContactController::class,'create'])->name('contact.create');
        // Save create form data
        Route::post('/save',[\App\Http\Controllers\ContactController::class, 'save'])->name('contact.create.save');

        // With selected contact
        Route::prefix('{contact}')->group(function(){
            // View Route
            Route::get('/',[\App\Http\Controllers\ContactController::class,'view'])->name('contact.view');
            // Update Form Route
            Route::get('/update',[\App\Http\Controllers\ContactController::class,'update'])->name('contact.update');
            // Save update form data
            Route::post('/save',[\App\Http\Controllers\ContactController::class, 'save'])->name('contact.update.save');
            // Delete Route
            Route::post('/delete',[\App\Http\Controllers\ContactController::class, 'delete'])->name('contact.delete');
        });
    });
});
