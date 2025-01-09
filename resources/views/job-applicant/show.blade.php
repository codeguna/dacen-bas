@extends('layouts.dashboard')

@section('template_title')
    {{ $jobApplicant->name }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Job Applicant</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.job-applicants.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Job Vacancies Id:</strong>
                            {{ $jobApplicant->job_vacancies_id }}
                        </div>
                        <div class="form-group">
                            <strong>Full Name:</strong>
                            {{ $jobApplicant->full_name }}
                        </div>
                        <div class="form-group">
                            <strong>Front Title:</strong>
                            {{ $jobApplicant->front_title }}
                        </div>
                        <div class="form-group">
                            <strong>Back Title:</strong>
                            {{ $jobApplicant->back_title }}
                        </div>
                        <div class="form-group">
                            <strong>Gender:</strong>
                            {{ $jobApplicant->gender }}
                        </div>
                        <div class="form-group">
                            <strong>Born Place:</strong>
                            {{ $jobApplicant->born_place }}
                        </div>
                        <div class="form-group">
                            <strong>Born Date:</strong>
                            {{ $jobApplicant->born_date }}
                        </div>
                        <div class="form-group">
                            <strong>Date Of  Application:</strong>
                            {{ $jobApplicant->date_of _application }}
                        </div>
                        <div class="form-group">
                            <strong>Level:</strong>
                            {{ $jobApplicant->level }}
                        </div>
                        <div class="form-group">
                            <strong>University:</strong>
                            {{ $jobApplicant->university }}
                        </div>
                        <div class="form-group">
                            <strong>Major:</strong>
                            {{ $jobApplicant->major }}
                        </div>
                        <div class="form-group">
                            <strong>University Base:</strong>
                            {{ $jobApplicant->university_base }}
                        </div>
                        <div class="form-group">
                            <strong>Graduation Year:</strong>
                            {{ $jobApplicant->graduation_year }}
                        </div>
                        <div class="form-group">
                            <strong>Is Approved:</strong>
                            {{ $jobApplicant->is_approved }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
