@extends('layouts.app')

@section('template_title')
    {{ $lecturerEducation->name ?? "{{ __('Show') Lecturer Education" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Lecturer Education</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('lecturer-educations.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Lecturer Id:</strong>
                            {{ $lecturerEducation->lecturer_id }}
                        </div>
                        <div class="form-group">
                            <strong>Level Id:</strong>
                            {{ $lecturerEducation->level_id }}
                        </div>
                        <div class="form-group">
                            <strong>Study Program Id:</strong>
                            {{ $lecturerEducation->study_program_id }}
                        </div>
                        <div class="form-group">
                            <strong>University Id:</strong>
                            {{ $lecturerEducation->university_id }}
                        </div>
                        <div class="form-group">
                            <strong>Knowledge Id:</strong>
                            {{ $lecturerEducation->knowledge_id }}
                        </div>
                        <div class="form-group">
                            <strong>Certificate:</strong>
                            {{ $lecturerEducation->certificate }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
