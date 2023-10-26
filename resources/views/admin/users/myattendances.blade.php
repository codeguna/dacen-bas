@extends('layouts.dashboard')

@section('template_title')
    Presensi Saya
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fas fa-user-clock"></i> Presensi Hari Ini</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Scan 1</th>
                                        <th>Scan 2</th>
                                        <th>Scan 3</th>
                                        <th>Scan 4</th>
                                        <th>Total Jam</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            {{ ++$i }}
                                        </td>
                                        <td>
                                            @if ($scan1)
                                                <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                                                {{ $scan1->scan }}
                                            @else
                                                <i class="fa fa-times-circle text-danger" aria-hidden="true"></i> Belum
                                                Presensi
                                            @endif
                                        </td>
                                        <td>
                                            @if ($scan2)
                                                <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                                                {{ $scan2->scan }}
                                            @else
                                                <i class="fa fa-times-circle text-danger" aria-hidden="true"></i> Belum
                                                Presensi
                                            @endif
                                        </td>
                                        <td>
                                            @if ($scan3)
                                                <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                                                {{ $scan3->scan }}
                                            @else
                                                <i class="fa fa-times-circle text-danger" aria-hidden="true"></i> Belum
                                                Presensi
                                            @endif
                                        </td>
                                        <td>
                                            @if ($scan4)
                                                <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                                                {{ $scan4->scan }}
                                            @else
                                                <i class="fa fa-times-circle text-danger" aria-hidden="true"></i> Belum
                                                Presensi
                                            @endif
                                        </td>
                                        <td>
                                            @if ($scan1 && $scan2 && $scan3 && $scan4)
                                                @php
                                                    $diff1 = strtotime($scan2->scan) - strtotime($scan1->scan);
                                                    $diff2 = strtotime($scan3->scan) - strtotime($scan2->scan);
                                                    $diff3 = strtotime($scan4->scan) - strtotime($scan3->scan);
                                                    $totalDiff = $diff1 + $diff2 + $diff3;
                                                    $hours = floor($totalDiff / 3600);
                                                    $minutes = floor(($totalDiff % 3600) / 60);
                                                @endphp
                                                <i class="fas fa-clock text-warning"></i>
                                                {{ $hours }} jam {{ $minutes }} menit
                                            @else
                                                <!-- Tampilkan pesan jika ada yang belum presensi -->
                                                <i class="fas fa-clock text-warning"></i> Belum ada data presensi lengkap
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-calendar-check    "></i> Akumulasi Kehadiran
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.scan-log.my-attendances-filter') }}" method="GET"
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
                                            <a href="{{ route('admin.scan-log.my-attendances') }}" class="btn btn-success">
                                                <i class="fas fa-sync"></i>
                                            </a>
                                            <button type="submit" class="btn btn-warning" type="button"
                                                id="submit_button">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Scan Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $totalHours = 0; // Initialize total hours
                                                    $previousDate = null; // Initialize previous date
                                                @endphp

                                                @foreach ($scan_logs as $scanlog)
                                                    @php
                                                        $scanTime = new \DateTime($scanlog->scan);
                                                        $date = $scanTime->format('Y-m-d');

                                                        if ($previousDate !== $date) {
                                                            // Display the date as a separator for a new group
                                                            echo '<tr><td></td><td><strong>' . $date . '</strong></td><td></td></tr>';
                                                        }

                                                        // Calculate total hours for each date
                                                        if ($previousDate !== null) {
                                                            $interval = $scanTime->diff($previousScanTime);
                                                            $totalHours += $interval->h;
                                                        }

                                                        $previousScanTime = $scanTime;
                                                        $previousDate = $date;
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $scanlog->scan }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td></td>
                                                    <td><i class="fas fa-clock"></i> <strong>Total Hours:
                                                            {{ $totalHours }}</strong></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
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
