<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session as FacadesSession;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;


// Homepage
Route::get('/', [PostController::class, 'index'])->name('homepage');
Route::post('/', [PostController::class, 'store'])->name('posts.store');

// Profilo Utente
Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
Route::put('/profile/{id}', [ProfileController::class, 'modify'])->name('profile.modify');
Route::delete('/profile/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Registrazione
Route::get('/register', function () {
    return view('register');
})->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

//form di login
Route::get('/login', function () {
    return view('login');
})->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

//logout 
Route::post('/logout', function () {
    FacadesSession::forget('user');
    return redirect('/login')->with('success', 'Logout effettuato!');
})->name('logout');