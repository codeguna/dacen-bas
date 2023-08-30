@extends('layouts.dashboard')

@section('template_title')
    {{ $departmen->name ?? "{{ __('Show') Departmen" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Departmen</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.departmens.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $departmen->name }}
                        </div>
                        <div class="form-group">
                            <strong>Short Name:</strong>
                            {{ $departmen->short_name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
