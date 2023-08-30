@extends('layouts.dashboard')

@section('template_title')
    {{ $knowledge->name ?? "{{ __('Show') Bidang Ilmu" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Bidang Ilmu</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.knowledges.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $knowledge->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
