@extends('layouts.dashboard')

@section('template_title')
    Update Kesediaan
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">
                            <h3><i class="fas fa-pencil-alt text-warning"></i>
                                Update Kesediaan
                            </h3>
                        </span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.willingness.updateTime') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('willingness.form-update')
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success" type="submit">
                            <i class="fas fa-check"></i> Submit
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
