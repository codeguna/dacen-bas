@extends('layouts.dashboard')

@section('template_title')
    Kelengkapan Presensi
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-binoculars text-primary"></i> Kelengkapan Presensi
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info" role="alert">
                            <h5 class="alert-heading">
                                <i class="fas fa-info-circle"></i>
                                Presensi disini adalah presensi yang menggunakan mesin fingerprint.
                            </h5>
                        </div>
                        <div class="alert alert-primary" role="alert">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                            Pilih tanggal untuk filter berdasarkan tanggal
                        </div>
                        <form action="{{ route('admin.scan-log.check-attendances-filter') }}" method="GET"
                            id="attendanceForm">
                            <div class="row">
                                <div class="col md-12">
                                    <h4 class="text-center">
                                        Tanggal Awal / Tanggal Akhir
                                    </h4>
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="start_date" id="start_date"
                                            value="{{ request('start_date') }}" required>
                                        <input class="form-control" type="date" name="end_date" id="end_date"
                                            value="{{ request('end_date') }}" required>
                                        <p id="date_error" style="color: red;"></p>
                                        <span class="input-group-btn">
                                            <a href="{{ route('admin.scan-log.my-attendances') }}"
                                                class="btn btn-success ml-1">
                                                <i class="fas fa-sync"></i>
                                            </a>
                                            <button type="submit" class="btn btn-warning" type="button"
                                                id="submit_button">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable1">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>
                                        <center>
                                            Jam Masuk
                                        </center>
                                    </th>
                                    <th>
                                        <center>
                                            Jam Keluar
                                        </center>
                                    </th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    use Carbon\Carbon;
                                    $previousDate = null;
                                @endphp
                                @foreach ($scanLogs as $entry)
                                    @php
                                        $currentDate = \Carbon\Carbon::parse($entry->scan)->format('d/m/Y');

                                    @endphp
                                    @if ($previousDate != $currentDate)
                                        @php

                                            $pin = $entry->pin;
                                            $created_at = $entry->created_at;
                                            $time = \Carbon\Carbon::parse($entry->scan);
                                            $firstScan = \App\Models\ScanLog::select('scan')
                                                ->where('pin', $pin)
                                                ->where('ip_scan', '3.1.174.198')
                                                ->whereDate('scan', $time)
                                                ->where(function ($query) {
                                                    $query->whereTime('scan', '<=', Carbon::parse('12:00:00'));
                                                })
                                                ->orderBy('scan', 'ASC')
                                                ->first();
                                            $lastScan = \App\Models\ScanLog::select('scan')
                                                ->where('pin', $pin)
                                                ->where('ip_scan', '3.1.174.198')
                                                ->whereDate('scan', $time)
                                                ->where(function ($query) {
                                                    $query->whereTime('scan', '>=', Carbon::parse('12:01:00'));
                                                })
                                                ->orderBy('scan', 'DESC')
                                                ->first();
                                        @endphp
                                        @if (!empty($firstScan->scan) && !empty($lastScan->scan))
                                        @else
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>
                                                    {{ $entry->user->name }} <br>
                                                    <small
                                                        class="text-success">{{ \Carbon\Carbon::parse($entry->scan)->format('d/m/Y') }}</small>
                                                </td>
                                                <td align="center">
                                                    {{ $firstScan->scan ?? 'X' }}
                                                </td>
                                                <td align="center">
                                                    {{ $lastScan->scan ?? 'X' }}
                                                </td>
                                                <td>
                                                    @if (!empty($firstScan->scan) && !empty($lastScan->scan))
                                                        <p>Presensi Lengkap</p>
                                                    @else
                                                        <p>Presensi Tidak Lengkap</p>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif

                                        @php
                                            $previousDate = $currentDate;
                                        @endphp
                                    @endif
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
        document.getElementById('attendanceForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Mencegah pengiriman formulir secara otomatis

            var startDate = new Date(document.getElementById('start_date').value);
            var endDate = new Date(document.getElementById('end_date').value);

            if (startDate > endDate) {
                alert("Tanggal Akhir tidak bisa lebih kecil dari Tanggal Awal.");
            } else {
                document.getElementById('date_error').textContent = "";
                this.submit(); // Kirim formulir jika valid
            }
        });
    </script>
@endsection
