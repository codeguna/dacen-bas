@extends('layouts.dashboard')

@section('template_title')
    {{ __('Create') }} Jenjang Pendidikan
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Jenjang Pendidikan</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.levels.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('level.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
