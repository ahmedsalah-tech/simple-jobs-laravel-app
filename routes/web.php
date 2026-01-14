<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
// Named Route to be dynamically called
Route::get('/jobs/{job}',  [JobController::class, 'show'])->name('jobs.show'); // Route model binding
Route::post('/jobs',  [JobController::class, 'store'])->name('jobs.store');
Route::delete('/jobs/{job}',  [JobController::class, 'destroy'])->name('jobs.destroy');
