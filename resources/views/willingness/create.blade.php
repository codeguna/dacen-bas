@extends('layouts.dashboard')

@section('template_title')
    Tambah Kesediaan
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">
                            <h3>
                                <i class="fas fa-user-clock text-primary"></i> Tambah Kesediaan
                            </h3>
                        </span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.willingness.storeTime') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('willingness.form')
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
