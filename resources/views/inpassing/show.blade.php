@extends('layouts.app')

@section('template_title')
    {{ $inpassing->name ?? "{{ __('Show') Inpassing" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Inpassing</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.inpassings.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Lecturer Id:</strong>
                            {{ $inpassing->lecturer_id }}
                        </div>
                        <div class="form-group">
                            <strong>Rank Id:</strong>
                            {{ $inpassing->rank_id }}
                        </div>
                        <div class="form-group">
                            <strong>Determination Date:</strong>
                            {{ $inpassing->determination_date }}
                        </div>
                        <div class="form-group">
                            <strong>Tmt:</strong>
                            {{ $inpassing->tmt }}
                        </div>
                        <div class="form-group">
                            <strong>Inpassing Attachment:</strong>
                            {{ $inpassing->inpassing_attachment }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
