@extends('layouts.dashboard')

@section('template_title')
    Tambah Pelamar | {{ $job_name }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title"><i class="fa fa-plus text-success" aria-hidden="true"></i> Tambah Pelamar |
                            {{ $job_name }}</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.job-applicants.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('job-applicant.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        });
    </script>
@endsection
