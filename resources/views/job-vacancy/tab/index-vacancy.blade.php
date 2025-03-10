<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">

                <span id="card_title">
                    <i class="fas fa-list"></i> Daftar Permintaan Pekerjaan
                </span>

                <div class="float-right">
                    <a href="{{ route('admin.job-vacancies.create') }}" class="btn btn-primary btn-sm float-right"
                        data-placement="left">
                        <i class="fa fa-plus" aria-hidden="true"></i> Tambah Permintaan
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
                        <tr align="center">
                            <th>No</th>
                            <th>Nama Permintaan</th>
                            <th>Departemen</th>
                            <th>Jumlah Kebutuhan | Lamaran Masuk</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Berakhir</th>
                            <th>Tanggal Pengajuan</th>
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
                                $date_start = \Carbon\Carbon::parse($jobVacancy->date_start)->format('j F y');
                                $deadline = \Carbon\Carbon::parse($jobVacancy->deadline)->format('j F y');
                                $endDate = \Carbon\Carbon::parse($jobVacancy->deadline)->format('Y-m-d');
                                $startDate = \Carbon\Carbon::parse($jobVacancy->date_start)->format('Y-m-d');                                
                            @endphp
                            <tr>
                                <td>{{ ++$i }}</td>

                                <td>{{ $jobVacancy->title }}</td>
                                <td>{{ $jobVacancy->department->name }}</td>
                                <td>
                                    <i class="fas fa-user-alt text-primary"></i></i>
                                    {{ $jobVacancy->amount_needed }} | <i class="fa fa-sign-in-alt text-success"
                                        aria-hidden="true"></i> {{ $pelamar = App\Models\JobApplicant::where('job_vacancies_id',$jobVacancy->id)->count(); }}
                                </td>
                                <td>{{ $date_start }}</td>
                                <td>{{ $deadline }}</td>
                                <td>{{ $jobVacancy->created_at->diffForHumans() }}</td>
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
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Hapus data Permintaan Karyawan {{ $jobVacancy->title }}?')"><i
                                                    class="fa fa-fw fa-trash"></i></button>
                                            @if (date('Y-m-d') <= $endDate)
                                                <a href="{{ route('admin.job-applicants.add-applicant', $jobVacancy->id) }}"
                                                    class="btn btn-sm btn-info" title="Tambah Pelamar">
                                                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                                                </a>
                                            @else
                                                <a href="#" class="btn btn-sm btn-dark"
                                                    title="Sudah Melewati Batas Waktu">
                                                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                                                </a>
                                            @endif
                                        </div>
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                                <td>
                                    @if (date('Y-m-d') <= $endDate)
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
                                <td colspan="10">
                                    <center>== Tidak ada permintaan Pelamar ==</center>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    <thead class="thead">
                        <tr align="center">
                            <th>No</th>
                            <th>Nama Permintaan</th>
                            <th>Departemen</th>
                            <th>Jumlah Kebutuhan | Lamaran Masuk</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Berakhir</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Pemohon</th>
                            <th><i class="fa fa-cogs" aria-hidden="true"></i></th>
                            <th>Status Lamaran</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
