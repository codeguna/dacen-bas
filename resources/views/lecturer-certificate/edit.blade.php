@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Lecturer Certificate
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Lecturer Certificate</span>
                    </div>
                    <div class="card-body">
                        <form method="POST"
                            action="{{ route('admin.lecturer-certificates.update', $lecturerCertificate->id) }}"
                            role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('lecturer-certificate.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
