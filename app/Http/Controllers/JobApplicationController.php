<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobApplicationRequest;
use App\Models\Job_Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobApplicationController extends Controller
{
    public function __construct() {
        $this->middleware('auth:employer')->only('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $applications = Job_Application::whereHas('job', function ($query) {
            $query->where('employer_id', Auth::guard('employer')->user()->id);
        })->paginate(10);
        return view('theme.pages.applications',compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobApplicationRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;
        if ($request->hasFile('cv')) {
            $fileName = $request->file('cv')->getClientOriginalName();
            $fileNameWithTimestamp = time() . '_' . $fileName;
            $data['cv'] = $request->file('cv')->storeAs('cvs', $fileNameWithTimestamp, 'public');
        }
        Job_Application::create($data);
        return redirect()->route('jobs.index')->with('success', 'Application created successfully');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     //
    // }
}