@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Performance Appraisal
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Performance Appraisal</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('performance-appraisals.update', $performanceAppraisal->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('performance-appraisal.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
