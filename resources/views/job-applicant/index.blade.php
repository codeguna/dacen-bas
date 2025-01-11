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
                        <div class="table-responsive">
                            <table id="dataTable1" class="table table-hover">
                                <tr>
                                    <th>No</th>
                                    <th>Melamar di</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenjang & Pendidikan</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Kota Lahir</th>
                                    <th>Umur</th>
                                    <th>Tanggal Melamar Pekerjaan</th>
                                    <th>Surat & CV Lamaran</th>
                                    <th><i class="fa fa-cogs" aria-hidden="true"></i></th>
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

                                            <td>{{ $jobApplicant->jobVacancy->title }}</td>
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
                                                    <i class="fa fa-paperclip" aria-hidden="true"></i> Klik Disini!
                                                </a>
                                            </td>

                                            <td>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <script>
            $(function() {
                $("#dataTable1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
        </script>
    @endsection
