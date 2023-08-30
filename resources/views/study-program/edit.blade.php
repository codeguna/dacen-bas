@extends('layouts.dashboard')

@section('template_title')
    {{ __('Update') }} Study Program
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Study Program</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.study-programs.update', $studyProgram->id) }}"
                            role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('study-program.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
