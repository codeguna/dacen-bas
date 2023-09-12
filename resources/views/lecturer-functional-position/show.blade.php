@extends('layouts.app')

@section('template_title')
    {{ $lecturerFunctionalPosition->name ?? "{{ __('Show') Lecturer Functional Position" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Lecturer Functional Position</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('lecturer-functional-positions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Lecturer Id:</strong>
                            {{ $lecturerFunctionalPosition->lecturer_id }}
                        </div>
                        <div class="form-group">
                            <strong>Functional Position Id:</strong>
                            {{ $lecturerFunctionalPosition->functional_position_id }}
                        </div>
                        <div class="form-group">
                            <strong>Determination Date:</strong>
                            {{ $lecturerFunctionalPosition->determination_date }}
                        </div>
                        <div class="form-group">
                            <strong>Tmt:</strong>
                            {{ $lecturerFunctionalPosition->tmt }}
                        </div>
                        <div class="form-group">
                            <strong>Credit Score:</strong>
                            {{ $lecturerFunctionalPosition->credit_score }}
                        </div>
                        <div class="form-group">
                            <strong>Functional Position Attachment:</strong>
                            {{ $lecturerFunctionalPosition->functional_position_attachment }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
