@extends('layouts.dashboard')

@section('template_title')
    {{ __('Create') }} University
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} University</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.universities.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('university.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
