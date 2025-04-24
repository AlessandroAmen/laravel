<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', [PostController::class, 'index'])->name('homepage');
Route::post('/', [PostController::class, 'store'])->name('post.store');

// Profilo Utente
Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
Route::put('/profile/{id}', [ProfileController::class, 'modify'])->name('profile.modify');
Route::delete('/profile/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Registrazione
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/register', function () {
    return view('register'); // Assicurati che il file resources/views/register.blade.php esista
})->name('register.form');