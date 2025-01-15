@extends('layouts.dashboard')

@section('template_title')
    Detail Pelamar {{ $jobApplicant->full_name }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <h4 class="card-title"><i class="fa fa-eye text-primary" aria-hidden="true"></i> Detail Pelamar
                            </h4>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.job-applicants.index') }}">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                        </div>
                    </div>
                    @php
                        $birthDate = $jobApplicant->born_date;
                        $birthDateTimestamp = strtotime($birthDate);
                        $age = date('Y') - date('Y', $birthDateTimestamp); // Jika bulan dan hari saat ini belum melewati bulan dan hari lahir, kurangi umur dengan satu tahun if (date('md', $birthDateTimestamp) > date('md')) { $age--; }
                    @endphp
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" name="job_vacancies_id" value="{{ $jobApplicant->job_vacancies_id }}">
                            <div class="col-md-12">
                                <h4 class="font-weight-bold">Data Personal</h4>
                                <div class="form-group">
                                    <strong>Nama Lengkap:</strong>
                                    {{ $jobApplicant->full_name }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Gelar Depan:</strong>
                                    {{ $jobApplicant->front_title ?? 'Tidak Ada' }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Gelar Belakang:</strong>
                                    {{ $jobApplicant->back_title }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Jenis Kelamin:</strong>
                                    @if ($jobApplicant->gender == 1)
                                        Laki-laki
                                    @elseif ($jobApplicant->gender == 2)
                                        Perempuan
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Tempat Lahir:</strong>
                                    {{ $jobApplicant->born_place }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Tanggal Lahir:</strong>
                                    {{ date('d M Y', strtotime($jobApplicant->born_date)) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Umur: </strong>{{ $age }} tahun
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                                <div class="form-group">
                                    <strong>Tanggal Melamar:</strong>
                                    {{ date('d M Y', strtotime($jobApplicant->date_of_application)) }}
                                </div>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Pendidikan:</strong>
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
                                    @endswitch {{ $jobApplicant->major }} - {{ $jobApplicant->university }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Kota Universitas:</strong>
                                    {{ $jobApplicant->university_base }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <strong>Tahun Lulus:</strong>
                            {{ $jobApplicant->graduation_year }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="font-weight-bold">Data Alamat</h4>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Alamat Lengkap:</strong>
                                    {{ $jobApplicant->jobApplicantAddress->address }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Kota/Kab:</strong>
                                    {{ $jobApplicant->jobApplicantAddress->city }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Kelurahan:</strong>
                                    {{ $jobApplicant->jobApplicantAddress->village }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Kecamatan:</strong>
                                    {{ $jobApplicant->jobApplicantAddress->province }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Kelurahan:</strong>
                                    {{ $jobApplicant->jobApplicantAddress->postal_code }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Kecamatan:</strong>
                                    {{ $jobApplicant->jobApplicantAddress->district }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="font-weight-bold">Data Kontak</h4>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>Tipe Nomor:</strong>
                                    @if ($jobApplicant->jobApplicantContact->type == 1)
                                        Handphone (WA)
                                    @elseif($jobApplicant->jobApplicantContact->type == 2)
                                        Telepon
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Nomor:</strong>
                                    {{ $jobApplicant->jobApplicantContact->number }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Alamat Email:</strong>
                                    {{ $jobApplicant->jobApplicantContact->email }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="font-weight-bold">Data Lampiran</h4>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>Surat Lamaran dan CV:</strong>
                                    <a href="{{ url('/data_lampiran_pelamar/' . $jobApplicant->jobApplicantAttachments->files) }}"
                                        target="_blank">
                                        <i class="fa fa-paperclip" aria-hidden="true"></i> Lampiran
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                       <h4>Status Pelamar Saat ini:</h4> 
                        @switch($jobApplicant->is_approved)
                            @case(0)
                                <span class="badge bg-info"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Dalam
                                    proses</span>
                            @break

                            @case(1)
                                <span class="badge bg-success"><i class="fa fa-check-circle" aria-hidden="true"></i>
                                    Diterima</span>
                            @break

                            @case(2)
                                <span class="badge bg-danger"><i class="fa fa-times-circle" aria-hidden="true"></i>
                                    Ditolak</span>
                            @break

                            @default
                        @endswitch
                    </div>
                </div>
            </div>
            <div class="col-md-12 m-3">
                <div class="btn-group">
                    <a href="{{ route('admin.job-vacancies.update-status', ['jobID' => $jobApplicant->id, 'status' => 1]) }}"
                        class="btn btn-success" style="text-decoration: none">
                        <i class="fa fa-check-circle" aria-hidden="true"></i> Terima
                    </a>
                    <a href="{{ route('admin.job-vacancies.update-status', ['jobID' => $jobApplicant->id, 'status' => 2]) }}"
                        class="btn btn-danger" style="text-decoration: none">
                        <i class="fa fa-times-circle" aria-hidden="true"></i> Tolak
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
