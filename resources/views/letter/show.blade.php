@extends('layouts.app')

@section('template_title')
    {{ $letter->name ?? "{{ __('Show') Letter" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Letter</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.letters.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Letter Type:</strong>
                            {{ $letter->letter_type }}
                        </div>
                        <div class="form-group">
                            <strong>Letter Number:</strong>
                            {{ $letter->letter_number }}
                        </div>
                        <div class="form-group">
                            <strong>Date:</strong>
                            {{ $letter->date }}
                        </div>
                        <div class="form-group">
                            <strong>From:</strong>
                            {{ $letter->from }}
                        </div>
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $letter->title }}
                        </div>
                        <div class="form-group">
                            <strong>File:</strong>
                            {{ $letter->file }}
                        </div>
                        <div class="form-group">
                            <strong>Type Letter Id:</strong>
                            {{ $letter->type_letter_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
