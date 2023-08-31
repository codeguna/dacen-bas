@extends('layouts.dashboard')

@section('template_title')
    {{ __('Create') }} Tenaga Kependidikan
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Tenaga Kependidikan</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.educational-staffs.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('educational-staff.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
