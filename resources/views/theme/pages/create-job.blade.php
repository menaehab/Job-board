@extends('theme.layouts.master')

@section('title', 'create a job')
@section('page-title', 'Create A Job')

@section('content')
    <x-header title="Create a job" />
    <div class="container py-5 my-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route('jobs.store') }}">
                    @csrf
                    <!-- job_name input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input name="job_name" placeholder="Enter Job name" type="text" id="form2Example1"
                            class="form-control" />
                        <label class="form-label" value="old('job_name')" for="form2Example1">Job Name</label>
                        @error('job_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- employment_type input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <select name="employment_type" id="employment_type" class="form-select">
                            <option value="full-time" {{ old('employment_type') === 'full-time' ? 'selected' : '' }}>
                                Full-time</option>
                            <option value="part-time" {{ old('employment_type') === 'part-time' ? 'selected' : '' }}>
                                Part-time</option>
                        </select>
                        <label class="form-label" value="old('employment_type')" for="form2Example1">Employment Type</label>
                        @error('employment_type')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- salary_min input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input name="salary_min" placeholder="Enter job Minmum Salary" type="number  " id="form2Example1"
                            class="form-control" />
                        <label class="form-label" value="old('salary_min')" for="form2Example1">Minmum Salary</label>
                        @error('salary_min')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- salary_min input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input name="salary_max" placeholder="Enter job Maxmum Salary" type="number  " id="form2Example1"
                            class="form-control" />
                        <label class="form-label" value="old('salary_max')" for="form2Example1">Maxmum Salary</label>
                        @error('salary_max')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Location input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" name="location" id="location" class="form-control"
                            value="{{ old('location') }}" placeholder="Enter job location">
                        <label class="form-label" value="old('location')" for="form2Example1">Location</label>

                        @error('location')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter job description">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- requirements -->
                    <div class="mb-3">
                        <label for="requirements" class="form-label">Requirements</label>
                        <textarea name="requirements" id="requirements" class="form-control" rows="5"
                            placeholder="Enter job requirements">{{ old('requirements') }}</textarea>
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
