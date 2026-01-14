<?php

namespace App\Http\Controllers;

use App\Models\Dojo;
use Illuminate\Http\Request;
use App\Models\Work;
use PhpParser\Node\Expr\FuncCall;

class JobController extends Controller
{
    public function index() {
        // route --> /jobs/
        // get the jobs in timely order
        $jobs = Work::with('dojo')->orderBy('created_at', 'desc')->paginate(10); //  eager loading

        return view('jobs.index', ["jobs" => $jobs]);
    }

    public function show(Work $job) {
        // route --> /jobs/{$id}
        // return 404 if not found
        $job->load('dojo'); // eager loading

        return view('jobs.show', ['job' => $job]);
    }

    public function create() {
        // route --> /jobs/create
        // get all dojos for the select dropdown
        $dojos = Dojo::all();

        return view('jobs.create', ['dojos' =>$dojos]);
    }

    public function store(Request $request) {
        // route -> /jobs/ POST
        // handle a new POST request to store a new ninja record in table

        $validated = $request->validate([
            'name' => 'required|string|max: 255',
            'skill' => 'required|integer|min:0|max:100',
            'bio' => 'required|string|min:20|max:1000',
            'dojo_id' => 'required|exists:dojos,id'
        ]);

        Work::create($validated);

        // access the flash messages from the seesion
        return redirect()->route('jobs.index')->with('success', 'Job Created!');
    }

    public function destroy(Work $job) {
        // route -> /jobs/{id} DELETE
        // handle a new DELETE request to delete a ninja record from table
        // Binded the route to the model here

        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Job Deleted!');
    }
}
