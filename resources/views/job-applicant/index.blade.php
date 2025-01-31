@extends('layouts.dashboard')

@section('template_title')
    Data Pelamar
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h3><i class="fas fa-user-tie text-indigo"></i> Data Pelamar</h3>
                            </span>

                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="float-right">
                            <form action="{{ route('admin.job-applicants.index') }}" method="GET">
                                @csrf
                                <div class="form-group">
                                    <input type="search" class="form-control w-100" name="search"
                                        placeholder="Tekan [ENTER]" value="{{ request('search') }}">
                                </div>

                            </form>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <th>No</th>
                                    <th>Melamar di</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenjang Pendidikan</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Kota Lahir</th>
                                    <th>Umur</th>
                                    <th>Tanggal Melamar Pekerjaan</th>
                                    <th>Surat & CV Lamaran</th>
                                    <th><i class="fa fa-cogs" aria-hidden="true"></i></th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                @php
                                    use Carbon\Carbon;
                                @endphp
                                <tbody>
                                    @forelse ($jobApplicants as $jobApplicant)
                                        @php
                                            $dateSubmit = \Carbon\Carbon::parse(
                                                $jobApplicant->date_of_application,
                                            )->format('j F Y');
                                            $birthDate = $jobApplicant->born_date;
                                            $birthDateTimestamp = strtotime($birthDate);
                                            $age = date('Y') - date('Y', $birthDateTimestamp); // Jika bulan dan hari saat ini belum melewati bulan dan hari lahir, kurangi umur dengan satu tahun if (date('md', $birthDateTimestamp) > date('md')) { $age--; }
                                        @endphp
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $jobApplicant->jobVacancy->title ?? '' }}</td>
                                            <td>{{ $jobApplicant->full_name }}, {{ $jobApplicant->back_title }}</td>
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
                                                @endswitch - {{ $jobApplicant->university }}
                                                ({{ $jobApplicant->graduation_year }})
                                            </td>

                                            <td>
                                                @switch($jobApplicant->gender)
                                                    @case(1)
                                                        Laki-laki
                                                    @break

                                                    @case(2)
                                                        Perempuan
                                                    @break

                                                    @default
                                                @endswitch
                                            </td>
                                            <td>{{ $jobApplicant->born_place }}</td>
                                            <td>{{ $age }} tahun</td>
                                            <td>{{ $dateSubmit }}</td>
                                            <td>
                                                <a class="btn btn-info"
                                                    href="{{ url('/data_lampiran_pelamar/', $jobApplicant->jobApplicantAttachments->files) }}"
                                                    target="_blank">
                                                    <i class="fa fa-paperclip" aria-hidden="true"></i>
                                                </a>
                                            </td>

                                            <td>
                                                @if ($jobApplicant->is_approved != 3)
                                                    <form
                                                        action="{{ route('admin.job-applicants.destroy', $jobApplicant->id) }}"
                                                        method="POST">
                                                        <div class="btn-group">
                                                            <a class="btn btn-sm btn-primary "
                                                                href="{{ route('admin.job-applicants.show', $jobApplicant->id) }}"><i
                                                                    class="fa fa-fw fa-eye"></i></a>
                                                            <a class="btn btn-sm btn-success"
                                                                href="{{ route('admin.job-applicants.edit', $jobApplicant->id) }}"><i
                                                                    class="fa fa-fw fa-edit"></i></a>
                                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                                    class="fa fa-fw fa-trash"></i></button>
                                                        </div>
                                                        @csrf
                                                        @method('DELETE')

                                                    </form>
                                                @else
                                                    <span class="badge bg-info">
                                                        <i class="fas fa-check-double"></i> Sudah jadi Pegawai
                                                    </span>
                                                @endif

                                            </td>
                                            <td>
                                                @switch($jobApplicant->is_approved)
                                                    @case(0)
                                                        <span class="badge bg-info"><i class="fa fa-hourglass-start"
                                                                aria-hidden="true"></i> Dalam
                                                            proses</span>
                                                    @break

                                                    @case(1)
                                                        <span class="badge bg-success"><i class="fa fa-check-circle"
                                                                aria-hidden="true"></i>
                                                            Diterima</span>
                                                    @break

                                                    @case(2)
                                                        <span class="badge bg-danger"><i class="fa fa-times-circle"
                                                                aria-hidden="true"></i>
                                                            Ditolak</span>
                                                    @break

                                                    @case(3)
                                                        <span class="badge bg-dark"><i class="fa fa-check-circle"
                                                                aria-hidden="true"></i>
                                                            Sudah jadi Pegawai</span>
                                                    @break

                                                    @default
                                                @endswitch
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10">
                                                    <center>== Data Tidak Ditemukan ==</center>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {!! $jobApplicants->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ route('admin.job-applicants.all-applicant') }}" method="GET">
                @csrf
                @include('job-applicant.tab.report')
            </form>

        </div>
    @endsection
