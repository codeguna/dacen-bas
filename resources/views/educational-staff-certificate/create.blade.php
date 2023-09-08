@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Educational Staff Certificate
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Educational Staff Certificate</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.educational-staff-certificates.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('educational-staff-certificate.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
