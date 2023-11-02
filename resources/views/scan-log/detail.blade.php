@extends('layouts.dashboard')

@section('template_title')
    Scan Logs - Detail Data
@endsection

@section('content')
    @php
        use Carbon\Carbon;
    @endphp
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
                        <form id="searchForm" action="{{ route('admin.scanlogs.detail.filter') }}" method="GET">
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
                                            <a href="{{ route('admin.scanlogs.detail') }}" class="btn btn-warning btn-xs">
                                                <i class="fas fa-sync"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table id="dataTable1" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pengguna</th>
                                        <th>Scan 1</th>
                                        <th>Scan 2</th>
                                        <th>Scan 3</th>
                                        <th>Scan 4</th>
                                        <th>Total Jam</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                        function isWithinTimeRange($time, $startTime, $endTime)
                                        {
                                            $scanTime = date('H:i', strtotime($time));
                                            return $scanTime >= $startTime && $scanTime <= $endTime;
                                        }
                                    @endphp
                                    @foreach ($groupedScanLogs as $user => $logs)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $user }}</td>
                                            <td>
                                                @php
                                                    $foundScan1 = false;
                                                @endphp
                                                @foreach ($logs as $log)
                                                    @if (isWithinTimeRange($log->scan, '04:00', '10:59') && !$foundScan1)
                                                        {{ \Carbon\Carbon::parse($log->scan)->format('H:i') }}
                                                        @php
                                                            $foundScan1 = true;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @php
                                                    $foundScan2 = false;
                                                @endphp
                                                @foreach ($logs as $log)
                                                    @if (isWithinTimeRange($log->scan, '11:00', '12:00') && !$foundScan2)
                                                        {{ \Carbon\Carbon::parse($log->scan)->format('H:i') }}
                                                        @php
                                                            $foundScan2 = true;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @php
                                                    $foundScan3 = false;
                                                @endphp
                                                @foreach ($logs as $log)
                                                    @if (isWithinTimeRange($log->scan, '13:00', '14:00') && !$foundScan3)
                                                        {{ \Carbon\Carbon::parse($log->scan)->format('H:i') }}
                                                        @php
                                                            $foundScan3 = true;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @php
                                                    $lastScan = null;
                                                @endphp
                                                @foreach ($logs as $log)
                                                    @if (isWithinTimeRange($log->scan, '16:00', '23:00'))
                                                        @php
                                                            $lastScan = $log;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                @if ($lastScan)
                                                    {{ \Carbon\Carbon::parse($lastScan->scan)->format('H:i') }}
                                                @endif
                                            </td>
                                            <td>
                                                @php
                                                    $scan1Time = \Carbon\Carbon::parse($logs[0]->scan);
                                                    $scan4Time = $lastScan ? \Carbon\Carbon::parse($lastScan->scan) : \Carbon\Carbon::parse($logs[count($logs) - 1]->scan);
                                                    $difference = $scan4Time->diffInHours($scan1Time);
                                                @endphp
                                                {{ $difference }} jam
                                            </td>
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
