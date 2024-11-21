@extends('layouts.app')

@section('template_title')
    {{ $performanceAppraisal->name ?? "{{ __('Show') Performance Appraisal" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Performance Appraisal</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('performance-appraisals.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Pin:</strong>
                            {{ $performanceAppraisal->pin }}
                        </div>
                        <div class="form-group">
                            <strong>Period:</strong>
                            {{ $performanceAppraisal->period }}
                        </div>
                        <div class="form-group">
                            <strong>Year:</strong>
                            {{ $performanceAppraisal->year }}
                        </div>
                        <div class="form-group">
                            <strong>Late Total:</strong>
                            {{ $performanceAppraisal->late_total }}
                        </div>
                        <div class="form-group">
                            <strong>Pure Pa:</strong>
                            {{ $performanceAppraisal->pure_pa }}
                        </div>
                        <div class="form-group">
                            <strong>Contribution:</strong>
                            {{ $performanceAppraisal->contribution }}
                        </div>
                        <div class="form-group">
                            <strong>Note:</strong>
                            {{ $performanceAppraisal->note }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
