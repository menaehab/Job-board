@extends('theme.layouts.master')

@section('title', 'Job Detail')
@section('page-title', 'Job Detail')

@section('content')
    <x-header title="Job Detail" />
    <!-- Job Detail Start -->
    @if (session('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gy-5 gx-4">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center mb-5">
                        <img class="flex-shrink-0 img-fluid border rounded"
                            src="{{ str_replace('http://localhost', '', $job->employer->profile_photo_url) }}"
                            alt="" style="width: 80px; height: 80px;">
                        <div class="text-start ps-4">
                            <h3 class="mb-3">{{ $job->job_name }}</h3>
                            <span class="text-truncate me-3"><i
                                    class="fa fa-map-marker-alt text-primary me-2"></i>{{ $job->location }}</span>
                            <span class="text-truncate me-3"><i
                                    class="far fa-clock text-primary me-2"></i>{{ $job->employment_type }}</span>
                            <span class="text-truncate me-0"><i
                                    class="far fa-money-bill-alt text-primary me-2"></i>${{ $job->salary_min }} -
                                ${{ $job->salary_max }}</span>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h4 class="mb-3">Job description</h4>
                        <p>{{ $job->description }}</p>
                        <h4 class="mb-3">Qualifications</h4>
                        <ul class="list-unstyled">
                            @foreach (explode("\n", $job->requirements) as $requirement)
                                <li><i class="fa fa-angle-right text-primary me-2"></i>{{ $requirement }}</li>
                            @endforeach
                        </ul>
                    </div>

                    @if (Auth::user())
                        <div class="">
                            <h4 class="mb-4">Apply For The Job</h4>
                            <form action="{{ route('job-applications.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="job_id" value="{{ $job->id }}">
                                <div class="row g-3">
                                    <div class="col-12 col-sm-6">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter your Name">
                                        <label for="name">Name</label>
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="email" name="email" class="form-control"
                                            placeholder="enter your Email">
                                        <label for="email">Email</label>
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="text" name="portfolio" class="form-control"
                                            placeholder="Enter portfolio Website">
                                        <label for="portfolio">Portfolio Website</label>
                                        @error('portfolio')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="file" name="cv" class="form-control bg-white">
                                        <label for="cv">Upload CV</label>
                                        @error('cv')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control" name="cover_letter" rows="5" placeholder="Enter coverletter"></textarea>
                                        <label for="coverletter">Enter Coverletter</label>
                                        @error('cover_letter')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Apply Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>

                <div class="col-lg-4">
                    <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Job Summery</h4>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Published On:
                            {{ $job->created_at->format('Y-m-d') }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Company: {{ $job->employer->name }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: {{ $job->employment_type }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: ${{ $job->salary_min }} -
                            ${{ $job->salary_max }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Location: {{ $job->location }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Job Detail End -->
@endsection
