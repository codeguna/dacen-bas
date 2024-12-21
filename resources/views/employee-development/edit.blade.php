@extends('layouts.dashboard')

@section('template_title')
    Perbarui Data Pengembangan Karyawan | {{ $employeeDevelopment->employeeDevelopmentMembers->user->name ?? '' }}
@endsection
@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <h3><i class="fa fa-pencil-alt text-warning" aria-hidden="true"></i> Perbarui Data Pengembangan Karyawan | {{ $employeeDevelopment->employeeDevelopmentMembers->user->name ?? '' }}</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST"
                            action="{{ route('admin.employee-developments.update', $employeeDevelopment->id) }}"
                            role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('employee-development.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
