@extends('layouts.dashboard')

@section('template_title')
    {{ $notScanLog->name ?? "{{ __('Show') Not Scan Log" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Not Scan Log</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.not-scan-logs.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Pin:</strong>
                            {{ $notScanLog->pin }}
                        </div>
                        <div class="form-group">
                            <strong>Reason Id:</strong>
                            {{ $notScanLog->reason_id }}
                        </div>
                        <div class="form-group">
                            <strong>Note:</strong>
                            {{ $notScanLog->note }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
