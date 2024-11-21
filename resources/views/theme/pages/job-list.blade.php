@extends('theme.layouts.master')

@section('title', 'Job List')
@section('page-title', 'Job List')

@section('content')
    <x-header title="Job List" />
    @if (session('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <!-- Jobs Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <!-- Search Box -->
                        <form method="GET" action="{{ route('jobs.index') }}">
                            <div class="mb-4 d-flex justify-content-center text-center">
                                <input type="text" name="query" class="form-control w-25" id="searchJobs"
                                    placeholder="Search for jobs...">
                                <button class="btn btn-primary mx-3" onclick="filterJobs()">Search</button>
                            </div>
                        </form>
                        <!-- Job Listings -->
                        <div id="job-list">
                            @foreach ($jobs as $job)
                                <x-job :jobName="$job->job_name" :location="$job->location" :employmentType="$job->employment_type" :companyImage="$job->employer->profile_photo_url"
                                    :date="$job->created_at->format('Y-m-d')" :minSalary="$job->salary_min" :maxSalary="$job->salary_max" :data-title="$job->job_name"
                                    :data-location="$job->location" :data-type="$job->employment_type" />
                            @endforeach
                        </div>
                        <!-- Pagination Buttons -->
                        <div class="d-flex justify-content-center mt-4" id="pagination">
                            <!-- Pagination buttons will be added here by JavaScript -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jobs End -->
@endsection
