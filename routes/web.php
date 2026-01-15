<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/register',  'showRegister')->name('show.register');
    Route::get('/login',  'showLogin')->name('show.login');
    Route::post('/register',  'register')->name('register');
    Route::post('/login',  'login')->name('login');
});


// Controller function assigms a fully qualified controller to the routes
Route::middleware('auth')->controller(JobController::class)->group(function () {
    Route::get('/jobs',  'index')->name('jobs.index');
    // built-in single-route middlware in laravel to intercept unauthenticated urequests and forwards them to the login route (->middleware('auth');)
    Route::get('/jobs/create',  'create')->name('jobs.create');
    // Named Route to be dynamically called
    Route::get('/jobs/{job}',   'show')->name('jobs.show'); // Route model binding
    Route::post('/jobs',   'store')->name('jobs.store');
    Route::delete('/jobs/{job}',   'destroy')->name('jobs.destroy');
});
