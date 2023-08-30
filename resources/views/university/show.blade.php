@extends('layouts.dashboard')

@section('template_title')
    {{ $university->name ?? "{{ __('Show') University" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} University</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.universities.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $university->name }}
                        </div>
                        <div class="form-group">
                            <strong>Short Name:</strong>
                            {{ $university->short_name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
