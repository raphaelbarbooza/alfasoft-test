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
Route::get('/logout',[\App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');

Route::middleware('auth:web')->group(function(){
    Route::prefix('contact/{contact}')->group(function(){
        // View Route
        Route::get('/',[\App\Http\Controllers\ContactController::class,'view'])->name('contact.view');
    });
});
