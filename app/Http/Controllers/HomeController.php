<?php

namespace App\Http\Controllers;

use App\Models\Job;

class HomeController extends Controller
{
    //
    function home() {
        $jobs = Job::latest()->take(5)->get();
        return view('theme.pages.home',get_defined_vars());
    }
}