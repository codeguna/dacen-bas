@extends('layouts.dashboard')

@section('template_title')
    Lihat Lowongan Pekerjaan | {{ $jobVacancy->title }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title"><i class="fa fa-search text-primary" aria-hidden="true"></i> Lihat
                                Lowongan Pekerjaan | {{ $jobVacancy->title }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.job-vacancies.index') }}">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Nama Lowongan</th>
                                            <td>{{ $jobVacancy->title }}</td>
                                        </tr>
                                        <tr>
                                            <th>Departemen</th>
                                            <td>{{ $jobVacancy->department->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Kelamin</th>
                                            <td>
                                                @switch($jobVacancy->gender)
                                                    @case(1)
                                                        Laki-laki
                                                    @break

                                                    @case(2)
                                                        Perempuan
                                                    @break

                                                    @case(3)
                                                        Laki-laki/Perempuan
                                                    @break

                                                    @default
                                                @endswitch
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Usia Minimal</th>
                                            <td>{{ $jobVacancy->min_age }}</td>
                                        </tr>
                                        <tr>
                                            <th>Usia Maksimal</th>
                                            <td>{{ $jobVacancy->max_age }}</td>
                                        </tr>
                                        <tr>
                                            <th>Jumlah Kebutuhan</th>
                                            <td>{{ $jobVacancy->amount_needed }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Mulai</th>
                                            <td>{{ $jobVacancy->date_start }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Berakhir</th>
                                            <td>{{ $jobVacancy->deadline }}</td>
                                        </tr>
                                        <tr>
                                            <th>Pemohon</th>
                                            <td>{{ $jobVacancy->user->name }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
