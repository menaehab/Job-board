@extends('theme.layouts.master')

@section('title', 'Employer Register')
@section('page-title', 'Employer Register')

@section('content')
    <x-header title="Employer Register" />

    <div class="container py-5 my-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route('employer-register') }}">
                    @csrf
                    <!-- Name input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input name="name" type="name" id="form2Example1" class="form-control" />
                        <label class="form-label" value="old('name')" for="form2Example1">Company Name</label>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input name="email" type="email" id="form2Example1" class="form-control" />
                        <label class="form-label" value="old('email')" for="form2Example1">Email address</label>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input name="password" type="password" id="form2Example2" class="form-control" />
                        <label class="form-label" for="form2Example2">Password</label>
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Confirmation input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input name="password_confirmation" type="password" id="form2Example2" class="form-control" />
                        <label class="form-label" for="form2Example2">Password Confirmation</label>
                        @error('password_confirmation')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit button -->
                    <button type="submit" data-mdb-button-init data-mdb-ripple-init
                        class="btn btn-primary btn-block mb-4">Sign in</button>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Already registered? <a href="{{ route('login') }}">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
