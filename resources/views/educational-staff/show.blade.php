@extends('layouts.app')

@section('template_title')
    {{ $educationalStaff->name ?? "{{ __('Show') Tenaga Kependidikan" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Tenaga Kependidikan</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.educational-staffs.index') }}">
                                {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nip:</strong>
                            {{ $educationalStaff->nip }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $educationalStaff->name }}
                        </div>
                        <div class="form-group">
                            <strong>Department Id:</strong>
                            {{ $educationalStaff->department_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date Of Entry:</strong>
                            {{ $educationalStaff->date_of_entry }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $educationalStaff->status }}
                        </div>
                        <div class="form-group">
                            <strong>Id Card:</strong>
                            {{ $educationalStaff->id_card }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
