@extends('layouts.dashboard')

@section('template_title')
    Job Vacancy
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3><i class="fas fa-chalkboard"></i> Dashboard Lowongan Kerja</h3>
            </div>
            <div class="col-md-3">
                <div class="small-box bg-lightblue">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Lowongan Aktif</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Lowongan Tidak Aktif</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-hourglass-end" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Pelamar Diterima</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Pelamar Ditolak</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-times"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Daftar Lowongan Pekerjaan
                            </span>

                            <div class="float-right">
                                <a href="{{ route('admin.job-vacancies.create') }}"
                                    class="btn btn-primary btn-sm float-right" data-placement="left">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Tambah Lowongan
                                </a>
                            </div>
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
                                        <th>No</th>
                                        <th>Nama Lowongan</th>
                                        <th>Departemen</th>
                                        <th>Jumlah Kebutuhan</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Berakhir</th>
                                        <th>Pemohon</th>
                                        <th><i class="fa fa-cogs" aria-hidden="true"></i></th>
                                        <th>Status Lamaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        use Carbon\Carbon;
                                        $today = Carbon::now()->format('Y-m-d');
                                    @endphp

                                    @forelse ($jobVacancies as $jobVacancy)
                                        @php
                                            $date_start = \Carbon\Carbon::parse($jobVacancy->date_start)->format(
                                                'j F y',
                                            );
                                            $deadline = \Carbon\Carbon::parse($jobVacancy->deadline)->format('j F y');

                                            $endDate = \Carbon\Carbon::parse($jobVacancy->deadline)->format('Y-m-d');
                                            $startDate = \Carbon\Carbon::parse($jobVacancy->date_start)->format('Y-m-d');
                                        @endphp
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $jobVacancy->title }}</td>
                                            <td>{{ $jobVacancy->department->name }}</td>
                                            <td>{{ $jobVacancy->amount_needed }} <i class="fa fa-user" aria-
                                                    hidden="true"></i></td>
                                            <td>{{ $date_start }}</td>
                                            <td>{{ $deadline }}</td>
                                            <td>{{ $jobVacancy->user->name }}</td>
                                            <td>
                                                <form action="{{ route('admin.job-vacancies.destroy', $jobVacancy->id) }}"
                                                    method="POST">
                                                    <div class="btn-group">
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('admin.job-vacancies.show', $jobVacancy->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i></a>
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('admin.job-vacancies.edit', $jobVacancy->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i></a>
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i></button>
                                                        @if ($deadline <= $today)
                                                            <a href="" class="btn btn-sm btn-info" title="Tambah Pelamar">
                                                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                                                            </a>
                                                        @else
                                                            <a href="#" class="btn btn-sm btn-dark" title="Sudah Melewati Batas Waktu">
                                                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                            <td>
                                                @if ($startDate <= $endDate)
                                                    <div class="badge bg-primary">
                                                        <i class="fa fa-check" aria-hidden="true"></i> Aktif
                                                    </div>
                                                @else
                                                    <div class="badge bg-secondary">
                                                        <i class="fa fa-times" aria-hidden="true"></i> Tidak Aktif
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9"></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
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
                "autoWidth": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
