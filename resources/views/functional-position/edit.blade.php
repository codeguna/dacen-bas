@extends('layouts.dashboard')

@section('template_title')
    {{ __('Update') }} Jabatan Fungsional
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Jabatan Fungsional</span>
                    </div>
                    <div class="card-body">
                        <form method="POST"
                            action="{{ route('admin.functional-positions.update', $functionalPosition->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('functional-position.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
