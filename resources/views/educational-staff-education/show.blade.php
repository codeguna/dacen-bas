@extends('layouts.app')

@section('template_title')
    {{ $educationalStaffEducation->name ?? "{{ __('Show') Educational Staff Education" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Educational Staff Education</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.educational-staff-educations.index') }}">
                                {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Educational Staff Id:</strong>
                            {{ $educationalStaffEducation->educational_staff_id }}
                        </div>
                        <div class="form-group">
                            <strong>Level Id:</strong>
                            {{ $educationalStaffEducation->level_id }}
                        </div>
                        <div class="form-group">
                            <strong>Study Program Id:</strong>
                            {{ $educationalStaffEducation->study_program_id }}
                        </div>
                        <div class="form-group">
                            <strong>University Id:</strong>
                            {{ $educationalStaffEducation->university_id }}
                        </div>
                        <div class="form-group">
                            <strong>Knowledge Id:</strong>
                            {{ $educationalStaffEducation->knowledge_id }}
                        </div>
                        <div class="form-group">
                            <strong>Certificate:</strong>
                            {{ $educationalStaffEducation->certificate }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
