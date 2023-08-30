@extends('layouts.dashboard')

@section('template_title')
    {{ $studyProgram->name ?? "{{ __('Show') Study Program" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Study Program</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.study-programs.index') }}">
                                {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $studyProgram->name }}
                        </div>
                        <div class="form-group">
                            <strong>Short Name:</strong>
                            {{ $studyProgram->short_name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
