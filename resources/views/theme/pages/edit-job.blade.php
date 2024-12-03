@extends('theme.layouts.master')

@section('title', 'Edit a job')
@section('page-title', 'Edit A Job')

@section('content')
    <x-header title="Edit a job" />
    <div class="container py-5 my-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route('jobs.update', $job) }}">
                    @csrf
                    @method('PUT')
                    <!-- job_name input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input name="job_name" value="{{ $job->job_name }}" placeholder="Enter Job name" type="text"
                            id="form2Example1" class="form-control" />
                        <label class="form-label" for="form2Example1">Job Name</label>
                        @error('job_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- employment_type input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <select name="employment_type" id="employment_type" class="form-select">
                            <option value="full-time" {{ $job->employment_type === 'full-time' ? 'selected' : '' }}>
                                Full-time</option>
                            <option value="part-time" {{ $job->employment_type === 'part-time' ? 'selected' : '' }}>
                                Part-time</option>
                        </select>
                        <label class="form-label" for="form2Example1">Employment
                            Type</label>
                        @error('employment_type')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- salary_min input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input name="salary_min" placeholder="Enter job Minmum Salary" type="number"
                            value="{{ $job->salary_min }}" id="form2Example1" class="form-control" />
                        <label class="form-label" for="form2Example1">Minmum Salary</label>
                        @error('salary_min')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- salary_min input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input name="salary_max" value="{{ $job->salary_max }}" placeholder="Enter job Maxmum Salary"
                            type="number  " id="form2Example1" class="form-control" />
                        <label class="form-label" for="form2Example1">Maxmum Salary</label>
                        @error('salary_max')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Location input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" name="location" id="location" class="form-control"
                            value="{{ $job->location }}" placeholder="Enter job location">
                        <label class="form-label" for="form2Example1">Location</label>

                        @error('location')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter job description">{{ $job->description }}</textarea>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- requirements -->
                    <div class="mb-3">
                        <label for="requirements" class="form-label">Requirements</label>
                        <textarea name="requirements" id="requirements" class="form-control" rows="5"
                            placeholder="Enter job requirements">{{ $job->requirements }}</textarea>
                        @error('requirements')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit button -->
                    <button type="submit" data-mdb-button-init data-mdb-ripple-init
                        class="btn btn-primary btn-block mb-4">Post</button>


                </form>
            </div>
        </div>
    </div>
@endsection
