@extends('layouts.app')

@section('template_title')
    {{ $employeeDevelopmentMember->name ?? "{{ __('Show') Employee Development Member" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Employee Development Member</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('employee-development-members.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Employee Developments Id:</strong>
                            {{ $employeeDevelopmentMember->employee_developments_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $employeeDevelopmentMember->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Certificate Attachment:</strong>
                            {{ $employeeDevelopmentMember->certificate_attachment }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
