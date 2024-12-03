@extends('theme.layouts.master')

@section('title', 'My Jobs')
@section('page-title', 'My Jobs')

@section('content')
    <x-header title="My Jobs" />
    @if (session('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <!-- Jobs Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">My Jobs</h1>
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
                                <div class="job-item p-4 mb-4" data-title="Wordpress Developer"
                                    data-location="New York, USA" data-type="Full Time" data-salary="$123 - $456">
                                    <div class="row g-4">
                                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid border rounded"
                                                src="{{ str_replace('http://localhost', '', $job->employer->profile_photo_url) }}"
                                                alt="" style="width: 80px; height: 80px;">
                                            <div class="text-start ps-4">
                                                <h5 class="mb-3">{{ $job->job_name }}</h5>
                                                <span class="text-truncate me-3"><i
                                                        class="fa fa-map-marker-alt text-primary me-2"></i>{{ $job->location }}</span>
                                                <span class="text-truncate me-3"><i
                                                        class="far fa-clock text-primary me-2"></i>{{ $job->employment_type }}</span>
                                                <span class="text-truncate me-0"><i
                                                        class="far fa-money-bill-alt text-primary me-2"></i>${{ $job->salary_min }}
                                                    -
                                                    ${{ $job->salary_max }}</span>
                                            </div>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                            <div class="d-flex mb-3">
                                                <a class="btn btn-primary me-2"
                                                    href="{{ route('jobs.show', $job->slug) }}">Applies</a>
                                                <a class="btn btn-primary me-2"
                                                    href="{{ route('jobs.show', $job->slug) }}">Edit</a>
                                                <a class="btn btn-primary me-2"
                                                    href="{{ route('jobs.show', $job->slug) }}">Show</a>
                                                <a class="btn btn-primary"
                                                    href="{{ route('jobs.show', $job->slug) }}">Delete</a>
                                            </div>
                                            <small class="text-truncate"><i
                                                    class="far fa-calendar-alt text-primary me-2"></i>{{ $job->created_at->format('Y-m-d') }}</small>
                                        </div>
                                    </div>
                                </div>
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
