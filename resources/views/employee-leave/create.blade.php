@extends('layouts.dashboard')

@section('template_title')
    {{ __('Create') }} Employee Leafe
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Employee Leafe</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.employee-leaves.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('employee-leave.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
