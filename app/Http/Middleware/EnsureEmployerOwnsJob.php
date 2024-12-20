<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureEmployerOwnsJob
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $job = $request->route('job');

        if (Auth::guard('employer')->user()->id != $job->employer_id) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
