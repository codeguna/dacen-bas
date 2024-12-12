@extends('layouts.dashboard')

@section('template_title')
   Perbarui Data | Performance Appraisal
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title"><i class="fas fa-pencil-alt text-primary"></i> Perbarui Data | Performance Appraisal</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.performance-appraisals.update', $performanceAppraisal->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('performance-appraisal.form-edit')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
