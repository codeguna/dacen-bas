@extends('layouts.app')

@section('template_title')
    {{ $jobApplicant->name ?? "{{ __('Show') Job Applicant" }}
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
                            <a class="btn btn-primary" href="{{ route('job-applicants.index') }}"> {{ __('Back') }}</a>
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

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
