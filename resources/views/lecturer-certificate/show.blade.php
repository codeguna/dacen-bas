@extends('layouts.app')

@section('template_title')
    {{ $lecturerCertificate->name ?? "{{ __('Show') Lecturer Certificate" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Lecturer Certificate</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('lecturer-certificates.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Lecturer Id:</strong>
                            {{ $lecturerCertificate->lecturer_id }}
                        </div>
                        <div class="form-group">
                            <strong>Certificate Types Id:</strong>
                            {{ $lecturerCertificate->certificate_types_id }}
                        </div>
                        <div class="form-group">
                            <strong>Certificate Date:</strong>
                            {{ $lecturerCertificate->certificate_date }}
                        </div>
                        <div class="form-group">
                            <strong>Note:</strong>
                            {{ $lecturerCertificate->note }}
                        </div>
                        <div class="form-group">
                            <strong>Certificate Attachment:</strong>
                            {{ $lecturerCertificate->certificate_attachment }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
