@extends('layouts.dashboard')

@section('template_title')
    {{ $jobVacancy->name ?? "{{ __('Show') Job Vacancy" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Job Vacancy</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.job-vacancies.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $jobVacancy->title }}
                        </div>
                        <div class="form-group">
                            <strong>Department Id:</strong>
                            {{ $jobVacancy->department_id }}
                        </div>
                        <div class="form-group">
                            <strong>Gender:</strong>
                            {{ $jobVacancy->gender }}
                        </div>
                        <div class="form-group">
                            <strong>Min Age:</strong>
                            {{ $jobVacancy->min_age }}
                        </div>
                        <div class="form-group">
                            <strong>Max Age:</strong>
                            {{ $jobVacancy->max_age }}
                        </div>
                        <div class="form-group">
                            <strong>Amount Needed:</strong>
                            {{ $jobVacancy->amount_needed }}
                        </div>
                        <div class="form-group">
                            <strong>Date Start:</strong>
                            {{ $jobVacancy->date_start }}
                        </div>
                        <div class="form-group">
                            <strong>Deadline:</strong>
                            {{ $jobVacancy->deadline }}
                        </div>
                        <div class="form-group">
                            <strong>Level:</strong>
                            {{ $jobVacancy->level }}
                        </div>
                        <div class="form-group">
                            <strong>University:</strong>
                            {{ $jobVacancy->university }}
                        </div>
                        <div class="form-group">
                            <strong>Major:</strong>
                            {{ $jobVacancy->major }}
                        </div>
                        <div class="form-group">
                            <strong>University Base:</strong>
                            {{ $jobVacancy->university_base }}
                        </div>
                        <div class="form-group">
                            <strong>Graduation Year:</strong>
                            {{ $jobVacancy->graduation_year }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $jobVacancy->user_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
