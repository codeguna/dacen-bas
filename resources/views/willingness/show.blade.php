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
                            <strong>User Id:</strong>
                            {{ $willingness->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Valid Start:</strong>
                            {{ $willingness->valid_start }}
                        </div>
                        <div class="form-group">
                            <strong>Valid End:</strong>
                            {{ $willingness->valid_end }}
                        </div>
                        <div class="form-group">
                            <strong>Type:</strong>
                            {{ $willingness->type }}
                        </div>
                        <div class="form-group">
                            <strong>Monday:</strong>
                            {{ $willingness->monday }}
                        </div>
                        <div class="form-group">
                            <strong>Tuesday:</strong>
                            {{ $willingness->tuesday }}
                        </div>
                        <div class="form-group">
                            <strong>Wednesday:</strong>
                            {{ $willingness->wednesday }}
                        </div>
                        <div class="form-group">
                            <strong>Thursday:</strong>
                            {{ $willingness->thursday }}
                        </div>
                        <div class="form-group">
                            <strong>Friday:</strong>
                            {{ $willingness->friday }}
                        </div>
                        <div class="form-group">
                            <strong>Saturday:</strong>
                            {{ $willingness->saturday }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
