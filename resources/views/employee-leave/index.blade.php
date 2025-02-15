@extends('layouts.dashboard')

@section('template_title')
    Cuti Karyawan {{ date('Y') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <h3 id="card_title">
                                <i class="fas fa-briefcase text-primary"></i> Cuti Karyawan Tahun {{ date('Y') }}
                            </h3>
                            @php
                                $tahun = date('Y');
                            @endphp
                            <div class="float-right">
                                <div class="btn-group">
                                    <a href="#" data-toggle="modal" data-target="#createEmployeeLeave"
                                        class="btn btn-success btn-sm float-right" data-placement="left">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Karyawan
                                    </a>
                                    <a href="#" data-toggle="modal" data-target="#createReport"
                                        class="btn btn-primary btn-sm float-right" data-placement="left">
                                        <i class="fas fa-chart-bar"></i> Report
                                    </a>
                                    <a href="{{ route('admin.employee-leaves.generate', ['year' => $tahun]) }}"
                                        class="btn btn-warning btn-sm float-right" data-placement="left">
                                        <i class="fa fa-magic" aria-hidden="true"></i> Generate
                                    </a>
                                </div>
                            </div>
                            @include('employee-leave.modal.create')
                            @include('employee-leave.modal.report')
                        </div>
                        <div class="alert alert-primary" role="alert">
                            <strong>Perhatian!</strong> Cukup lakukan proses <b>Generate ini 1x</b> dan lakukan lagi di
                            <b>tahun berikutnya</b>. Jika ada
                            ketidaksesuaian data silahkan hapus atau edit.
                        </div>
                        <div class="alert alert-success" role="alert">
                            <strong>Tambah Karyawan.</strong> Jika ada Karyawan yang terlewat!.
                        </div>

                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <form action="{{ route('admin.employee-leaves.index') }}" method="GET">

                            <div class="row">
                                <div class="col-md-12">
                                    <h3><i class="fa fa-calendar text-primary" aria-hidden="true"></i> Pilih Tahun</h3>
                                    <div class="input-group mb-3">
                                        <select class="form-control" name="years" required>
                                            <option disabled>== Pilih Tahun ==</option>
                                            @foreach ($year as $value)
                                                <option value="{{ $value }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-warning">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table id="example1" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jumlah Cuti</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employeeLeaves as $employeeLeave)
                                        <tr>

                                            <td>{{ $employeeLeave->user->name }}</td>
                                            <td>{{ $employeeLeave->amount }}</td>

                                            <td>
                                                <form
                                                    action="{{ route('admin.employee-leaves.destroy', $employeeLeave->pin) }}"
                                                    method="POST">
                                                    <input type="hidden" name="year" value="{{ date('Y') }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="btn-group">
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('admin.employee-leaves.edit', $employeeLeave->pin) }}"><i
                                                                class="fa fa-fw fa-edit"></i></a>
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i></button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "order": [
                    [0, 'asc']
                ]
            });
        });
    </script>
@endsection
