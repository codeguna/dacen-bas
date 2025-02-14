@extends('layouts.dashboard')

@section('template_title')
   Perbarui Cuti Karyawan
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-pencil-alt    "></i> Perbarui Cuti Karyawan</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.employee-leaves.update', $employeeLeave->pin) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('employee-leave.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
