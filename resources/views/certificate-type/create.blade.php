@extends('layouts.dashboard')

@section('template_title')
    {{ __('Create') }} Jenis Sertifikat
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Jenis Sertifikat</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.certificate-types.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('certificate-type.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
