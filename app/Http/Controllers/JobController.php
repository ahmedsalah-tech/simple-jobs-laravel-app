<?php

namespace App\Http\Controllers;

use App\Models\Dojo;
use Illuminate\Http\Request;
use App\Models\Work;

class JobController extends Controller
{
    public function index() {
        // route --> /jobs/
        // get the jobs in timely order
        $jobs = Work::with('dojo')->orderBy('created_at', 'desc')->paginate(10); //  eager loading

        return view('jobs.index', ["jobs" => $jobs]);
    }

    public function show($id) {
        // route --> /jobs/{$id}
        // return 404 if not found
        $job = Work::with('dojo')->findOrFail($id);

        return view('jobs.show', ['job' => $job]);
    }

    public function create() {
        // route --> /jobs/create
        // get all dojos for the select dropdown
        $dojos = Dojo::all();

        return view('jobs.create', ['dojos' =>$dojos]);
    }
}
