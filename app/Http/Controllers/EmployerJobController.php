<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class EmployerJobController extends Controller
{
    public function postedJobs(Request $request) {
        $query = $request->input('query');
        $jobs = Job::where('employer_id', auth()->guard('employer')->user()->id)
            ->where(function ($q) use ($query) {
                $q->where('job_name', 'like', "%$query%")
                ->orWhere('location', 'like', "%$query%")
                ->orWhere('employment_type', 'like', "%$query%");
            })
            ->get();
        return view('theme.pages.my-jobs',compact('jobs'));
    }
}