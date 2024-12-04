@extends('theme.layouts.master')
@section('title', 'Home')
@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('theme') }}/img/carousel-1.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(43, 57, 64, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-3 text-white animated slideInDown mb-4">Find The Perfect Job That
                                    You Deserved</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum
                                    dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd
                                    rebum sea elitr.</p>
                                <a href="{{ route('jobs.index') }}"
                                    class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search
                                    A Job</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('theme') }}/img/carousel-2.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(43, 57, 64, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-3 text-white animated slideInDown mb-4">Find The Best Startup Job
                                    That Fit You</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum
                                    dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd
                                    rebum sea elitr.</p>
                                <a href="{{ route('jobs.index') }}"
                                    class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search
                                    A Job</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->
    <!-- Jobs Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        @foreach ($jobs as $job)
                            <x-job :jobName="$job->job_name" :location="$job->location" :employmentType="$job->employment_type" :companyImage="str_replace('http://localhost', '', $job->employer->profile_photo_url)" :date="$job->created_at->format('Y-m-d')"
                                :minSalary="$job->salary_min" :maxSalary="$job->salary_max" :data-title="$job->job_name" :data-location="$job->location" :data-type="$job->employment_type"
                                :slug="$job->slug" />
                        @endforeach
                        <a class="btn btn-primary py-3 px-5" href="{{ route('jobs.index') }}">Browse More Jobs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jobs End -->
@endsection
