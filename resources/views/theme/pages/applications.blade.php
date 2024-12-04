@extends('theme.layouts.master')

@section('title', 'Applications')
@section('page-title', 'Applications')

@section('content')
    <x-header title="Applications" />
    @if (session('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <!-- Jobs Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Applications</h1>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Job</th>
                                    <th>Portfolio</th>
                                    <th>CV</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($applications as $key => $application)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $application->name }}</td>
                                        <td>{{ $application->email }}</td>
                                        <td>{{ $application->job->job_name }}</td>
                                        <td><a href="{{ $application->portfolio }}" class="btn btn-primary"
                                                target="_blank">View Portfolio</a></td>
                                        <td><a href="{{ asset('storage/' . $application->cv) }}" class="btn btn-primary"
                                                target="_blank">View CV</a>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary view-details" data-bs-toggle="modal"
                                                data-bs-target="#coverLetterModal-{{ $application->id }}">View Cover
                                                Letter</button>

                                        </td>
                                    </tr>

                                    <!-- Modal for Cover Letter -->
                                    <div class="modal fade" id="coverLetterModal-{{ $application->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Cover Letter</h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ $application->cover_letter }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {{ $applications->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jobs End -->
@endsection
