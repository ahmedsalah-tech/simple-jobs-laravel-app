<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', function () {
    $jobs = [
        ["name" => "Tester", "skill" => 75, "id" => "1"],
        ["name" => "Hacker", "skill" => 45, "id" => "2"]
    ];

    return view('jobs.index', ["greeting" => "hello", "jobs" => $jobs]);
});

Route::get('/jobs/create', function() {
    return view('jobs.create');
});

Route::get('/jobs/{id}',  function ($id) {
    // fetch data from DB with id
    return view('jobs.show', ["id" => $id]);
});
