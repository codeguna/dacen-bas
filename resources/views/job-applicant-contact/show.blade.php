@extends('layouts.app')

@section('template_title')
    {{ $jobApplicantContact->name ?? "{{ __('Show') Job Applicant Contact" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Job Applicant Contact</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('job-applicant-contacts.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Job Applicant Id:</strong>
                            {{ $jobApplicantContact->job_applicant_id }}
                        </div>
                        <div class="form-group">
                            <strong>Type:</strong>
                            {{ $jobApplicantContact->type }}
                        </div>
                        <div class="form-group">
                            <strong>Number:</strong>
                            {{ $jobApplicantContact->number }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $jobApplicantContact->email }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
