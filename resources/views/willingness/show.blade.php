@extends('layouts.dashboard')

@section('template_title')
    {{ $willingness->name ?? "{{ __('Show') Willingness" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Willingness</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.willingnesses.index') }}">
                                {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Pin:</strong>
                            {{ $willingness->pin }}
                        </div>
                        <div class="form-group">
                            <strong>Start Date:</strong>
                            {{ $willingness->start_date }}
                        </div>
                        <div class="form-group">
                            <strong>End Date:</strong>
                            {{ $willingness->end_date }}
                        </div>
                        <div class="form-group">
                            <strong>Day Code:</strong>
                            {{ $willingness->day_code }}
                        </div>
                        <div class="form-group">
                            <strong>Time Of Entry:</strong>
                            {{ $willingness->time_of_entry }}
                        </div>
                        <div class="form-group">
                            <strong>Time Of Return:</strong>
                            {{ $willingness->time_of_return }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
