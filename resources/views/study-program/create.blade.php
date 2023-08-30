@extends('layouts.dashboard')

@section('template_title')
    {{ __('Create') }} Study Program
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Study Program</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.study-programs.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('study-program.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
