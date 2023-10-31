@extends('layouts.dashboard')

@section('template_title')
    Scan Logs - Pengajuan
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fa fa-hourglass-start text-warning" aria-hidden="true"></i> Pengajuan Presensi | Luar
                            Kantor
                        </h3>
                    </div>
                    <form id="searchForm" action="{{ route('admin.scan-log.request-attendances-filter') }}" method="GET">
                        @csrf
                        <div class="card-header">
                            <h3 class="text-center">Tanggal Awal/Tanggal Akhir</h3>
                            <div class="input-group">
                                <input type="date" name="start_date" id="start_date" class="form-control"
                                    value="{{ request('start_date') }}" required>
                                <input type="date" name="end_date" id="end_date" class="form-control"
                                    value="{{ request('end_date') }}" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light rounded">
                                        <button type="submit" class="btn btn-primary btn-xs">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </button>
                                        <a href="{{ route('admin.scan-log.view-request-attendances') }}"
                                            class="btn btn-warning btn-xs">
                                            <i class="fas fa-sync"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                    </form>
                    <div class="table-responsive">
                        <table id="dataTable1" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        <i class="fas fa-cogs"></i>
                                    </th>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Aktivitas</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Jam Pengajuan</th>
                                    <th>Foto</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($request_attendances as $request)
                                    <tr>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="">
                                                <form
                                                    action="{{ route('admin.scan-log.request-attendances-process', $request->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-xs btn-success"
                                                        onclick="return confirm('Proses pengajuan {{ $request->user->name }}?')">
                                                        <i class="fas fa-check-circle"></i>
                                                    </button>
                                                    <input type="hidden" name="status" value="1">
                                                    <input type="hidden" name="scan" value="{{ $request->created_at }}">
                                                </form>
                                                <form
                                                    action="{{ route('admin.scan-log.request-attendances-reject', $request->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-xs btn-danger"
                                                        onclick="return confirm('Proses pengajuan {{ $request->user->name }}?')">
                                                        <i class="fas fa-times-circle"></i>
                                                    </button>
                                                    <input type="hidden" name="status" value="2">
                                                    <input type="hidden" name="scan" value="{{ $request->created_at }}">
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            {{ ++$i }}
                                        </td>
                                        <td>
                                            {{ $request->user->name }}
                                        </td>
                                        <td>
                                            {{ $request->activity->name }}
                                        </td>
                                        <td>
                                            {{ date('d F Y', strtotime($request->created_at)) }}
                                        </td>
                                        <td>
                                            {{ $request->created_at }}
                                        </td>
                                        <td>
                                            <a href="{{ url('/data_photo_pengajuan/' . $request->photo) }}" class="link"
                                                target="_blank">
                                                <i class="fas fa-file-image"></i>
                                            </a>
                                        </td>
                                        <td>
                                            @if ($request->status == 1)
                                                <span class="badge bg-success w-100">
                                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                    Disetujui
                                                </span>
                                            @elseif ($request->status == 2)
                                                <span class="badge bg-danger w-100">
                                                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                    Ditolak
                                                </span>
                                            @else
                                                <span class="badge bg-warning w-100">
                                                    <i class="fas fa-sync-alt"></i>
                                                    Butuh Persetujuan
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <th>
                                    <i class="fas fa-cogs"></i>
                                </th>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Aktivitas</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Jam Pengajuan</th>
                                <th>Foto</th>
                                <th>Status</th>
                            </tfoot>
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
                "buttons": ["csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#dataTable1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        document.getElementById('searchForm').addEventListener('submit', function(event) {
            var startDate = new Date(document.getElementById('start_date').value);
            var endDate = new Date(document.getElementById('end_date').value);

            if (startDate > endDate) {
                alert('Tanggal Akhir tidak bisa lebih kecil daripada Tanggal Mulai!');
                event.preventDefault(); // Prevent form submission
            }
        });
    </script>
@endsection
