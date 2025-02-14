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
                                    <a href="{{ route('admin.employee-leaves.generate', ['year' => $tahun]) }}"
                                        class="btn btn-warning btn-sm float-right" data-placement="left">
                                        <i class="fa fa-magic" aria-hidden="true"></i> Generate
                                    </a>
                                </div>
                            </div>
                            @include('employee-leave.modal.create')
                        </div>
                        <div class="alert alert-primary" role="alert">
                            <strong>Perhatian!</strong> Cukup lakukan proses <b>Generate</b> ini 1x. Jika ada
                            ketidaksesuaian data silahkan hapus atau edit.
                        </div>

                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
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
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('admin.employee-leaves.edit', $employeeLeave->pin) }}"><i
                                                            class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i></button>
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
                "order": [[0, 'asc']]
            });
        });
    </script>
@endsection
