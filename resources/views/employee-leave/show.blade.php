@extends('layouts.app')

@section('template_title')
    {{ $employeeLeafe->name ?? "{{ __('Show') Employee Leafe" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Employee Leafe</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('employee-leaves.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Pin:</strong>
                            {{ $employeeLeafe->pin }}
                        </div>
                        <div class="form-group">
                            <strong>Amount:</strong>
                            {{ $employeeLeafe->amount }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
