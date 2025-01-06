@extends('layouts.app')

@section('template_title')
    {{ $jobApplicantAddress->name ?? "{{ __('Show') Job Applicant Address" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Job Applicant Address</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('job-applicant-addresses.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Job Applicant Id:</strong>
                            {{ $jobApplicantAddress->job_applicant_id }}
                        </div>
                        <div class="form-group">
                            <strong>Address:</strong>
                            {{ $jobApplicantAddress->address }}
                        </div>
                        <div class="form-group">
                            <strong>Village:</strong>
                            {{ $jobApplicantAddress->village }}
                        </div>
                        <div class="form-group">
                            <strong>District:</strong>
                            {{ $jobApplicantAddress->district }}
                        </div>
                        <div class="form-group">
                            <strong>Province:</strong>
                            {{ $jobApplicantAddress->province }}
                        </div>
                        <div class="form-group">
                            <strong>City:</strong>
                            {{ $jobApplicantAddress->city }}
                        </div>
                        <div class="form-group">
                            <strong>Postal Code:</strong>
                            {{ $jobApplicantAddress->postal_code }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
