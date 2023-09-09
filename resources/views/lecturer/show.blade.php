@extends('layouts.dashboard')

@section('template_title')
    {{ $lecturer->name }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Lecturer</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.lecturers.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nidn:</strong>
                            {{ $lecturer->nidn }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $lecturer->name }}
                        </div>
                        <div class="form-group">
                            <strong>Homebase Id:</strong>
                            {{ $lecturer->homebase_id }}
                        </div>
                        <div class="form-group">
                            <strong>Appointment Date:</strong>
                            {{ $lecturer->appointment_date }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $lecturer->status }}
                        </div>
                        <div class="form-group">
                            <strong>Id Card:</strong>
                            {{ $lecturer->id_card }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
