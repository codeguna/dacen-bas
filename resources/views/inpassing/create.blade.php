@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Inpassing
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Inpassing</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.inpassings.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('inpassing.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
