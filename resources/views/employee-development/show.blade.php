@extends('layouts.dashboard')

@section('template_title')
    {{ $employeeDevelopment->name ?? "{{ __('Show') Employee Development" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Employee Development</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.employee-developments.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Event Name:</strong>
                            {{ $employeeDevelopment->event_name }}
                        </div>
                        <div class="form-group">
                            <strong>Speaker:</strong>
                            {{ $employeeDevelopment->speaker }}
                        </div>
                        <div class="form-group">
                            <strong>Event Organizer:</strong>
                            {{ $employeeDevelopment->event_organizer }}
                        </div>
                        <div class="form-group">
                            <strong>Place:</strong>
                            {{ $employeeDevelopment->place }}
                        </div>
                        <div class="form-group">
                            <strong>Price:</strong>
                            {{ $employeeDevelopment->price }}
                        </div>
                        <div class="form-group">
                            <strong>Event Type:</strong>
                            {{ $employeeDevelopment->event_type }}
                        </div>
                        <div class="form-group">
                            <strong>Start Date:</strong>
                            {{ $employeeDevelopment->start_date }}
                        </div>
                        <div class="form-group">
                            <strong>End Date:</strong>
                            {{ $employeeDevelopment->end_date }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
