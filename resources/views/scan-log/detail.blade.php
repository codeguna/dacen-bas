@extends('layouts.dashboard')

@section('template_title')
    Scan Logs - Detail Data
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Detail Data | Hari Ini</h3>
                        <div class="alert alert-primary" role="alert">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                            Pilih tanggal untuk filter berdasarkan tanggal
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="searchForm" action="{{ route('admin.scan-log-extra.filter') }}" method="GET">
                            @csrf
                            <div class="card-header">
                                <h3 class="text-center">Tanggal</h3>
                                <div class="input-group">
                                    <input type="date" name="date" class="form-control" value="{{ request('date') }}"
                                        required>
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
                            <table id="dataTable1" class="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Scan</th>
                                        <th>Jumlah Jam</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($groupedScanLogs as $nama => $scans)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $nama }}</td>
                                            <td>
                                                @php
                                                    $totalJam = 0;
                                                @endphp
                                                @foreach ($scans as $scan)
                                                    @if ($loop->first)
                                                        {{ \Carbon\Carbon::parse($scan->scan)->format('H:i') }}
                                                    @else
                                                        @php
                                                            $selisih = \Carbon\Carbon::parse($scan->scan)->diffInHours(\Carbon\Carbon::parse($scans[$loop->index - 1]->scan));
                                                            $totalJam += $selisih;
                                                        @endphp
                                                        <br>
                                                        {{ \Carbon\Carbon::parse($scan->scan)->format('H:i') }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ $totalJam }} Jam</td>
                                        </tr>
                                    @endforeach
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
