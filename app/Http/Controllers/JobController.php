<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Requests\StorejobRequest;
use App\Http\Requests\UpdatejobRequest;

class JobController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:employer')->only('create');
        $this->middleware('EnsureEmployerOwnJob')->only(['edit','update','destory']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');
        $jobs = Job::where('job_name', 'like', "%$query%")
        ->orWhere('location', 'like', "%$query%")
        ->orWhere('employment_type', 'like', "%$query%")
        ->get();
        return view('theme.pages.job-list',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('theme.pages.create-job');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorejobRequest $request)
    {
        $data = $request->validated();
        $data['employer_id'] = auth('employer')->user()->id;
        Job::create($data);
        return redirect()->route('jobs.index')->with('success', 'Job created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(job $job)
    {
        return view('theme.pages.job-detail',get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(job $job)
    {
        return view('theme.pages.edit-job', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatejobRequest $request, job $job)
    {
        $data = $request->validated();
        $job->update($data);
        return redirect()->route('jobs.index')->with('success', 'Job Edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully');
    }
}