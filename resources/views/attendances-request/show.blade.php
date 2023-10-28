@extends('layouts.app')

@section('template_title')
    {{ $attendancesRequest->name ?? "{{ __('Show') Attendances Request" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Attendances Request</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('attendances-requests.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $attendancesRequest->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Photo:</strong>
                            {{ $attendancesRequest->photo }}
                        </div>
                        <div class="form-group">
                            <strong>Keterangan:</strong>
                            {{ $attendancesRequest->keterangan }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $attendancesRequest->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
