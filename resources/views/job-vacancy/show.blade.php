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
    <div class="box box-info padding-1">
        <div class="box-body">

        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <h3><i class="fa fa-users" aria-hidden="true"></i> Data Pelamar</h3>
            </div>
            <div class="col-md-12 p-3">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Jenjang & Pendidikan</th>
                            <th>Tahun Lulus</th>
                            <th>Tanggal Melamar</th>
                            <th><i class="fa fa-cogs" aria-hidden="true"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @forelse ($getApplicant as $applicant)
                            <tr>
                                <td>
                                    {{ ++$i }}
                                </td>
                                <td>
                                    {{ $applicant->full_name }}
                                </td>
                                <td>
                                    @switch($applicant->level)
                                        @case(1)
                                            SMA/SMK
                                        @break

                                        @case(2)
                                            D1
                                        @break

                                        @case(3)
                                            D3
                                        @break

                                        @case(4)
                                            D4
                                        @break

                                        @case(5)
                                            S1
                                        @break

                                        @case(6)
                                            S2
                                        @break

                                        @case(7)
                                            S3
                                        @break

                                        @default
                                    @endswitch | {{ $applicant->university }}
                                </td>
                                <td>
                                    {{ $applicant->graduation_year }}
                                </td>
                                <td>
                                    {{ date('d M Y', strtotime($applicant->graduation_year)) }}
                                </td>
                                <td>
                                    @if ($applicant->is_approved == 0)
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-primary" style="text-decoration: none">
                                                <i class="fa fa-eye" aria-hidden="true"></i> Detail
                                            </a>
                                            <a href="#" class="btn btn-success" style="text-decoration: none">
                                                <i class="fa fa-check-circle" aria-hidden="true"></i> Terima
                                            </a>
                                        </div>
                                    @else
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-primary" style="text-decoration: none">
                                                <i class="fa fa-eye" aria-hidden="true"></i> Detail
                                            </a>
                                            <a href="#" class="btn btn-danger" style="text-decoration: none">
                                                <i class="fa fa-times-circle" aria-hidden="true"></i> Tolak
                                            </a>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="6">== Data Tidak Ada ==</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    @endsection
