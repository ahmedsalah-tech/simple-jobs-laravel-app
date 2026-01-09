<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;

class JobController extends Controller
{
    public function index() {
        // route --> /jobs/
        // get the jobs in timely order
        $jobs = Work::orderBy('created_at', 'desc')->paginate(10);

        return view('jobs.index', ["jobs" => $jobs]);
    }

    public function show($id) {
        // route --> /jobs/{$id}
        // return 404 if not found
        $job = Work::findOrFail($id);

        return view('jobs.show', ['job' => $job]);
    }

    public function create() {
        return view('jobs.create');
    }
}
