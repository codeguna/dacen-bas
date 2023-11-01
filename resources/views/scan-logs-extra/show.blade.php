@extends('layouts.dashboard')

@section('template_title')
    {{ $scanLogsExtra->name ?? "{{ __('Show') Scan Logs Extra" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Scan Logs Extra</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.scan-logs-extras.index') }}">
                                {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Pin:</strong>
                            {{ $scanLogsExtra->pin }}
                        </div>
                        <div class="form-group">
                            <strong>Scan:</strong>
                            {{ $scanLogsExtra->scan }}
                        </div>
                        <div class="form-group">
                            <strong>Verify:</strong>
                            {{ $scanLogsExtra->verify }}
                        </div>
                        <div class="form-group">
                            <strong>Status Scan:</strong>
                            {{ $scanLogsExtra->status_scan }}
                        </div>
                        <div class="form-group">
                            <strong>Ip Scan:</strong>
                            {{ $scanLogsExtra->ip_scan }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
