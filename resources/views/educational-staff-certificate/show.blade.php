@extends('layouts.app')

@section('template_title')
    {{ $educationalStaffCertificate->name ?? "{{ __('Show') Educational Staff Certificate" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Educational Staff Certificate</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('educational-staff-certificates.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Educational Staff Id:</strong>
                            {{ $educationalStaffCertificate->educational_staff_id }}
                        </div>
                        <div class="form-group">
                            <strong>Certificate Types Id:</strong>
                            {{ $educationalStaffCertificate->certificate_types_id }}
                        </div>
                        <div class="form-group">
                            <strong>Certificate Date:</strong>
                            {{ $educationalStaffCertificate->certificate_date }}
                        </div>
                        <div class="form-group">
                            <strong>Note:</strong>
                            {{ $educationalStaffCertificate->note }}
                        </div>
                        <div class="form-group">
                            <strong>Certificate Attachment:</strong>
                            {{ $educationalStaffCertificate->certificate_attachment }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
