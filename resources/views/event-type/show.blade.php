@extends('layouts.app')

@section('template_title')
    {{ $eventType->name ?? "{{ __('Show') Event Type" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Event Type</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('event-types.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $eventType->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
