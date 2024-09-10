@extends('layouts.dashboard')

@section('template_title')
    {{ __('Update') }} Not Scan Log
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Not Scan Log</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.not-scan-logs.update', $notScanLog->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('not-scan-log.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
