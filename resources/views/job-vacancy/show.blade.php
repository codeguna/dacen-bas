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
                        @php
                            $date = $jobVacancy->deadline;
                            $date_start = $jobVacancy->date_start;

                            $deadline = date('d-m-Y', strtotime($date));
                            $startdate = date('d-m-Y', strtotime($date_start));
                        @endphp
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
                                            <td>{{ $jobVacancy->min_age }} tahun</td>
                                        </tr>
                                        <tr>
                                            <th>Usia Maksimal</th>
                                            <td>{{ $jobVacancy->max_age }} tahun</td>
                                        </tr>
                                        <tr>
                                            <th>Jumlah Kebutuhan</th>
                                            <td>{{ $jobVacancy->amount_needed }} orang</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Mulai</th>
                                            <td>{{ $startdate }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Berakhir</th>
                                            <td>{{ $deadline }}</td>
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
                        <th>Keterangan</th>
                        <th><i class="fa fa-cogs" aria-hidden="true"></i></th>
                        <th>Status Akhir</i></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @forelse ($getApplicant as $jobApplicant)
                        @php
                            $birthDate = $jobApplicant->born_date;
                            $birthDateTimestamp = strtotime($birthDate);
                            $age = date('Y') - date('Y', $birthDateTimestamp); // Jika bulan dan hari saat ini belum melewati bulan dan hari lahir, kurangi umur dengan satu tahun if (date('md', $birthDateTimestamp) > date('md')) { $age--; }
                        @endphp
                        <tr>
                            <td>
                                {{ ++$i }}
                            </td>
                            <td>
                                {{ $jobApplicant->full_name }}
                            </td>
                            <td>
                                @switch($jobApplicant->level)
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
                                @endswitch | {{ $jobApplicant->university }}
                            </td>
                            <td>
                                {{ $jobApplicant->graduation_year }}
                            </td>
                            <td>
                                {{ date('d M Y', strtotime($jobApplicant->date_of_application)) }}
                            </td>
                            <td>
                                <strong>
                                    @if ($age <= $jobVacancy->max_age)
                                        {{ $age }} |<i class="fa fa-check-square text-success"
                                            aria-hidden="true"></i> Usia Memenuhi
                                    @else
                                        {{ $age }} |<i class="fa fa-times-circle text-danger"
                                            aria-hidden="true"></i> Usia Tidak Memenuhi
                                    @endif
                                </strong>
                            </td>
                            <td>
                                @if ($jobApplicant->is_approved != 3)
                                    <div class="btn-group">
                                        <a href="{{ route('admin.job-applicants.show', $jobApplicant->id) }}"
                                            class="btn btn-xs btn-primary" style="text-decoration: none">
                                            <i class="fa fa-eye" aria-hidden="true"></i> Detail
                                        </a>
                                        <a href="{{ route('admin.job-vacancies.update-status', ['jobID' => $jobApplicant->id, 'status' => 1]) }}"
                                            class="btn btn-xs btn-success" style="text-decoration: none">
                                            <i class="fa fa-check-circle" aria-hidden="true"></i> Terima
                                        </a>
                                        <a href="{{ route('admin.job-vacancies.update-status', ['jobID' => $jobApplicant->id, 'status' => 2]) }}"
                                            class="btn btn-xs btn-danger" style="text-decoration: none">
                                            <i class="fa fa-times-circle" aria-hidden="true"></i> Tolak
                                        </a>
                                    </div>
                                    @else
                                    
                                @endif
                            </td>
                            <td>
                                @switch($jobApplicant->is_approved)
                                    @case(0)
                                        <span class="badge bg-info"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Dalam
                                            proses</span>
                                    @break

                                    @case(1)
                                        <span class="badge bg-success"><i class="fa fa-check-circle" aria-hidden="true"></i>
                                            Diterima</span>
                                        <div class="btn-group">
                                            <a class="btn btn-info btn-xs"
                                                href="{{ route('admin.job-applicants.set-as-employee', ['id' => $jobApplicant->id, 'full_name' => $jobApplicant->full_name, 'deptID' => $jobVacancy->department, 'status' => 'tendik']) }}">
                                                <i class="fas fa-user-tie"></i> Jadikan TenDik?
                                            </a>
                                            <a class="btn btn-warning btn-xs"
                                                href="{{ route('admin.job-applicants.set-as-employee', ['id' => $jobApplicant->id, 'full_name' => $jobApplicant->full_name, 'status' => 'dosen']) }}">
                                                <i class="fas fa-user-graduate"></i> Jadikan Dosen?
                                            </a>
                                        </div>
                                    @break

                                    @case(2)
                                        <span class="badge bg-danger"><i class="fa fa-times-circle" aria-hidden="true"></i>
                                            Ditolak</span>
                                    @break

                                    @case(3)
                                        <span class="badge bg-dark"><i class="fa fa-check-circle" aria-hidden="true"></i>
                                            Sudah jadi Pegawai</span>
                                    @break

                                    @default
                                @endswitch
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="8">== Data Tidak Ada ==</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
        </section>
    @endsection
