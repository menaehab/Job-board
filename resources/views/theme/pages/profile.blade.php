@extends('theme.layouts.master')

@section('title', 'Profile')
@section('page-title', 'Profile')
@section('content')
    <x-header title="Profile" />
    <!-- Job Detail Start -->
    @if (session('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="container py-5 my-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="text-center pb-5">
                        <img src="{{ $image }}" alt="Profile Image" class="rounded-circle" width="150">
                    </div>
                    <!-- Profile Image input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input name="image" type="file" id="form2Example3" class="form-control" />
                        <label class="form-label" for="form2Example3">Profile Image</label>
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Name input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input name="name"
                            value="{{ Auth::check() ? Auth::user()->name : Auth::guard('employer')->user()->name }}"
                            type="name" id="form2Example1" class="form-control" />
                        <label class="form-label" for="form2Example1">Company Name</label>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input name="email"
                            value="{{ Auth::check() ? Auth::user()->email : Auth::guard('employer')->user()->email }}"
                            type="email" id="form2Example1" class="form-control" />
                        <label class="form-label" value="old('email')" for="form2Example1">Email address</label>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit button -->
                    <button type="submit" data-mdb-button-init data-mdb-ripple-init
                        class="btn btn-primary btn-block mb-4">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
