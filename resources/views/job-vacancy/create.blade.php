@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Job Vacancy
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Job Vacancy</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('job-vacancies.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('job-vacancy.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
