@extends('layouts.dashboard')

@section('template_title')
    Scan Logs Extra
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h3>
                                    <i class="fas fa-user-clock text-primary"></i> Report Presensi Luar
                                </h3>
                            </span>
                        </div> <br>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>
                                <i class="fa fa-info-circle" aria-hidden="true"></i> Pengajuan Presensi yang disetujui pada
                                jam > 16:00!
                            </strong>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body">
                        <form id="searchForm" action="{{ route('admin.scan-log-extra.filter') }}" method="GET">
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
                                            <a href="{{ route('admin.scan-logs-extras.index') }}"
                                                class="btn btn-warning btn-xs">
                                                <i class="fas fa-sync"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table id="dataTable1" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Pin</th>
                                        <th>Tanggal & Waktu Pengajuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($scanLogsExtras as $scanLogsExtra)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $scanLogsExtra->user->name }}</td>
                                            <td>{{ $scanLogsExtra->pin }}</td>
                                            <td>{{ $scanLogsExtra->scan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Pin</th>
                                    <th>Tanggal & Waktu Pengajuan</th>
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
